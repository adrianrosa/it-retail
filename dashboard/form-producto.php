<?php 
    include('seguridad.php');
    require("models/producto.php");
    require("models/categoria.php");
    $id = isset($_GET["IdProducto"]) ? $_GET["IdProducto"] : null;
    $seccion = "productos";
    $action = empty($id) ? "guardar" : "actualizar";
    $tituloSeccion = "Nuevo Producto";
    $producto = array();
    if($action == "actualizar"){
        $p = new Producto();
        $producto = $p->obtenerProducto($id);
        $tituloSeccion = "Editar producto: " . $producto["NombreProducto"];
    }
    $c = new Categoria();
    $categorias = $c->obtenerTodasLasCategorias();
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
            <form class="form-horizontal" id="form-producto">
                <?php if($id): ?>
                    <input type="text" class="hide" name="id" value="<?= $id; ?>"/>   
                <?php endif; ?>          
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="nombre">Nombre</label>
                  <div class="col-sm-9 campo">
                      <input name="nombre" type="text" class="form-control" id="nombre" value="<?= !empty($producto) ? $producto["NombreProducto"] : ""?>">
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="descripcion">Descripción corta</label>
                  <div class="col-sm-9 campo">
                    <textarea name="descripcionCorta" class="form-control" rows="3" id="descripcionCorta"><?= !empty($producto) ? $producto["DescripcionCortaProducto"] : ""; ?></textarea>
                    <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="descripcion">Descripción larga</label>
                  <div class="col-sm-9 campo">
                    <textarea name="descripcionLarga" class="form-control" rows="5" id="descripcionLarga"><?= !empty($producto) ? $producto["DescripcionLargaProducto"] : ""; ?></textarea>
                    <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="nombre">Precio</label>
                  <div class="col-sm-9 campo">
                      <input name="precio" type="text" maxlength="9" class="form-control" id="precio" value="<?= !empty($producto) ? $producto["PrecioProducto"] : ""?>">
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="nombre">Cantidad en stock</label>
                  <div class="col-sm-9 campo">
                      <input name="stock" type="text" maxlength="4" class="form-control" id="stock" value="<?= !empty($producto) ? $producto["CantidadStockProducto"] : ""?>">
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="nombre">Categoría</label>
                  <div class="col-sm-9 campo">
                      <input id="categoria-val" type="text" class="hide" value="<?= !empty($producto) ? $producto["CategoriaProducto"] : ""?>">
                      <?php 
                        echo "<select id='categoria' class='form-control' name='categoria'>";
                        foreach($categorias as $categoria){
                            echo "<option value='" . $categoria['IdCategoria'] . "'>" . $categoria['NombreCategoria'] . "</option>";
                        }             
                        echo "</select>";
                      ?>
                      <span class="hide glyphicon glyphicon-remove form-control-feedback"></span>
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label col-sm-3" for="orden">Es destacado</label>
                  <div class="col-sm-9">
                    <input type="checkbox" name="esDestacado" id="esDestacado" <?php if(!empty($producto)){ if($producto["EsDestacado"]==1) echo "checked='checked'"; }  ?>  />
                  </div>
                </div>
                <?php if(!empty($producto)){ ?>                                    
                        <div class="form-group has-feedback">
                          <label class="control-label col-sm-3" for="urlImagen">Imagen</label>
                          <div class="col-sm-9 campo">
                              <img id="img" src="<?= $producto['Path'] . $producto['IdImagen'] . '/' . $producto['FileName'] ?>" width="250" height="250" />
                              <input id="urlImagen" name="urlImagen" type="file" class="form-control" value="" /><br />
                              <input type="text" name="IdImagen" id="id-subida" class="hide" />
                          </div> 

                        </div>
                    <?php } else {?>                  
                         <div class="form-group has-feedback">
                          <label class="control-label col-sm-3" for="urlImagen">Imagen</label>
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
            </form>
        </div>
      </div>
    </div>
    <?php require('partials/footer.php') ?>
    <script type="text/javascript" src="./assets/js/form-producto.js"></script>
  </body>
</html>