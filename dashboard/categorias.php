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
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require('partials/menu-lateral.php') ?>
        </div>
        <div id="main-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Categorías</h1>
		  <button id="crear" class="btn btn-primary nuevo">Nuevo registro</button>
          <div class="table-responsive">
            <table id="tabla-categorias" class="table table-striped tabla-general">
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
                    <?php  
                        require('models/categoria.php');
                        $c = new Categoria();
                        $categorias = $c->obtenerTodasLasCategorias();
                    ?>
                    <?php foreach($categorias as $categoria): ?>
                    <tr>
                      <td class="categoriaId"><?= $categoria["IdCategoria"]; ?></td>
                      <td class="categoriaNombre"><?= $categoria["NombreCategoria"]; ?></td>
                      <td class="categoriaDescripcion"><?= $categoria["DescripcionCategoria"]; ?></td>
                      <td class="categoriaDescripcion"><?= $categoria["OrdenCategoria"]; ?></td>
                      <td>
                        <form class="form-inline" action="actions/actions.php" method="post">
                          <input type="hidden" name="id" value="<?= $categoria["IdCategoria"]; ?>"/>    
                          <input type="submit" name="action" class="btn btn-default editar" value="editar">
                          <input type="submit" name="action" class="btn btn-default eliminar" value="eliminar">
                        </form>
                      </td>
                    </tr>
                    <?php endforeach; ?>                     
              </tbody>
            </table>
			<?php //require('partials/dialog.php'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php require('partials/footer.php') ?>
    <script src="./assets/js/categorias.js"></script>
  </body>
</html>