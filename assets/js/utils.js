(function($){
    
    /* Botón incrementador de cantidad */
    $('body').on('click', '.mas',function(){
        var elem = $(this).siblings('.incremento')[0];
        var numero = elem.value;
        elem.value = parseInt(numero) + 1;
    });

    /* Botón decrementador de cantidad */
    $('body').on('click', '.menos', function(){
        var elem = $(this).siblings('.incremento')[0];
        var numero = elem.value;
        if(numero > 1)
            elem.value = parseInt(numero) - 1;
        else if(numero == 1)
            elem.value = 1;
    });
    
    $('body').on('keypress', '.incremento', function(e){
         var tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
        
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    });
    
    $('body').on('click', 'a.agregar-carrito', function(e){
        var href = $(this).attr('href');
        $(this).attr('href', href + '&cantidad=' + $(this).prev('p').find('input.incremento').val());
        var producto = $(".agregar-carrito").siblings('h3').html();
        var cantidad = $(".agregar-carrito").siblings('p').children('.incremento').val();
        var precioLabel =   $(".agregar-carrito").siblings('.precio').html();
        var precio =   $(".agregar-carrito").siblings('.precio').attr('price');
        if(! confirm('¿Está seguro que desea agregar ' + cantidad + ' ítems del producto ' + producto + '?') )
            e.preventDefault();
    });
    
})(jQuery);