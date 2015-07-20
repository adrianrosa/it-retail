<?php 
    $seccion="Home"; 
    include("./models/carrito.php");  
    if (!isset($_SESSION["objcarrito"])){ 
   	    $_SESSION["objcarrito"] = new Carrito(); 
    }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php require('partials/header.php'); ?>
		
		<link rel="stylesheet" href="./assets/css/home.css">

		<link rel="stylesheet" href="./assets/css/productos.css">
		
        <link href="./assets/css/half-slider.css" rel="stylesheet">
		
		<link rel="stylesheet" href="./assets/css/jquery-ui.css">
        
		<link rel="stylesheet" href="./assets/css/carrito.css">
        
		<script src="./assets/js/vendor/jquery-1.10.2.js"></script>
		<script src="./assets/js/vendor/jquery-ui.js"></script>
		
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

        <header id="myCarousel" class="carousel slide slider">

        </header>

        <div class="container">

            <div class="row">
                
                <div class="col-md-9 destacados">
                    <h2 class="titulo-destacados">Productos Destacados</h2>
                    <div class="row" id="listado-destacados">
                        
                    </div> 
                </div>
				
				
                <div id="carrito" class="col-md-3">
					
                </div>
				
            </div>
			
            <?php require('partials/footer.php'); ?>

        </div>  
        
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/utils.js" defer></script>
		<script src="./assets/js/carrito-compras.js" defer></script>

    </body>
</html>
