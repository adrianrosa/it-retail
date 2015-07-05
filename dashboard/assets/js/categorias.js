(function($ , Handlebars){
    
    var URI = {};
    URI.GET_CATEGORIAS = "actions/api-categorias.php?action=listar";
    URI.DELETE_CATEGORIA = "actions/api-categorias.php?action=eliminar";
    URI.TEMPLATE_CATEGORIAS = "assets/templates/listado-categorias.html";
    
    var $tableBody = $("#tabla-categorias tbody");
    
    var getCategorias = function(){
        
        $.get(URI.TEMPLATE_CATEGORIAS, function(template_text){
            console.log(template_text);
            
            $.ajax({
                url : URI.GET_CATEGORIAS,
                method : 'GET',
                dataType : 'json'
            }).done(function(res){
                if(!res.error){
                    var context = {                  
                        categorias : res.data
                    };
                    
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    
                    $("#tabla-categorias tbody").html(html);
                }
            });       
        })        
    };
    
    var deleteCategoria = function(categoriaID){
        console.log("eliminando categoria " + categoriaID);
        $.ajax({
            url : URI.DELETE_CATEGORIA,
            method : 'POST',
            dataType : 'json',
            data : { id : categoriaID}
        })
        .done(function(res){
            if(!res.error){
                $("#categoria-"+categoriaID).remove();
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

    $tableBody.on("click", "a.eliminar", function(event){
        if(event.confirmado){
            var id = $(this).closest("tr").find(".IdCategoria").html();
            deleteCategoria(id);
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
    
    getCategorias();
    
    $('#crear-categoria').on('click',
        function() {
            var maximo = 1;
            $('.OrdenCategoria').each(function(){
                var valor = parseInt($(this).html());
                if( valor > maximo ){
                    maximo = valor;
                }
            });
            maximo++;
            window.location ='form-categoria.php?orden='+maximo;
        }
    );
    
    $("table.table_sort").sort_table({
        "action" : "init"
    });
    
})(jQuery , Handlebars);