<nav class="navbar navbar-default navbar-static-top menu" role="navigation">
    <div class="container">
        <div class="col-md-8">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="index.php">IT-RETAIL</a>
            </div>            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                    <a class="item-menu" href="index.php">Home</a>
                </li>
                <li>
                    <a class="item-menu" href="productos.php">Productos</a>
                </li>
                <li>
                    <a class="item-menu" href="#">Nosotros</a>
                </li>
                <li>
                    <a class="item-menu" href="contacto.php">Contacto</a>
                </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 controles-sesion">
            <?php if(!isset($_SESSION["autenticado"])){ 
                echo '<button id="btn-login" class="btn btn-primary" onclick="window.location=\'login.php\';">LOGIN</button> &nbsp;&nbsp;';
                echo '<button class="btn btn-success" >REGISTRARSE</button>';
            } else {
    //<a href="confirmar-carrito.php"><span class="panel-login glyphicon glyphicon-shopping-cart"></span> Carrito</a>&nbsp;&nbsp;
                echo '<a href="perfil.php?usuario='.$_SESSION["email"].'&id='.$_SESSION["id"].'"><span class="panel-login glyphicon glyphicon-user"></span> Usuario: '.$_SESSION["email"].'</a>';
                echo ' &nbsp;&nbsp; <a href="salir.php"><span class="panel-login glyphicon glyphicon-off"></span> Salir</a>';
            } ?>   
        </div>
    </div>
</nav>