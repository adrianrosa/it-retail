<?php 
    include('seguridad.php');
    require("./dashboard/models/usuario.php");
    $usuario = array();
    $u = new Usuario();
    $id = $_SESSION["id"];
    $usuario = $u->obtenerUsuario($id);
    $tituloSeccion = $usuario["Apellido"]. ", " . $usuario["Nombre"];
    $seccion="Perfil ".$_SESSION["email"]; 
?>
<!doctype html>
<html class="no-js" lang="">
    <head>       
		<?php require('./partials/header.php'); ?>
        <link rel="stylesheet" href="assets/css/perfil.css" />
        <!--[if lt IE 9]>
            <script src="./assets/js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
	
        <?php require('partials/menu-principal.php') ?>

        <div class="container">
			
            <div class="row">
                <h1 class="titulo"><?= $tituloSeccion; ?></h1>
                <div class="col-md-4">
                    <img src="assets/img/user-icon.jpg" class="img-responsive" width="250" />
                </div>
                <div class="col-md-8 datos">
                    <p>Email: <?= $usuario["Email"]; ?></p>
                    <p>Sexo: Masculino</p>
                    <p>Fecha de nacimiento: 02/05/1978</p>
                    <p>Dirección: <?= $usuario["Domicilio"]; ?></p>
                    <p>Localidad: <?= $usuario["NombreLoc"]; ?></p>
                    <p>Teléfono: <?= $usuario["Telefono"]; ?> - Celular: </p>
                </div>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="confirmar-carrito.php">Ver mi carrito actual</a>
            </div>
            <div class="row compras">
                <h2>Compras</h2>
                <table id="tabla-compras" class="table table-bordered tabla-general table_sort">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Forma de Pago</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>11/07/2015</td>
                        <td>$ 580.00</td>
                        <td>Efectivo</td>
                        <td>En camino</td>
                        <td><a href="#">Ver detalle</a></td>
                      </tr>
                       <tr>
                        <td>09/07/2015</td>
                        <td>$ 480.00</td>
                        <td>Efectivo</td>
                        <td>Pagada</td>
                        <td><a href="#">Ver detalle</a></td>
                      </tr>
                  </tbody>
                </table>
            </div>
            <?php require('./partials/footer.php'); ?>
			
        </div>   
      
		<script src="./assets/js/login.js" defer></script>

    </body>
</html>
