(function($){
    
$(document).ready(function(){
    var errorUsuario = getUrlVars()["errorusuario"];
    if(errorUsuario != null){
        $('#label-error').removeClass('hide').html('Usuario o contraseña incorrecta');
        $('#inputEmail').val(getUrlVars()["email"]);
    }
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

$('#btn-login').on("click", function(){
    limpiarForm($('#inputEmail'));
	limpiarForm($('#inputPassword'));
	
	var email = $('#inputEmail').val();
	var password = $('#inputPassword').val();
	var cancelSubmit = false;
	
	if(email == null || email == '' || email.length == 0){
		establecerClase($('#inputEmail'));
		cancelSubmit = true;
	}
	if(password == null || password == '' || password.length == 0 ){
		establecerClase($('#inputPassword'));
		cancelSubmit = true;
	}
	
	if(cancelSubmit){
		$('#form-login').submit(function(event){
			event.preventDefault();
		});
		$('#label-error').removeClass('hide').addClass('label-error');
	}
	else
		$('#form-login').unbind('submit');
});

function limpiarForm(elem){
	elem.closest('.form-group').removeClass('has-error').removeClass('has-feedback');
	elem.siblings('.glyphicon-remove').addClass('hide');
}

function establecerClase(elem){
	elem.closest('.form-group').addClass('has-error').addClass('has-feedback');
	elem.siblings('.glyphicon-remove').removeClass('hide');
}

})(jQuery);