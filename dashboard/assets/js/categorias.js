/*(function($, Handlebars){
    var URI = {};
    URI.OBTENER_CATEGORIAS = "actions/api.php?action=listar-categorias";
    URI.TEMPLATE_CATEGORIAS = "assets/templates/listado-categorias.html";
    var obtenerCategorias = function(){
        $.get("assets/templates/listado-categorias.html", function(template_html){
            console.log(template_html);
            $.ajax({
                url: "actions/api.php?action=listar-categorias",
                method: 'GET',
                dataType: 'json'
            }).done(function(res){
                alert('hola');
                if(!res.error){
                    var context = { categorias: res.data };
                    var template = Handlebars.compile(template_html);
                    var html = template(context);
                    $('#tabla-categorias tbody').html(html);
                }
            });
        })
    };
    obtenerCategorias();
})(jQuery, Handlebars);*/

(function($ , Handlebars){
    
    var URI = {};
    URI.GET_CATEGORIAS = "http://localhost/versionado/it-retail/dashboard/actions/api.php?action=listar";
     URI.TEMPLATE_CATEGORIAS = "./assets/templates/listado-categorias.html";
    
    var getCategorias = function(){
        
        $.get(URI.TEMPLATE_CATEGORIAS, function(template_text){
            console.log(template_text);
            
            $.ajax({
                url : URI.GET_CATEGORIAS,
                method : 'GET',
                dataType : 'json'
            }).done(function(res){
                //if(!res.error){
                    var context = {                  
                        categorias : res.data
                    };
                    
                    var template = Handlebars.compile(template_text);
                    var html = template(context);
                    
                    $("#tabla-categorias tbody").html(html);
                //}
            });
        
            
        })
        
    };

    getCategorias();
})(jQuery , Handlebars);