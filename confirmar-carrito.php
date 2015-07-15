<?php 
    include('seguridad.php');
    $seccion = "Confirmar carrito";
    include("./models/carrito.php");  
        if (!isset($_SESSION["objcarrito"])){ 
            $_SESSION["objcarrito"] = new Carrito(); 
        }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>     
        <?php require('partials/header.php'); ?> 
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="./assets/css/confirmacion-compra.css" rel="stylesheet">
        <link href="./assets/css/carrito.css" rel="stylesheet">
    </head>
    <body>
	
        <?php require('partials/menu-principal.php') ?>
        
        <div class="container">

            <div class="row">
                
                <h1>Verificar datos para la Compra</h1>
				<div class="separador">
					<h2 class="subtitulo">Lugar de Entrega</h2>
					<div>
                        <label class="error-lugar hide">Debe completar calle, altura y elegir un barrio al menos.</label>
						<p>Seleccione una dirección: </p>
						<select id="lugar-entrega">
							<option id="domicilio-fijado"><?= $_SESSION["domicilio"]; ?></option>
							<option>Elegir otra</option>
						</select> 
						<p id="nuevo-lugar" class="hide">
							Indique otro lugar para la recibir su pedido: <br />
							<input id="calle" type="text" placeholder="Calle" />
							<input id="altura" type="text" class="input-corto" placeholder="Altura" /><br />
							<input id="piso" type="text" class="input-corto" placeholder="Piso" />
							<input id="depto" type="text" class="input-corto" placeholder="Depto" /><br />
							<select id="barrio">
								<option value="0">Seleccione un barrio</option>
								<option value="1">Agronomía</option>
								<option>Almagro</option>
								<option>Balvanera</option>
								<option>Barracas</option>
								<option>Belgrano</option>
								<option>Boedo</option>
								<option>Caballito</option>
								<option>Chacarita</option>
								<option>Coghlan</option>
								<option>Colegiales</option>
								<option>Constitución</option>
								<option>Flores</option>
								<option>Floresta</option>
								<option>La Boca</option>
								<option>La Paternal</option>
								<option>Liniers</option>
								<option>Mataderos</option>
								<option>Monte Castro</option>
								<option>Montserrat</option>
								<option>Nueva Pompeya</option>
								<option>Nuñez</option>
								<option>Palermo</option>
								<option>Parque Avellaneda</option>
								<option>Parque Chacabuco</option>
								<option>Parque Chas</option>
								<option>Parque Patricios</option>
								<option>Puerto Madero</option>
								<option>Recoleta</option>
								<option>Retiro</option>
								<option>Saavedra</option>
								<option>San Cristóbal</option>
								<option>San Nicolás</option>
								<option>San Telmo</option>
								<option>Versalles</option>
								<option>Villa Crespo</option>
								<option>Villa Devoto</option>
								<option>Villa General Mitre</option>
								<option>Villa Lugano</option>
								<option>Villa Luro</option>
								<option>Villa Ortúzar</option>
								<option>Villa Pueyrredón</option>
								<option>Villa Real</option>
								<option>Villa Riachuelo</option>
								<option>Villa Santa Rita</option>
								<option>Villa Soldati</option>
								<option>Villa Urquiza</option>
								<option>Villa del Parque</option>
								<option>Vélez Sarsfield</option>
							</select>
						</p>
					</div>
				</div>
				<div class="separador">
					<h2 class="subtitulo">Día de Entrega</h2>
					<div>
                        <label class="error-fecha hide">Debe elegir una fecha.</label>
						<p>Fecha para recibir el pedido: <input type="text" disabled id="datepicker"></p>
					</div>
				</div>
				<div class="separador">
					<h2 class="subtitulo">Costo de Envío</h2>
					<div>
						<p>Para pedidos inferiores a $ 500.00 el costo de envío es de $100.00. Mayor o igual a $ 500.00 envío gratis.</p>
						<p><b>El total de su pedido es: $ 580.00. El costo de envío: $ 0.00</b></p>
					</div>
				</div>
				<div class="separador">
					<h2 class="subtitulo">Revisión del Pedido</h2>
					<div id="listado-carrito">
						
					</div>
				</div>
				<button class="btn btn-primary btn-confirmar">Confirmar</button>
                
            </div>
            <?php require('partials/footer.php') ?>
		    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script src="./assets/js/carrito-compras.js"></script>
            <script src="./assets/js/confirmacion-compra.js"></script>
        </div>
        
    </body>
</html>