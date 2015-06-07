<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/css/favicon.ico">

    <title>Dashboard - IT Retail</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link href="../assets/css/dashboard/dashboard.css" rel="stylesheet">
    <link href="../assets/css/dashboard/chat.css" rel="stylesheet">
      
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
            <li><a href="index.html" target="_blank">Ir al ecommerce</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuario: Adrian</a></li>
            <li><a href="#">Cerrar sesión</a></li>
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
            <li><a href="index.php">Categorías</a></li>
            <li><a href="#">Productos</a></li>
			<li><a href="#">Usuarios</a></li>
            <li><a href="#">Sliders</a></li>
			<li class="active"><a href="#">Chat</a></li>
            <!--<li><a href="#">FAQ</a></li>-->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<iframe id="chat" class="ventana-chat" src="https://dashboard.zopim.com/?lang=en-us#home"></iframe>
	   </div>
      </div>
    </div>

	<script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
		
  </body>
</html>