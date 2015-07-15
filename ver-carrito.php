<?php 
    $seccion = "Ver carrito"; 
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php require('partials/header.php') ?>		
    </head>
    <body>
	
        <?php require('partials/menu-principal.php') ?>

        <div class="container">

            <div class="row">
			
				<div class="col-md-12">
                    <table id="tabla-carrito" class="table table-striped tabla-general table_sort">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Descripción Corta</th>
                          <th class="hide">Descripción Larga</th>
                          <th>Precio $</th>
                          <th>Categoría</th>
                          <th>Cantidad en stock</th>
                          <th class="hide">Es destacado</th>
                          <th class="no-sort">Acciones</th>
                          <th class="hide">Url</th>
                        </tr>
                      </thead>
                        <tbody>                                     
                      </tbody>
                    </table>
                </div>
						
			</div>
			
            <?php require('partials/footer.php') ?>
            <script src="./assets/js/carrito-compras.js"></script>
        </div>   
    </body>
</html>
