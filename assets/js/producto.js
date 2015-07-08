(function($){
    
    var title = "";
    var firstCat = 0;
    
    var listarCategorias = function(){
        $.ajax({
            url: 'actions/api.php?action=listar-categorias',
            method: 'GET',
            dataType: 'json'
        }).done(function(res){
            if(! res.error){
                var html = generarHtmlCategorias(res.data);
                $('#sub-menu').html(html);
                $('#titulo-categoria').html(title);  
                listarProductosPorCategoria(firstCat);
            }
        }).fail(function(res){
            alert("Error: " + res.error.message);
        });
    };
    
    var listarProductosPorCategoria = function(idCategoria){
        $.ajax({
            url: 'actions/api.php?action=listar-productos-por-categoria',
            method: 'GET',
            dataType: 'json',
            data: {id: idCategoria}
        }).done(function(res){
            if(! res.error){
                var html = generarHtmlProductos(res.data); 
                $('#listado-productos div.row').html(html);
            } else {
                $('#listado-productos div.row').html("");
            }
        }).fail(function(){
            alert("Error");
        });
    };
    
    $('body').on('click', '#sub-menu li', function(){
        $(this).siblings().each(function(){
            if( $(this).hasClass('active') )
                $(this).removeClass('active');
        });
        $(this).addClass('active');
        $('#titulo-categoria').html( $(this).children('a').html() );
        var idCategoria = $(this).children('input').val();
        // Listar productos de la categoria
        listarProductosPorCategoria(idCategoria);
    });
    
    function generarHtmlCategorias(data){
        var htmlCode = "";
        var first = true;
        data.forEach(function(categoria){
            if(first){
                htmlCode += "<li role='presentation' class='active'><a href='#'>" + categoria.NombreCategoria + "</a><input type='text' class='hide' value='" + categoria.IdCategoria +"' /></li>";
                title = categoria.NombreCategoria;
                firstCat = categoria.IdCategoria;
                first = false;
                return false;
            }
            htmlCode += "<li role='presentation'><a href='#'>" + categoria.NombreCategoria + "</a><input type='text' class='hide' value='" + categoria.IdCategoria +"' /></li>";
        });
        return htmlCode;
    }
    
    function generarHtmlProductos(data){
        var htmlCode = "";
        data.forEach(function(producto){
            htmlCode += "<div id=" + producto.IdProducto + " class='col-md-4 thumbnail producto'> \
                                <a href=''><img src='./dashboard/" + producto.Path + "/" + producto.IdImagen + "/" + producto.FileName + "' alt='' class='imagen img-thumbnail'></a> \
                                <div class='caption descripcion'> \
                                    <h3>" + producto.NombreProducto + "</h3> \
                                    <p>" + producto.DescripcionCortaProducto + "</p> \
				    <p class='precio' price='" + producto.PrecioProducto + "'>$ " + producto.PrecioProducto + "</p> \
                                    <p><button class='glyphicon glyphicon-minus-sign menos'></button>&nbsp;<input type='text' value='1' maxlength='3' \ class='incremento' >&nbsp;<button class='glyphicon glyphicon-plus-sign mas'></button></p> \
                                    <button url='actions/api.php?action=agregar-carrito&id=" + producto.IdProducto + "&nombre=" + producto.NombreProducto + "&precio=" + producto.PrecioProducto + "' class='btn btn-primary agregar-carrito' role='button'>Agregar al carrito</button> \
                                </div> \
                            </div>";
        });
        return htmlCode;
    }
    
    listarCategorias();
    
})(jQuery);