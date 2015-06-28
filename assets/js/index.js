(function ($){
    
    var listarDestacados = function(){
        
        $.get("assets/templates/listado-destacados.html", function(template_html){
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
    
})(jQuery);