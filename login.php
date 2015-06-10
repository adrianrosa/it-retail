<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Iniciar sesión - Ecommerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="./assets/css/favicon.ico">

        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="./assets/css/main.css">
		
		<link rel="stylesheet" href="./assets/css/login.css">

        <!--[if lt IE 9]>
            <script src="./assets/js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
	
        <?= require('partials/menu-principal.php') ?>

        <div class="container">
		
			<!-- FORMULARIO DE LOGIN -->
            <div class="row">
				
				<div class="col-md-3"></div>
				<div class="col-md-6 form-login">
					<form id="form-login" class="form-horizontal" method="POST" action="">
					  <legend>Iniciar sesion</legend>
					  <div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
						  <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
						</div>		
					  </div>
					  <div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Contraseña</label>
						<div class="col-sm-10">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
						  <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
						</div>
					  </div>
					  <div class="form-group btn-entrar">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-primary" onclick="enviarFormLogin('form-login')">Entrar</button><br />
						  <label id="label-error" class="control-label hide">Complete los campos marcados como requeridos</label>
						</div>
					  </div>
					</form>
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
			<!-- FOOTER -->
            <div class="row footer">
                <div class="col-md-4">Copyright &copy; 2015 Ecommerce S.R.L</div> 
                <div class="col-md-8 links">
                    <a href="#">Preguntas frecuentes</a>        
                </div>
            </div>

        </div>   

		<script src="./assets/js/login.js" defer></script>
		
        <script src="./assets/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="./assets/js/vendor/bootstrap.min.js"></script>

        <script src="./assets/js/main.js"></script>

    </body>
</html>
