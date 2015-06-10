<?php include('seguridad.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/css/favicon.ico">

    <title>Dashboard - IT Retail</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <link href="./assets/css/dashboard/dashboard.css" rel="stylesheet">
		
    <link rel="stylesheet" href="./assets/css/jquery-ui.css">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IT Retail - Panel de Control</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php" target="_blank">Ir al ecommerce</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuario: <?= $_SESSION["email"]; ?></a></li>
            <li><a href="salir.php">Cerrar sesión</a></li>
            <!--<li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>-->
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Categorías</a></li>
            <li><a href="#">Productos</a></li>
			<li><a href="#">Usuarios</a></li>
            <li><a href="#">Sliders</a></li>
			<li><a href="chat.php">Chat</a></li>
            <!--<li><a href="#">FAQ</a></li>-->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Categorías</h1>
		  <button id="crear" class="btn btn-primary nuevo">Nuevo registro</button>
		  
		  <!-- Tabla de categorías -->
          <div class="table-responsive">
            <table class="table table-striped tabla-general">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Orden</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="id">1,001</td>
                  <td class="nombre">Servidores</td>
                  <td class="descripcion">Servidores y racks.</td>
                  <td class="orden">3</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,002</td>
                  <td class="nombre">Accesorios</td>
                  <td class="descripcion">Teclados, mouses, auriculares y cables.</td>
                  <td class="orden">1</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,003</td>
                  <td class="nombre">Notebooks</td>
                  <td class="descripcion">Laptops y Notebooks.</td>
                  <td class="orden">2</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,003</td>
                  <td class="nombre">Ultrabooks</td>
                  <td class="descripcion">Ultrabooks de HP.</td>
                  <td class="orden">4</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,004</td>
                  <td class="nombre">Memorias</td>
                  <td class="descripcion">Discos duros, RAM, Pendrives, Tarjetas SD.</td>
                  <td class="orden">5</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
              </tbody>
            </table>
			
			<!-- jQuery Dialog -->
			<div id="dialog-form" title="Crear nuevo">
			  <p class="validateTips">Complete todos los campos.</p>	 
			  <form>
				<fieldset>
				  <label for="nombre">Nombre</label>
				  <input type="text" name="nombre" id="nombre" class="text ui-widget-content ui-corner-all"><br /><br />
				  <label for="descripcion">Descripción</label><br />
				  <textarea name="descripcion" id="descripcion" cols="25"></textarea><br /><br />
				  <label for="orden">Orden</label>
				  <input type="text" name="orden" id="orden" class="text ui-widget-content ui-corner-all">		 
				  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
				</fieldset>
			  </form>
			</div>
			
          </div>
        </div>
      </div>
    </div>
	
    <!--<script src="js/vendor/jquery-1.11.2.min.js"></script>-->

	<script src="./assets/js/jquery-1.10.2.js"></script>
	<script src="./assets/js/jquery-ui.js"></script>
	
	<script src="./assets/js/dashboard/categoria.js"></script>
    <script src="./assets/js/vendor/bootstrap.min.js"></script>
		
  </body>
</html>
