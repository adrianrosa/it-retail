<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php require('partials/header.php'); ?>

        <link rel="stylesheet" href="./assets/css/main.css">
		
		<link rel="stylesheet" href="./assets/css/home.css">

		<link rel="stylesheet" href="./assets/css/productos.css">
		
        <link href="./assets/css/half-slider.css" rel="stylesheet">
		
		<link rel="stylesheet" href="./assets/css/jquery-ui.css">
		
		<script src="./assets/js/jquery-1.10.2.js"></script>
		<!--<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script>
			var producto = "";
			var cantidad = 0;
			var precioLabel = "";
			var precio = 0.0;
			
			$(function() {
				$( "#dialog-confirm" ).dialog({
				  autoOpen: false,
				  resizable: true,
				  height: 250,
				  width: 400,
				  modal: true,
				  buttons: {
					"Si, agregarlo": function(){
												agregarItem(producto, cantidad, precioLabel, precio); 
												$( this ).dialog( "close" );
									},
					Cancel: function() {
					  $( this ).dialog( "close" );
					}
				  }
				});
			  
			   $( ".agregar-carrito" ).click(function() {
					producto = $(".agregar-carrito").siblings('h3').html();
					cantidad = $(".agregar-carrito").siblings('p').children('.incremento').val();
					precioLabel =   $(".agregar-carrito").siblings('.precio').html();
					precio =   $(".agregar-carrito").siblings('.precio').attr('price');
					$( "#dialog-confirm p #valor-dialog" ).html( producto + " <br />Cantidad: " + cantidad + "<br />" + precio );
					$( "#dialog-confirm" ).dialog( "open" );
				});
			});
		</script>-->
		
		<script type="text/javascript">
			window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
			d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
			_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
			$.src="http://v2.zopim.com/?2XhXhmsPbVJZT3JmcKAR5Uan1xakQxyD";z.t=+new Date;$.
			type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
		</script>
		
    </head>
    <body>
						
        <?php require('partials/menu-principal.php') ?>

        <!-- SLIDER -->
        <header id="myCarousel" class="carousel slide slider">
            <!--<ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol> -->

            <!--<div class="carousel-inner">
				<div class="item active">
					<div class="fill" style="background-image:url('./assets/img/disco-duro-sandisk.jpg');"></div>
					<div class="carousel-caption">
						<h2>Llegaron los nuevos discos duros de estado sólido</h2>
					</div>
				</div>
				<div class="item">
					<div class="fill" style="background-image:url('./assets/img/ultrabooks.jpg');"></div>
					<div class="carousel-caption">
						<h2>Conocé la última generación HP de Ultrabooks</h2>
					</div>
				</div>
				<div class="item">
					<div class="fill" style="background-image:url('./assets/img/datacenter_servidores.jpg');"></div>
					<div class="carousel-caption">
						<h2>Lo último en servidores y racks</h2>
					</div>
				</div>
            </div>-->
        </header>

        <!-- CONTENT -->
        <div class="container">

            <div class="row">
                
                <div class="col-md-9 destacados">
                    <h2 class="titulo-destacados">Productos Destacados</h2>
                    <div class="row" id="listado-destacados">
                        <!--<div class="col-md-6">
                            <div class="thumbnail producto">
                              <a href=""><img src="./assets/img/technics-q-c-250-160-1.jpg" alt="" class="img-thumbnail"></a>
                              <div class="caption descripcion">
                                <h3>Producto 1</h3>
                                <p class="descripcion">Descripción corta del producto 1</p>
								<p class="precio" price="200.00">$ 200.00</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
                                <a class="btn btn-primary agregar-carrito" role="button">Agregar al carrito</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail producto">
                              <a href=""><img src="./assets/img/technics-q-c-250-160-2.jpg" alt="" class="img-thumbnail"></a>
                              <div class="caption descripcion">
                                <h3>Producto 2</h3>
                                <p class="descripcion">Descripción corta del producto 2</p>
								<p class="precio">$ 200.00</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
                                <p><a href="#" class="btn btn-primary" onclick="if(confirm('desea agregarlo')){ location('procesar.php');}" role="button">Agregar al carrito</a></p>
                              </div>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="thumbnail producto">
                            <a href=""><img src="./assets/img/technics-q-c-250-160-3.jpg" alt="" class="img-thumbnail"></a>
                            <div class="caption descripcion">
                                <h3>Producto 3</h3>
                                <p class="descripcion">Descripción corta del producto 3</p>
								<p class="precio">$ 200.00</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
                                <p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
                            </div>
                            </div>
                        </div>
                        <div class="thumbnail producto">
                            <a href=""><img src="./assets/img/technics-q-c-250-160-4.jpg" alt="" class="img-thumbnail"></a>
                            <div class="caption descripcion">
                                <h3>Producto 4</h3>
                                <p class="descripcion">Descripción corta del producto 4</p>
								<p class="precio">$ 200.00</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
                                <p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
                            </div>
                        </div> -->
                    </div> 
                </div>
				
				<!-- SIDEBAR DERECHA -->
                <div class="col-md-3">
					
					<!-- CARRITO DE COMPRAS -->
					<!--<div class="carrito-compras">
						<h3 class="titulo-carrito">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							<!--<a onclick="actualizarCarrito();">Carrito de compras</a> -->
                            <!--<a>Carrito de compras</a>
						</h3>
						<table class="carrito">
							<thead>
								<tr class="cabecera-carrito hide">
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody>						
								<tr id="no-items">
									<td>0 artíulos</td>
								</tr>
								<tr class="linea-carrito linea">							
									<td><a href="">Producto 1</a></td>
									<td><a href="">1</a></td>
									<td class="importe"><a value="200.2" href=""> $ 200.20</a></td>
								</tr>
								<tr class="linea-carrito linea">								
									<td><a href="">Producto 2</a></td>
									<td><a href="">3</a></td>
									<td class="importe"><a value="400" href=""> $ 400.00</a></td>
								</tr> 
								<tr id="total-carrito" class="linea-carrito total">
									<td>TOTAL</td>
									<td></td>
									<td id="importe-total"> $ 0.00</td> 
								</tr>-->
							<!--</tbody>
						</table>
					</div>-->
                </div>
				
            </div>
			
			<!-- Dialog carrito 
			<div id="dialog-confirm" title="¿Desea agregarlo al carrito?">
			  <p><span class="ui-icon ui-icon-check" style="float:left;"></span><span id="valor-dialog"></span></p>
			</div>-->
			
            <?php require('partials/footer.php'); ?>

        </div>  
        
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/utils.js" defer></script>
		<script src="./assets/js/carrito-compras.js" defer></script>

    </body>
</html>
