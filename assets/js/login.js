$(document).ready(function(){
	//$('#btn-login').addClass('hide');
});

function enviarFormLogin(idForm){
	
	limpiarForm($('#inputEmail'));
	limpiarForm($('#inputPassword'));
	
	var email = $('#inputEmail').val();
	var password = $('#inputPassword').val();
	var cancelSubmit = false;
	
	if(email == null || email == '' || email.length == 0){
		establecerClase($('#inputEmail'));
		cancelSubmit = true;
	}
	if(password == null || password == '' || password.length == 0){
		establecerClase($('#inputPassword'));
		cancelSubmit = true;
	}
	
	if(cancelSubmit){
		$('#'+idForm).submit(function(event){
			event.preventDefault();
		});
		$('#label-error').removeClass('hide').addClass('label-error');
	}
	else
		$('#'+idForm).unbind('submit');
	
}

function limpiarForm(elem){
	elem.closest('.form-group').removeClass('has-error').removeClass('has-feedback');
	elem.siblings('.glyphicon-remove').addClass('hide');
}

function establecerClase(elem){
	elem.closest('.form-group').addClass('has-error').addClass('has-feedback');
	elem.siblings('.glyphicon-remove').removeClass('hide');
}
