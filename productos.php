<?php 
    $seccion="Productos"; 
    include("./models/carrito.php");     
    if (!isset($_SESSION["objcarrito"])){ 
   	    $_SESSION["objcarrito"] = new Carrito(); 
    }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>     
        <?php require('partials/header.php'); ?> 
        <link rel="stylesheet" href="./assets/css/carrito.css">	
		<link rel="stylesheet" href="./assets/css/productos.css">	
        <link href="./assets/css/half-slider.css" rel="stylesheet">
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

        <!-- CONTENT -->
        <div class="container">

            <div class="row">
				
				<!-- SIDEBAR IZQUIERDA -->
				<div class="col-md-3 categorias">
					
					<!-- SUB MENU DE CATEGORIAS -->
					<ul id="sub-menu" class="nav nav-pills nav-stacked">
					  
					</ul>
					
					<!-- CARRITO DE COMPRAS -->
					<div id="carrito">
						
					</div>
				</div>
				
				<!-- LISTADO DE PRODUCTOS DE LA CATEGORIA -->
				<div id="listado-productos" class="col-md-9 listado">
					<h2 id="titulo-categoria" class="titulo-categoria"></h2>
					<div class="row">
						
					</div>
				</div>
				
			</div>
			
			<?php require('partials/footer.php') ?>

        </div>   
        
		<script src="./assets/js/carrito-compras.js"></script>
        <script src="./assets/js/utils.js"></script>
		<script src="./assets/js/producto.js"></script>
    </body>
</html>
