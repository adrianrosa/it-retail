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