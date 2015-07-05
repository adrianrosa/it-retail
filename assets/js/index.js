(function ($){
    
    var listarDestacados = function(){       
        $.ajax({
            url: "actions/api.php?action=listar-destacados",
            method: "GET",
            dataType: "json"
        }).done(function(res){
            if(! res.error){
                var html = generarHtmlDestcados(res.data);
                $('#listado-destacados').html(html);
            }
        }).fail(function(res){
            alert(res.error.message);
        });
    };
    
    listarDestacados();
    
    function generarHtmlDestcados(data){
        var count = 1;
        var htmlCode = "";
        data.forEach(function(destacado){
            
            if(count == 1)
                htmlCode += "<div class='row'>";
                    
            htmlCode += "<div class='col-md-4'> \
                            <div class='thumbnail producto'> \
                              <a href=''><img src='./dashboard/" + destacado.Path + "/" + destacado.IdImagen + "/" + destacado.FileName + "' alt='' class='imagen img-thumbnail'></a> \
                              <div class='caption descripcion'> \
                                <h3>" + destacado.NombreProducto + "</h3> \
                                <p class='descripcion'>" + destacado.DescripcionCortaProducto + "</p> \
                                <p class='precio' price='" + destacado.PrecioProducto + "'>$ " + destacado.PrecioProducto + "</p> \
                                <p> \
                                    <button class='glyphicon glyphicon-minus-sign menos'></button>&nbsp;<input type='text' value='1' maxlength='3' class='incremento' >&nbsp;                 <button class='glyphicon glyphicon-plus-sign mas'></button> \
                                </p> \
                                <a class='btn btn-primary agregar-carrito' role='button'>Agregar al carrito</a> \
                              </div> \
                            </div> \
                        </div>";  
            
            if(count % 3 == 0)
                htmlCode += "</div><div class='row'>";
            
            count++;
        });
        return htmlCode;
    }
    
    var listarSliders = function(){
        $.get('./assets/templates/listado-sliders.html', function(template_text){
            $.ajax({
                url: "actions/api.php?action=listar-sliders",
                method: "GET",
                dataType: "json"
            }).done(function(res){
                if(! res.error){
                    var indices = new Array();            
                    for(var i = 0; i < res.data.length; i++){
                        var indice = new Object();
                        indice["i"] = i;
                        indices[i] = indice;
                    }
                    var context = {                  
                        sliders : res.data,
                        contador: indices
                    };               
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    $('#myCarousel').html(html);
                    establecerEstilosSlider();
                }
            }).fail(function(res){
                alert(res.error.message);
            });
        });
    };
    
    listarSliders();
    
    function establecerEstilosSlider(){
        $('div.carousel-inner div').each(function(){
            $(this).addClass('active');
            return false;
        });
        $('ol.carousel-indicators li').each(function(){
            $(this).addClass('active');
            return false;
        });
    }
    
})(jQuery);