(function($){
    
    var hrefAgregar;
    
    var listarItemsCarrito = function(){       
        $.ajax({
            url: "actions/api.php?action=listar-carrito",
            method: "GET",
            dataType: "json"
        }).done(function(res){
            if(! res.error){
                $('#carrito').html(res.data);
            }
        }).fail(function(res){
            alert(res.error.mensaje);
        });
    };
    
    listarItemsCarrito();
    
    $('body').on('click', 'button.agregar-carrito', function(e){
        if(!confirmarAgregado(e, $(this)))
            return false;
        var url = $(this).attr('url')+'&cantidad='+href;
        $.ajax({
            url: url,
            dataType: 'json',
            method: 'POST'
        }).done(function(res){
            if(! res.error){
                listarItemsCarrito();
            }
        }).fail(function(){
            alert("Error al agregar ítem al carrito");
        });
    });
    
    function confirmarAgregado(e, elem){
        href = elem.prev('p').find('input.incremento').val();
        var producto = elem.siblings('h3').html();
        var cantidad = elem.siblings('p').children('.incremento').val();
        if(! confirm('¿Está seguro que desea agregar ' + cantidad + ' ítems del producto ' + producto + '?') ){
            e.preventDefault();
            return false;
        }
        return true;
    }
    
    $('body').on('click', 'a.eliminar-carrito', function(e){
       /*if(!confirmarBorrado(e, $(this)))
           return false;*/
        var url = $(this).attr('url');
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json'
        }).done(function(res){
            if(!res.error)
                listarItemsCarrito();
        });
    });
    
    function confirmarBorrado(e, elem){
        e.preventDefault();
        var producto = elem.next().find('.detalles').find('.nombre-producto').html();
        if( ! confirm("Está seguro que desea eliminar el producto " + producto + " del carrito?") ){
            return false;
        }
        return true;
    }
    
})(jQuery);