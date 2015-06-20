(function($ , Handlebars){
    
    var URI = {};
    URI.GET_PRODUCTOS = "actions/api-productos.php?action=listar";
    URI.DELETE_PRODUCTO = "actions/api-productos.php?action=eliminar";
    URI.TEMPLATE_PRODUCTOS = "assets/templates/listado-productos.html";
    
    var getProductos = function(){
        
        $.get(URI.TEMPLATE_PRODUCTOS, function(template_text){
            console.log(template_text);
            console.log(URI.GET_PRODUCTOS);
            $.ajax({
                url : URI.GET_PRODUCTOS,
                method : 'GET',
                dataType : 'json'
            }).done(function(res){
                if(!res.error){
                    var context = {                  
                        productos : res.data
                    };
                    
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    
                    $("#tabla-productos tbody").html(html);
                }
            });       
        })        
    };
    
    var deleteProducto = function(productoID){
        console.log("eliminando producto " + productoID);
        $.ajax({
            url : URI.DELETE_PRODUCTO,
            method : 'POST',
            dataType : 'json',
            data : { id : productoID}
        })
        .done(function(res){
            if(!res.error){
                $("#producto-"+productoID).remove();
            }
        })
        .fail(function(){
            alert("error");
        });        
    };

    var modalConfirm = function(callback){
      $("#confirm-modal").modal('show');

      $("#modal-btn-si").on("click", function(){
        callback(true);
        $("#confirm-modal").modal('hide');
      });

      $("#modal-btn-no").on("click", function(){
        callback(false);
        $("#confirm-modal").modal('hide');
      });
    };

    $('#tabla-productos tbody').on("click", "a.eliminar", function(event){
        if(event.confirmado){
            var id = $(this).closest("tr").find(".IdProducto").html();
            deleteProducto(id);
        }
        modalConfirm(function(confirm){
          if(confirm){
              $(event.target).trigger({
                type : "click",
                confirmado : true
              });
          }
        });
        return false;
    });
    

    getProductos();
    
})(jQuery , Handlebars);