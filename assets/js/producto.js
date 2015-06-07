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
