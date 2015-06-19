(function($ , Handlebars){
    
    var URI = {
        GUARDAR : "actions/api-categorias.php?action=guardar",
        ACTUALIZAR :  "actions/api-categorias.php?action=actualizar"
    };
    
    var validarFormData = function(){
        var valid = true;
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var orden = $("#orden").val();
        
        if(nombre.length == 0){
            $("#nombre").closest(".form-group").addClass("has-error");
            $("#nombre").siblings(".glyphicon-remove").removeClass("hide");
            $("#nombre").siblings(".help-block").html("Completar este campo");
            valid = false;
        }

        if(descripcion.length == 0){
            $("#descripcion").closest(".form-group").addClass("has-error");
            $("#descripcion").siblings(".glyphicon-remove").removeClass("hide");
            $("#descripcion").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
        
        if(orden.length == 0){
            $("#orden").closest(".form-group").addClass("has-error");
            $("#orden").siblings(".glyphicon-remove").removeClass("hide");
            $("#orden").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
       
        return valid;
    };

    var cleanFormError = function(){
        //Quitar errores en campo nombre
        $("#nombre").closest(".form-group").removeClass("has-error");
        $("#nombre").siblings(".glyphicon-remove").addClass("hide");
        $("#nombre").siblings(".help-block").html(""); 
        //Quitar errores en campo descripcion
        $("#descripcion").closest(".form-group").removeClass("has-error");
        $("#descripcion").siblings(".glyphicon-remove").addClass("hide");
        $("#descripcion").siblings(".help-block").html("");  
        //Quitar errores en campo orden
        $("#orden").closest(".form-group").removeClass("has-error");
        $("#orden").siblings(".glyphicon-remove").addClass("hide");
        $("#orden").siblings(".help-block").html(""); 
    };
    

    $("#form-categoria").on("submit", function(){
        cleanFormError();
        if(validarFormData()){
            //Si hay un input oculto con el id, estamos editando, de lo contrario, creando uno nuevo
            var idInput = $("input[name=id]");
            var actionUrl = idInput.length == 0 ? URI.GUARDAR : URI.ACTUALIZAR;
            $.ajax({
                url : actionUrl,
                method : 'POST',
                dataType : 'json',
                data : $("#form-categoria").serialize() //obtengo los datos del formulario
            })
            .done(function(res){
                //si la categoria se guardo/actualizo, cambio a la pantalla listado
                if(!res.error){
                    window.location = "categorias.php";
                }else{
                    alert(res.mensaje);
                }
            })
            .fail(function(){
                //si fallo la peticion mustro mensaje de error
                alert("error");
            });
        }
        //impedir que se ejecute el submit nativo del navegador (ya que los datos los estamos enviando por ajax)
        return false;
    });
    
    $(document).ready(function(){
        var ultimoOrden = getUrlVars()["orden"];
        $('#orden').val(ultimoOrden);
    });
    
    function getUrlVars()
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
    
    $('.incremento').keypress(function(event){ // Sólo números
        if (event.keyCode < 48 || event.keyCode > 57 || event.keyCode == 45 || event.keyCode == 48) {
            return false;
        }
    });
    
    /* Botón incrementador de cantidad */
$('.mas').click(function(){
	var elem = $(this).siblings('.incremento')[0];
	var numero = elem.value;
	elem.value = parseInt(numero) + 1;
});

/* Botón decrementador de cantidad */
$('.menos').click(function(){
	var elem = $(this).siblings('.incremento')[0];
	var numero = elem.value;
	if(numero > 1)
		elem.value = parseInt(numero) - 1;
	else if(numero == 1)
		elem.value = 1;
});
    
})(jQuery , Handlebars);