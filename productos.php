<?php $seccion="Productos"; ?>
<!doctype html>
<html class="no-js" lang="">
    <head>     
        <?php require('partials/header.php'); ?>        
		<link rel="stylesheet" href="./assets/css/productos.css">	
        <link href="./assets/css/half-slider.css" rel="stylesheet">
    </head>
    <body>
	
        <?php require('partials/menu-principal.php') ?>

        <!-- CONTENT -->
        <div class="container">

            <div class="row">
				
				<!-- SIDEBAR IZQUIERDA -->
				<div class="col-md-3 categorias">
					
					<!-- SUB MENU DE CATEGORIAS -->
					<ul id="sub-menu" class="nav nav-pills nav-stacked">
					  <!--<li role="presentation" class="active"><a href="#">Accesorios</a></li>
					  <li role="presentation"><a href="#">PCs</a></li>
					  <li role="presentation"><a href="#">Notebooks, Ultrabooks y Tablets</a></li>
					  <li role="presentation"><a href="#">All in One</a></li>
					  <li role="presentation"><a href="#">Impresoras</a></li>-->
					</ul>
					
					<!-- CARRITO DE COMPRAS -->
					<div class="carrito-compras">
						<h3 class="titulo-carrito">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							Carrito de compras
						</h3>
						<table class="carrito">
							<tbody>
								<!--<tr>
									<td>0 artíulos</td>
								</tr>-->
								<tr class="linea-carrito">
									<td><a href="">Producto 1</a></td>
									<td><a href=""> $ 200.00</a></td>
								</tr>
								<tr class="linea-carrito">
									<td><a href="">Producto 2</a></td>
									<td><a href=""> $ 200.00</a></td>
								</tr>
								<tr class="linea-carrito total">
									<td>TOTAL</td>
									<td> $ 400.00</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<!-- LISTADO DE PRODUCTOS DE LA CATEGORIA -->
				<div id="listado-productos" class="col-md-9 listado">
					<h2 id="titulo-categoria" class="titulo-categoria"></h2>
					<div class="row">
						<!--<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-1.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 1</h3>
								<p>Descripción corta del producto 1</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-2.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 2</h3>
								<p>Descripción corta del producto 2</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-3.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 3</h3>
								<p>Descripción corta del producto 3</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-4.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 4</h3>
								<p>Descripción corta del producto 4</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-5.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 5</h3>
								<p>Descripción corta del producto 5</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-6.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 6</h3>
								<p>Descripción corta del producto 6</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-7.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 7</h3>
								<p>Descripción corta del producto 7</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-8.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 8</h3>
								<p>Descripción corta del producto 8</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>
							<div class="col-md-4 thumbnail producto">
							<a href=""><img src="./assets/img/technics-q-c-250-160-9.jpg" alt="" class="img-thumbnail"></a>
							<div class="caption descripcion">
								<h3>Producto 9</h3>
								<p>Descripción corta del producto 9</p>
								<p><button class="glyphicon glyphicon-minus-sign menos"></button>&nbsp;<input type="text" value="1" maxlength="3" class="incremento" >&nbsp;<button class="glyphicon glyphicon-plus-sign mas"></button></p>
								<p><a href="#" class="btn btn-primary" role="button">Agregar al carrito</a></p>
							</div>
						</div>-->
					</div>
				</div>
				
			</div>
			
			<?php require('partials/footer.php') ?>

        </div>   
		
        <script src="./assets/js/utils.js"></script>
		<script src="./assets/js/producto.js"></script>
    </body>
</html>
