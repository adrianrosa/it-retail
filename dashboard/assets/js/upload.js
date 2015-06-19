(function($){
    
    var files;
    var URI = {
        UPLOAD : 'actions/api-productos.php?action=subir-img',
        LIST : 'actions/api-productos.php?action=listar'
    };

    $('input[type=file]').on('change', prepareUpload);
    $('form').on('submit', uploadFiles);
    
    var loadImg = function(event){

        $.ajax({
            url: URI.LIST,
            type: 'GET',
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false
        }).done(function(response){
            console.log(response);
            if(!response.error){
                $('#listado').html("");
                response.data.forEach(function(item){               
                    $('#listado').append(
                        "<li><img src='" + item.path + "/" + item.id + "/" + item.file_name + "' /></li>"
                    );
                });
            }
        });

    };
    
    function prepareUpload(event){
        files = event.target.files;
        console.log(files);
    };
    
    function uploadFiles(event){
        //event.stopPropagation();
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
            //loadImg();
        });
    };
    loadImg();
})(jQuery)