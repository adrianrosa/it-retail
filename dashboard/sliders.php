<?php include('seguridad.php'); $seccion = "sliders"; ?>
<!doctype html>
<html class="no-js" lang="">
    <head>     
        <?php require('partials/header.php'); ?>  
        <link rel="stylesheet" href="./assets/js/vendor/bootstrap-table.css" />      
    </head>
    <body>
        <?php require('partials/menu-principal.php') ?>
          
        <div class="container">

            <div class="row">
            
                <div class="col-sm-3 col-md-2 sidebar menu-lateral">
                  <?php require('partials/menu-lateral.php') ?>
                </div>
                <div id="main-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                      <h1 class="page-header">Sliders</h1>
                      <a id="crear-slider" class="btn btn-primary nuevo">Nuevo registro</a>
                      <div class="table-responsive">
                        <table id="tabla-sliders" class="table table-striped tabla-general" data-sort-name="name" data-sort-order="desc">
                          <thead>
                            <tr>
                              <th data-field="id" data-align="right" data-sortable="true">#</th>
                              <th data-field="name" data-align="center" data-sortable="true">Título</th>
                              <th>Orden</th>
                              <th>Imagen</th>
                              <th>Acciones</th>
                              <th class="hide">Url</th>
                            </tr>
                          </thead>
                            <tbody>                                     
                          </tbody>
                        </table>
                      </div>

                    </div>
                    <?php require('partials/footer.php') ?>
            </div>   
        </div>
        <script src="./assets/js/sliders.js"></script>
        <script src="./assets/js/vendor/bootstrap-table.js"></script>
        <?php require("partials/confirm-modal.php"); ?>
    </body>
</html>