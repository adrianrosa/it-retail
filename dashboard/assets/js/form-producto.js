(function($ , Handlebars){
    
    var files;
    var URI = {
        GUARDAR : "actions/api-productos.php?action=guardar",
        ACTUALIZAR :  "actions/api-productos.php?action=actualizar",
        UPLOAD : "actions/api-productos.php?action=subir"
    };
    var changeImage = false;
    
    var validarFormData = function(){
        var valid = true;
        var nombre = $("#nombre").val();
        var descripcionCorta = $("#descripcionCorta").val();
        var descripcionLarga = $("#descripcionLarga").val();
        var precio = $("#precio").val();
        var stock = $("#stock").val();
        //var imagen = $("#urlImagen").val();
        
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
        
        /*if(imagen.length == 0){
            $("#urlImagen").closest(".form-group").addClass("has-error");
            $("#urlImagen").siblings(".glyphicon-remove").removeClass("hide");
            $("#urlImagen").siblings(".help-block").html("Completar este campo");
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
        //
        /*$("#urlImagen").closest(".form-group").removeClass("has-error");
        $("#urlImagen").siblings(".glyphicon-remove").addClass("hide");
        $("#urlImagen").siblings(".help-block").html("");  */
    };
    
    $('input[type=file]').on('change', prepareUpload);
    
    $(document).ready(function(){
        var cat = $('#categoria-val').val();
        var index = 0;
        $('#categoria option').each(function(){
            if( $(this).attr('value') == cat ){
                $(this).prop("selected", true);
                return false;
            }
        });
    });
    
    //$('#subir-img').on('click', uploadFiles);
    
    function prepareUpload(event){
        files = event.target.files;
        console.log(files);
        changeImage = true;
    };

    $("#form-producto").on("submit", function(event){
        cleanFormError();
        if(validarFormData()){
            var idInput = $("input[name=id]");
            if(idInput.length == 0)
                uploadFileAndCreate(event);
            else
                uploadFileAndUpdate(event);
            
        }
        //impedir que se ejecute el submit nativo del navegador (ya que los datos los estamos enviando por ajax)
        return false;
    });
    
    
    function uploadFileAndCreate(event){
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
            createProduct();
        });
    };
    
    function uploadFileAndUpdate(event){
        if(changeImage){
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
                //$('#id-subida').val(response.id);
                updateProduct(URI.ACTUALIZAR + "&idImagen=" + response.id);
            });
        } else {
            updateProduct(URI.ACTUALIZAR);
        }
    }
    
    function createProduct(){
        var idInput = $("input[name=id]");
        var actionUrl = URI.GUARDAR;
        var datos = $("#form-producto").serialize();
        $.ajax({
            url : actionUrl,
            method : 'POST',
            dataType : 'json',
            data :  datos
        })
        .done(function(res){
            if(!res.error){
                window.location = "productos.php";
            }else{
                alert(res.mensaje);
            }
        })
        .fail(function(){
            alert("error");
        });
    }
    
    function updateProduct(url){
        var datos = $("#form-producto").serialize();
        $.ajax({
            url : url,
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
        .fail(function(res){
            //si fallo la peticion mustro mensaje de error
            alert("error " + res.error);
        });
    }
    
    $('#precio').keypress(function(e){ 
        
        var tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
        
        if( $.inArray(".", $('#precio').val()) == -1)
            patron =/[0-9-.]/;
        else
            patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);

    });
    
    $('#stock').keypress(function(e){
         var tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
        
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    });
            
})(jQuery , Handlebars);