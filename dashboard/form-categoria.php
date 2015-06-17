<?php 
    include('seguridad.php');
    require("models/categoria.php");
    $id = isset($_GET["IdCategoria"]) ? $_GET["IdCategoria"] : null;
    $tituloSeccion = empty($id) ? "Nueva Categoria" : "Editar categoría " . $id;
    $seccion = "categorias";
    $action = empty($id) ? "guardar" : "actualizar";
    $categoria = array();
    if($action == "actualizar"){
        $c = new Categoria();
        $categoria = $c->obtenerCategoria($id);
    }
?>
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
            <h1><?= $tituloSeccion; ?></h1>
            <hr/>
            <form class="form-horizontal" id="form-categoria">
                <?php if($id): ?>
                    <input type="hidden" name="id" value="<?= $id; ?>"/>                      
                <?php endif; ?>          
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="nombre">Nombre de la categoría</label>
                  <div class="col-sm-9">
                      <input name="nombre" type="text" class="form-control" id="nombre" value="<?= !empty($categoria) ? $categoria["NombreCategoria"] : ""?>">
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="descripcion">Descripción</label>
                  <div class="col-sm-9">
                    <textarea name="descripcion" class="form-control" rows="3" id="descripcion"><?= !empty($categoria) ? $categoria["DescripcionCategoria"] : ""; ?></textarea>
                    <span id="descripcion_error_icon" class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                    <span id="helpBlockDescripcion" class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="orden">Orden</label>
                  <div class="col-sm-9">
                    <input name="orden" class="form-control" rows="3" id="orden" maxlength="3" value="<?= !empty($categoria) ? $categoria["OrdenCategoria"] : ""; ?>" />
                    <span id="descripcion_error_icon" class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                    <span id="helpBlockDescripcion" class="help-block"></span>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary" name="action" value="<?= $action; ?>"/>
            </form>
        </div>
      </div>
    </div>
    <?php require('partials/footer.php') ?>
    <script type="text/javascript" src="./assets/js/form-categoria.js"></script>
  </body>
</html>