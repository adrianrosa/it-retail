(function ($){
    
    var listadoDestacados = function(){
        
        $.get("assets/templates/listado-destacados.html", function(template_html){
            $.ajax({
                url: "actions/api.php?action=listar-destacados",
                method: "GET",
                dataType: "json"
            }).done(function(res){
                if(! res.error){
                    var context = { destacados : res.data };
                    var template = Handlebars.compile(template_html);
                    $('#listado-destacados').html(template(context));
                }
            }).fail(function(res){
                alert(res.error.message);
            });
        });
    };
    
})(jQuery);l