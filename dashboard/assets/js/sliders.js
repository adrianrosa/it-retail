(function($ , Handlebars){
    
    var URI = {};
    URI.GET_SLIDERS = "actions/api-sliders.php?action=listar";
    URI.DELETE_SLIDERS = "actions/api-sliders.php?action=eliminar";
    URI.TEMPLATE_SLIDERS = "assets/templates/listado-sliders.html";
    
    var getSliders = function(){
        
        $.get(URI.TEMPLATE_SLIDERS, function(template_text){
            console.log(template_text);
            console.log(URI.GET_SLIDERS);
            $.ajax({
                url : URI.GET_SLIDERS,
                method : 'GET',
                dataType : 'json'
            }).done(function(res){
                if(!res.error){
                    var context = {                  
                        sliders : res.data
                    };
                    
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    
                    $("#tabla-sliders tbody").html(html);
                }
            });       
        })        
    };
    
    var deleteSlider = function(sliderID){
        console.log("eliminando slider " + sliderID);
        $.ajax({
            url : URI.DELETE_SLIDERS,
            method : 'POST',
            dataType : 'json',
            data : { id : sliderID}
        })
        .done(function(res){
            if(!res.error){
                $("#slider-"+sliderID).remove();
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

    $('#tabla-sliders tbody').on("click", "a.eliminar", function(event){
        if(event.confirmado){
            var id = $(this).closest("tr").find(".IdSlider").html();
            deleteSlider(id);
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
    
    $('#crear-slider').on('click',
        function() {
            var maximo = 1;
            $('.OrdenImagen').each(function(){
                var valor = parseInt($(this).html());
                if( valor > maximo ){
                    maximo = valor;
                }
            });
            maximo++;
            window.location ='form-slider.php?orden='+maximo;
        }
    );
    
    $("table.table_sort").sort_table({
        "action" : "init"
    });

    getSliders();
    
})(jQuery , Handlebars);