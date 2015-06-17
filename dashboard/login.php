<!doctype html>
<html class="no-js" lang="">
	<head>
            <title>Iniciar sesión - Dashboard</title>
            <?php require('partials/header.php'); ?>		
            <link rel="stylesheet" href="./assets/css/dashboard/login.css">			
	</head>
	<body>
	<div class="container">
            <div class="row">
                <h1 class="titulo-login">IT Retail - Dashboard</h1>
                <div class="col-md-6 col-md-offset-3 form-login">
                    <form id="form-login" class="form-horizontal" method="POST" action="actions/control.php">
                      <legend>Iniciar sesion</legend>
                      <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                              <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
                            </div>		
                      </div>
                      <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Contraseña</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
                              <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
                            </div>
                      </div>
                      <div class="form-group btn-entrar">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button id="btn-login" type="submit" class="btn btn-primary btn-iniciar">Entrar</button><br />
                              <label id="label-error" class="control-label hide">Complete los campos marcados como requeridos</label>
                            </div>
                      </div>
                    </form>
                </div>
				
            </div>
        </div>		
	<?php require('partials/footer.php'); ?>
        <script type="text/javascript" src="./assets/js/login.js"></script>
	</body>
</html>