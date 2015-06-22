(function($ , Handlebars){
    
    var files;
    var URI = {
        GUARDAR : "actions/api-productos.php?action=guardar",
        ACTUALIZAR :  "actions/api-productos.php?action=actualizar",
        UPLOAD : "actions/api-productos.php?action=subir"
    };
    
    var validarFormData = function(){
        var valid = true;
        var nombre = $("#nombre").val();
        var descripcionCorta = $("#descripcionCorta").val();
        var descripcionLarga = $("#descripcionLarga").val();
        var precio = $("#precio").val();
        var stock = $("#stock").val();
        //var categoria = $("#categoria").val();
        
        if(nombre.length == 0){
            $("#nombre").closest(".form-group").addClass("has-error");
            $("#nombre").siblings(".glyphicon-remove").removeClass("hide");
            $("#nombre").siblings(".help-block").html("Completar este campo");
            valid = false;
        }

        if(descripcionCorta.length == 0){
            $("#descripcionCorta").closest(".form-group").addClass("has-error");
            $("#descripcionCorta").siblings(".glyphicon-remove").removeClass("hide");
            $("#descripcionCorta").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
        
        if(descripcionLarga.length == 0){
            $("#descripcionLarga").closest(".form-group").addClass("has-error");
            $("#descripcionLarga").siblings(".glyphicon-remove").removeClass("hide");
            $("#descripcionLarga").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
        
        if(precio.length == 0){
            $("#precio").closest(".form-group").addClass("has-error");
            $("#precio").siblings(".glyphicon-remove").removeClass("hide");
            $("#precio").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
        
        if(stock.length == 0){
            $("#stock").closest(".form-group").addClass("has-error");
            $("#stock").siblings(".glyphicon-remove").removeClass("hide");
            $("#stock").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
        
        /*if(categoria.length == 0){
            $("#categoria").closest(".form-group").addClass("has-error");
            $("#categoria").siblings(".glyphicon-remove").removeClass("hide");
            $("#categoria").siblings(".help-block").html("Completar este campo");
            valid = false;
        }*/
       
        return valid;
    };

    var cleanFormError = function(){
        //Quitar errores en campo nombre
        $("#nombre").closest(".form-group").removeClass("has-error");
        $("#nombre").siblings(".glyphicon-remove").addClass("hide");
        $("#nombre").siblings(".help-block").html(""); 
        //Quitar errores en campo descripcion corta
        $("#descripcionCorta").closest(".form-group").removeClass("has-error");
        $("#descripcionCorta").siblings(".glyphicon-remove").addClass("hide");
        $("#descripcionCorta").siblings(".help-block").html("");  
        //Quitar errores en campo descripcion larga
        $("#descripcionLarga").closest(".form-group").removeClass("has-error");
        $("#descripcionLarga").siblings(".glyphicon-remove").addClass("hide");
        $("#descripcionLarga").siblings(".help-block").html("");  
        //
        $("#precio").closest(".form-group").removeClass("has-error");
        $("#precio").siblings(".glyphicon-remove").addClass("hide");
        $("#precio").siblings(".help-block").html("");  
        //
        $("#stock").closest(".form-group").removeClass("has-error");
        $("#stock").siblings(".glyphicon-remove").addClass("hide");
        $("#stock").siblings(".help-block").html("");  
        //
        $("#categoria").closest(".form-group").removeClass("has-error");
        $("#categoria").siblings(".glyphicon-remove").addClass("hide");
        $("#categoria").siblings(".help-block").html("");  
    };
    
    $('input[type=file]').on('change', prepareUpload);
    //$('#subir-img').on('click', uploadFiles);
    
    function prepareUpload(event){
        files = event.target.files;
        console.log(files);
    };

    $("#form-producto").on("submit", function(event){
        cleanFormError();
        if(validarFormData()){
            uploadFiles(event);
            
        }
        //impedir que se ejecute el submit nativo del navegador (ya que los datos los estamos enviando por ajax)
        return false;
    });
    
    
    function uploadFiles(event){
        event.preventDefault();

        var data = new FormData();
        
        $.each(files, function(key, value){ // key - value: vienen desde el file
            data.append(key, value);
        });

        $.ajax({
            url: URI.UPLOAD,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false
        }).done(function(response){
            console.log(response);           
            $('#id-subida').val(response.id);
            //Si hay un input oculto con el id, estamos editando, de lo contrario, creando uno nuevo
            var idInput = $("input[name=id]");
            var actionUrl = idInput.length == 0 ? URI.GUARDAR : URI.ACTUALIZAR;
            var datos = $("#form-producto").serialize();
            $.ajax({
                url : actionUrl,
                method : 'POST',
                dataType : 'json',
                data :  datos//obtengo los datos del formulario
            })
            .done(function(res){
                //si la categoria se guardo/actualizo, cambio a la pantalla listado
                if(!res.error){
                    window.location = "productos.php";
                }else{
                    alert(res.mensaje);
                }
            })
            .fail(function(){
                //si fallo la peticion mustro mensaje de error
                alert("error");
            });
            //loadImg();
        });
    };
        
})(jQuery , Handlebars);