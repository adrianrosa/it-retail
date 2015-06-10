var dialog, form;
var nombre = $( "#nombre" );
var descripcion = $( "#descripcion" );
var orden = $( "#orden" );
var allFields = $( [] ).add( nombre ).add( descripcion ).add( orden );
var tips = $( ".validateTips" );
var editar = false;
var idEditado = 0;

$(document).ready(function(){
	dialog = $( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 400,
		width: 350,
		modal: true,
		buttons: {
			"Crear": addUser,
			Cancel: function() {
			  dialog.dialog( "close" );
			}
		},
		close: function() {
			form[ 0 ].reset();
			allFields.removeClass( "ui-state-error" );
		}
	});

	form = dialog.find( "form" ).on( "submit", function( event ) {
	  event.preventDefault();
	  addUser();
	});
	
	$( ".editar" ).click(function(){
		editar = true;
		idEditado = $(this).parent().siblings('.id').html();
		var nombreEditar = $(this).parent().siblings('.nombre').html();
		$( "#nombre" ).val(nombreEditar);
		var descripcionEditar = $(this).parent().siblings('.descripcion').html();
		$( "#descripcion" ).val(descripcionEditar);
		var ordenEditar = $(this).parent().siblings('.orden').html();
		$( "#orden" ).val(ordenEditar);
		dialog.dialog( "open" );
	});
	
	$( "#crear" ).button().on( "click", function() {
		dialog.dialog( "open" );
	}); 
});


function updateTips( t ) {
  tips
	.text( t )
	.addClass( "ui-state-highlight" );
  setTimeout(function() {
	tips.removeClass( "ui-state-highlight", 1500 );
  }, 500 );
}

function checkLength( o, n, min, max ) {
  if ( o.val().length > max || o.val().length < min ) {
	o.addClass( "ui-state-error" );
	updateTips( "Length of " + n + " must be between " +
	  min + " and " + max + "." );
	return false;
  } else {
	return true;
  }
}

function checkRegexp( o, regexp, n ) {
  if ( !( regexp.test( o.val() ) ) ) {
	o.addClass( "ui-state-error" );
	updateTips( n );
	return false;
  } else {
	return true;
  }
}

function addUser() {
  var valid = true;
  allFields.removeClass( "ui-state-error" );

  valid = valid && checkLength( nombre, "Nombre", 3, 20 );
  valid = valid && checkLength( descripcion, "Descripción", 6, 80 );
  valid = valid && checkLength( orden, "Orden", 1, 3 );

  valid = valid && checkRegexp( orden, /^[0-9]+$/, "Orden: solo acepta números");
  
  if(editar && valid){
	$('.id').each(function(){
		if($(this).html() == idEditado){
			$(this).parent().remove();
			return false;
		}
	});
  }	
	
  if ( valid ) {
	$( ".tabla-general tbody" ).append( "<tr>" +
	  "<td class='id'>" + 6 + "</td>" +
	  "<td class='nombre'>" + nombre.val() + "</td>" +
	  "<td class='descripcion'>" + descripcion.val() + "</td>" +
	  "<td class='orden'>" + orden.val() + "</td>" +
	  "<td><button class='editar'>Editar</button>&nbsp;<button>Eliminar</button></td>" +
	"</tr>" );
	dialog.dialog( "close" );
  }
  return valid;
}


