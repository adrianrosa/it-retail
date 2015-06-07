function enviarFormContacto(idForm){
	
	limpiarForm($('#inputEmail'));
	limpiarForm($('#inputName'));
	limpiarForm($('#inputMensaje'));
	
	var email = $('#inputEmail').val();
	var nombre = $('#inputName').val();
	var mensaje = $('#inputMensaje').val();
	var cancelSubmit = false;
	
	if(email == null || email == '' || email.length == 0){
		establecerClase($('#inputEmail'));
		cancelSubmit = true;
	}
	if(nombre == null || nombre == '' || nombre.length == 0){
		establecerClase($('#inputName'));
		cancelSubmit = true;
	}
	if(mensaje == null || mensaje == '' || mensaje.length == 0){
		establecerClase($('#inputMensaje'));
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