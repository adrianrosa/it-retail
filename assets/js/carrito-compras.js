(function($){
    
    var listarItemsCarrito = function(){       
        $.ajax({
            url: "actions/api.php?action=listar-carrito",
            method: "GET",
            dataType: "json"
        }).done(function(res){
            if(! res.error){
                $('#carrito').html(res.data);
            }
        }).fail(function(res){
            alert(res.error.mensaje);
        });
    };
    
    listarItemsCarrito();
    
})(jQuery);
/*var total = 0;

$(document).ready(function(){

	if($('.linea').length == 0){
		$('.carrito tbody').html('<tr id="no-items"><td>Carrito vacío</td><td></td><td> 0 ítems</td></tr>'+
		                         '<tr id="total-carrito" class="linea-carrito total">' +
									'<td>TOTAL</td>' +
									'<td></td>' +
									'<td id="importe-total"> $ 0.00</td> ' +
								'</tr>');
	}
});

function agregarItem(producto, cantidad, precioLabel, precio){
	//alert("Nombre: " + nombre + " cantidad: " + cantidad + " precio: " + precio);
	$('.cabecera-carrito').removeClass('hide');
	$('.carrito tbody').children('#no-items').addClass('hide');
	var carritoContenido = $('.carrito tbody').html();
	$('.carrito tbody').html(carritoContenido + '<tr class="linea-carrito linea">' +						
								'<td><a href="">' + producto + '</a></td>' +
									'<td><a href="">' + cantidad + '</a></td>' +
									'<td class="importe"><a value="' + precio + '" href=""> ' + precioLabel + '</a></td>' +
								'</tr>');
	actualizarImporteTotal();
	
}

function actualizarImporteTotal(){

	if($('.linea').length > 0){
		//alert('hay items');	
		$('.linea td').each(function(){
			if( $(this).hasClass('importe') ){
				var importeLinea = $(this).find('a').attr('value');
				total += parseFloat(importeLinea);
			}
		});		
	}
	
	$('#importe-total').html(' $ ' + total);
}*/