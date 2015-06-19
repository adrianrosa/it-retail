(function($ , Handlebars){
    
    var URI = {};
    URI.GET_PRODUCTOS = "actions/api-productos.php?action=listar";
    URI.TEMPLATE_PRODUCTOS = "assets/templates/listado-productos.html";
    
    var getProductos = function(){
        
        $.get(URI.TEMPLATE_PRODUCTOS, function(template_text){
            console.log(template_text);
            console.log(URI.GET_PRODUCTOS);
            $.ajax({
                url : URI.GET_PRODUCTOS,
                method : 'GET',
                dataType : 'json'
            }).done(function(res){
                if(!res.error){
                    var context = {                  
                        productos : res.data
                    };
                    
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    
                    $("#tabla-productos tbody").html(html);
                }
            });       
        })        
    };

    getProductos();
    
})(jQuery , Handlebars);