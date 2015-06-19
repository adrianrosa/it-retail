<?php include('seguridad.php'); $seccion = "productos"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require('partials/header.php') ?>  		  
  </head>
  <body>
    <?php require('partials/menu-principal.php') ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require('partials/menu-lateral.php') ?>
        </div>
        <div id="main-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Productos</h1>
          <a id="crear" class="btn btn-primary nuevo" href="form-producto.php">Nuevo registro</a>
          <div class="table-responsive">
            <table id="tabla-productos" class="table table-striped tabla-general">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripción Corta</th>
                  <th>Descripción Larga</th>
                  <th>Precio</th>
                  <th>Categoría</th>
                  <th>Cantidad en stock</th>
                  <th>Es destacado</th>
                  <th>Acciones</th>
                  <th class="hide">Url</th>
                </tr>
              </thead>
                <tbody>                                     
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php require('partials/footer.php') ?>
    <script src="./assets/js/productos.js"></script>
  </body>
</html>