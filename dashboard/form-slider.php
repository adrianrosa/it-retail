<?php 
    include('seguridad.php');
    require("models/slider.php");
    $id = isset($_GET["IdSlider"]) ? $_GET["IdSlider"] : null;
    $seccion = "sliders";
    $action = empty($id) ? "guardar" : "actualizar";
    $tituloSeccion = "Nuevo Slider";
    $slider = array();
    if($action == "actualizar"){
        $s = new Slider();
        $slider = $s->obtenerSlider($id);
        $tituloSeccion = "Editar slider: " . $slider["IdSlider"];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require('partials/header.php') ?>  	
    <link rel="stylesheet" href="./assets/css/forms.css" />
  </head>
  <body>
    <?php require('partials/menu-principal.php') ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar menu-lateral">
          <?php require('partials/menu-lateral.php') ?>
        </div>
        <div id="main-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1><?= $tituloSeccion; ?></h1>
            <hr/>
            <form class="form-horizontal" id="form-slider">
                <?php if($id): ?>
                    <input type="text" class="hide" name="id" value="<?= $id; ?>"/>   
                <?php endif; ?>          
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3 label-form" for="nombre">Título</label>
                  <div class="col-sm-9 campo">
                      <input name="titulo" type="text" class="form-control" id="titulo" value="<?= !empty($slider) ? $slider["TituloImagen"] : ""?>">
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3 label-form" for="orden">Orden</label>
                  <div class="col-sm-9 campo num">
                      <a class="btn btn-secondary glyphicon glyphicon-minus-sign menos"></a>
                      &nbsp;<input type="text" id="orden" value="<?= !empty($slider) ? $slider["OrdenImagen"] : "1"; ?>" maxlength="3" class="incremento" id="orden" name="orden" />&nbsp;
                      <a class="btn btn-secondary glyphicon glyphicon-plus-sign mas"></a>
                    <span id="descripcion_error_icon" class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                    <span id="helpBlockDescripcion" class="help-block"></span>
                      
                  </div>
                </div>
                <?php if(!empty($slider)){ ?>                                    
                        <div class="form-group has-feedback">
                          <label class="control-label col-sm-3 label-form" for="urlImagen">Imagen</label>
                          <div class="col-sm-9 campo">
                              <img id="img" src="<?= $slider['Path'] . $slider['IdImagen'] . '/' . $slider['FileName'] ?>" width="250" height="250" />
                              <input id="urlImagen" name="urlImagen" type="file" class="form-control" value="" /><br />
                              <input type="text" name="IdImagen" id="id-subida" class="hide" />
                          </div> 

                        </div>
                    <?php } else {?>                  
                         <div class="form-group has-feedback">
                          <label class="control-label col-sm-3 label-form" for="urlImagen">Imagen</label>
                          <div class="col-sm-9 campo">
                              <input id="urlImagen" name="urlImagen" type="file" class="form-control" value="" esalta="1" /><br />
				<img id="img" class="hide" src="" width="250" height="250" />
                              <input type="text" name="IdImagen" id="id-subida" class="hide" />
                              <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                              <span class="help-block"></span>
                          </div> 
                        </div>        
                    <?php  } ?>               
                <input type="submit" class="btn btn-primary btn-accion" name="action" value="<?= $action; ?>"/>
                <button id="cancelar" class="btn btn-default" onclick="window.location='sliders.php'; return false;">Cancelar</button>
            </form>
        </div>
      </div>
    </div>
    <?php require('partials/footer.php') ?>
    <script type="text/javascript" src="./assets/js/form-sliders.js"></script>
  </body>
</html>