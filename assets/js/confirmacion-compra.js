$(function() {	

    var error = false;
    
    $(document).ready(function(){
        
        $( "#lugar-entrega" ).on('change', function(){	
            $( "#lugar-entrega option:selected" ).each(function() {
                $("#nuevo-lugar").addClass('hide');
               if( $( this ).text() == "Elegir otra" ){
                    $("#nuevo-lugar").removeClass('hide');
               }
            });
        });	
    });		
    //Array para dar formato en español
    $.datepicker.regional['es'] = 
    {
        closeText: 'Cerrar', 
        prevText: 'Previo', 
        nextText: 'Próximo',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
        'Jul','Ago','Sep','Oct','Nov','Dic'],
        monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
        dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        dateFormat: 'dd/mm/yy', firstDay: 0, 
        initStatus: 'Selecciona la fecha', isRTL: false
    };
     $.datepicker.setDefaults($.datepicker.regional['es']);

    $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+3M +0D",
        beforeShowDay: $.datepicker.noWeekends,showOn: "button",
        buttonImage: "./assets/img/calendar.gif",
        buttonImageOnly: true,
        buttonText: "Select date"
    });
             
        var listarItemsCarrito = function(){       
        $.ajax({
            url: "actions/api.php?action=listar-carrito",
            method: "GET",
            dataType: "json"
        }).done(function(res){
            if(! res.error){
                $('#listado-carrito').html(res.data);
            }
        }).fail(function(res){
            alert(res.error.mensaje);
        });
    };
    
    listarItemsCarrito();
    
    $(".btn-confirmar").on("click", function(){
        error = false;
        $('.error-lugar').addClass('hide');
        $('.error-fecha').addClass('hide');
        $('.error-items').addClass('hide');
        if(! $("#nuevo-lugar").hasClass('hide') ){
            if(validarCampo('#calle', '.error-lugar'))
                validarCampo('#altura', '.error-lugar');
            if( $('#barrio option:selected').val() == 0){
               $('.error-lugar').removeClass('hide');
               error = true;
           }
           else
               $('.error-lugar').addClass('hide');
        }
        
        validarCampo('#datepicker', '.error-fecha');
           
        if( $('#listado-carrito').find('#carrito').children().hasClass('no-items') ){
            var html = $('#listado-carrito').html();
             $('#listado-carrito').html( html + ' <label class="error-items">El carrito no tiene ítems.</label>');
        }
        
        if(error){
            alert("Verificar campos incompletos");
            return false;
        }
        
        var dom = $('#lugar-entrega option:selected').text();
        var barrio = "";
        if( dom == 'Elegir otra' ){
            dom = $('#calle').val() + " " + $('#altura').val();
            if( $('#piso').val() != null && $('#piso').val() != '' )
                dom += ( " " + $('#piso').val() );
            if( $('#depto').val() != null && $('#depto').val() != '' )
                dom += ( " " + $('#depto').val() );
            barrio =  $('#barrio option:selected').val();
        }
        
        /*var productos = obtenerObjCarrito();
        
        $.ajax({
            url: 'actions/api.php?action=confirmar-carrito',
            method: 'POST',
            dataType: 'json',
            data: {domicilio:dom, localidad:barrio, datos:JSON.stringify( productos  )}
        }).done(function(res){
            if(! res.error)
                alert("todo bien");
        }).fail(function(){
            alert("Error en la confirmación");
        });*/
    });
    
    function validarCampo(campo, lblError){
        if($(campo).val() == null || $(campo).val() == ""){
            $(lblError).removeClass('hide');
            error = true;
            return false;
        }
        else{
            $(lblError).addClass('hide');
            return true;
        }
    }
    
    /*function obtenerObjCarrito(){
        var productos = [];
        $('#carrito').find('li.item').each(function(){
            var id = $(this).find('span.id-producto').html();
            var nombre = $(this).find('div.detalles p.nombre').html();
            var precio = $(this).find('div.detalles span.precio').attr('precio');
            var cantidad = $(this).find('div.cantidad').html();
            productos.push( {idProd:id, nombreProd: nombre, precioProd: precio, cantidadProd: cantidad } );
        });
        return productos;
    }*/
    
});