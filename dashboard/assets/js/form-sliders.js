  (function($, Handlebars){
    
     var URI = {
        GUARDAR : "actions/api-sliders.php?action=guardar",
        ACTUALIZAR :  "actions/api-sliders.php?action=actualizar",
         UPLOAD : "actions/api-sliders.php?action=subir"
    };
      var files;
      var changeImage = false;
    
      $('input[type=file]').on('change', prepareUpload);
      
      function prepareUpload(event){
        files = event.target.files;
        console.log(files);
        changeImage = true;
      };
      
    var validarFormData = function(){
        var valid = true;
        var titulo = $("#titulo").val();
        var orden = $("#orden").val();
        var imagen = $("#urlImagen");
        
        if(titulo.length == 0){
            $("#titulo").closest(".form-group").addClass("has-error");
            $("#titulo").siblings(".glyphicon-remove").removeClass("hide");
            $("#titulo").siblings(".help-block").html("Completar este campo");
            valid = false;
        }

        if(orden.length == 0){
            $("#orden").closest(".form-group").addClass("has-error");
            $("#orden").siblings(".glyphicon-remove").removeClass("hide");
            $("#orden").siblings(".help-block").html("Completar este campo");
            valid = false;
        }
       
        if(imagen.attr('esalta') == "1"){
            if(imagen.val().length == 0){
                $("#urlImagen").closest(".form-group").addClass("has-error");
                $("#urlImagen").siblings(".glyphicon-remove").removeClass("hide");
                $("#urlImagen").siblings(".help-block").html("Completar este campo");
                valid = false;
		      }
        }
        return valid;
    };

    var cleanFormError = function(){
        //Quitar errores en campo nombre
        $("#titulo").closest(".form-group").removeClass("has-error");
        $("#titulo").siblings(".glyphicon-remove").addClass("hide");
        $("#titulo").siblings(".help-block").html(""); 
        //Quitar errores en campo orden
        $("#orden").closest(".form-group").removeClass("has-error");
        $("#orden").siblings(".glyphicon-remove").addClass("hide");
        $("#orden").siblings(".help-block").html(""); 
        //
        $("#urlImagen").closest(".form-group").removeClass("has-error");
        $("#urlImagen").siblings(".glyphicon-remove").addClass("hide");
        $("#urlImagen").siblings(".help-block").html(""); 
    };
    

    $("#form-slider").on("submit", function(){
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
            createSlider();
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
                updateSlider(URI.ACTUALIZAR + "&idImg=" + response.id);
            });
        } else {
            updateSlider(URI.ACTUALIZAR);
        }
    }
    
    function createSlider(){
        var idInput = $("input[name=id]");
        var actionUrl = URI.GUARDAR;
        var datos = $("#form-slider").serialize();
        $.ajax({
            url : actionUrl,
            method : 'POST',
            dataType : 'json',
            data :  datos
        })
        .done(function(res){
            if(!res.error){
                window.location = "sliders.php";
            }else{
                alert(res.mensaje);
            }
        })
        .fail(function(){
            alert("error");
        });
    }
    
    function updateSlider(url){
        var datos = $("#form-slider").serialize();
        $.ajax({
            url : url,
            method : 'POST',
            dataType : 'json',
            data :  datos//obtengo los datos del formulario
        })
        .done(function(res){
            //si la categoria se guardo/actualizo, cambio a la pantalla listado
            if(!res.error){
                window.location = "sliders.php";
            }else{
                alert(res.mensaje);
            }
        })
        .fail(function(res){
            //si fallo la peticion mustro mensaje de error
            alert("error " + res.error);
        });
    }  
      
    $(document).ready(function(){
        var ultimoOrden = getUrlVars()["orden"];
        if( ultimoOrden != null && ultimoOrden != "")
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
      
    $("#urlImagen").on('change', function(){
	   mostrarImagenPreview(this);
    });
   
    function mostrarImagenPreview(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
                $('#img').removeClass('hide');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
      
  })($, Handlebars);