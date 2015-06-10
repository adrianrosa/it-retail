<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php require('partials/header.php') ?>		
		<link rel="stylesheet" href="./assets/css/contacto.css">
    </head>
    <body>
	
        <?php require('partials/menu-principal.php') ?>

        <!-- CONTENT -->
        <div class="container">

            <div class="row">
			
				<div class="col-md-2"></div>
				
				<!-- FORMULARIO DE CONTACTO -->
				<div class="col-md-8 form-contacto">
					<form id="form-contacto" class="form-horizontal" method="POST" action="">
					  <legend>Contacto</legend>
					  <p>Escríbanos cualquier inquietud, duda o sugerencia que a la brevedad le responderemos.</p>
					  <div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
						  <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
						</div>		
					  </div>
					  <div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Nombre y Apellido</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" placeholder="Nombre y Apellido">
						  <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputMensaje" class="col-sm-2 control-label">Mensaje</label>
						<div class="col-sm-10">
						  <textarea id="inputMensaje" class="form-control" rows="3" placeholder="Escriba su mensaje aquí"></textarea>
						  <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							  <input type="checkbox"> Suscribirse al boletín semanal
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-primary" onclick="enviarFormContacto('form-contacto')">Enviar</button><br />
						  <label id="label-error" class="control-label hide">Complete los campos marcados como requeridos</label>
						</div>
					  </div>
					</form>
				</div>
				
				<div class="col-md-2"></div>
						
			</div>
			
			<!-- CONTACTOS -->
			<div class="row">
			
				<div class="col-md-3"></div>
				<div class="col-md-6 contactos">
					<h3>Comunicate con nosotros: </h3><br />
					<span class="glyphicon glyphicon-earphone"></span> 4-222-5231 <br /><br />
					<a href="mailto:mail@mail.com"><span class="glyphicon glyphicon-envelope"></span> mail@mail.com </a> <br /><br />
					<a href="http://www.facebook.com" target="_blank"><span class="glyphicon glyphicon-thumbs-up"></span> Fan page de facebook </a> <br /><br />
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
            <?php require('partials/footer.php') ?>

        </div>   

		<script src="./assets/js/contacto.js" defer></script>

    </body>
</html>
