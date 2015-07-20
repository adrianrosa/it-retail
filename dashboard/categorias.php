<?php include('seguridad.php'); $seccion = "categorias"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require('partials/header.php') ?>  		  
  </head>
  <body>
    <?php require('partials/menu-principal.php') ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar menu-lateral">
          <?php require('partials/menu-lateral.php') ?>
        </div>
        <div id="main-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Categorías</h1>
           <a id="crear-categoria" class="btn btn-primary nuevo">Nuevo registro</a>
          <div class="table-responsive">      
              <div class="loading-div"><img src="./assets/img/ajax-loader.gif" ></div>
            <table id="tabla-categorias" class="table table-striped tabla-general table_sort">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Orden</th>
                  <th class="no-sort">Acciones</th>
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
    <script src="./assets/js/table-sort.js"></script>
    <script src="./assets/js/categorias.js"></script>
    <?php require("partials/confirm-modal.php"); ?>
  </body>
</html>