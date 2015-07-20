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
                    <p>Teléfono: <?= $usuario["Telefono"]; ?></p>
                </div>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="confirmar-carrito.php">Ver mi carrito actual</a>
            </div>
            
            <?php require('./partials/footer.php'); ?>
			
        </div>   
      
		<script src="./assets/js/login.js" defer></script>

    </body>
</html>
