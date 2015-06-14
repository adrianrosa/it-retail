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
		  
		  <!-- Tabla de categorías -->
          <div class="table-responsive">
            <table class="table table-striped tabla-general">
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
                <tr>
                  <td class="id">1,001</td>
                  <td class="nombre">Servidores</td>
                  <td class="descripcion">Servidores y racks.</td>
                  <td class="orden">3</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,002</td>
                  <td class="nombre">Accesorios</td>
                  <td class="descripcion">Teclados, mouses, auriculares y cables.</td>
                  <td class="orden">1</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,003</td>
                  <td class="nombre">Notebooks</td>
                  <td class="descripcion">Laptops y Notebooks.</td>
                  <td class="orden">2</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,003</td>
                  <td class="nombre">Ultrabooks</td>
                  <td class="descripcion">Ultrabooks de HP.</td>
                  <td class="orden">4</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
                <tr>
                  <td class="id">1,004</td>
                  <td class="nombre">Memorias</td>
                  <td class="descripcion">Discos duros, RAM, Pendrives, Tarjetas SD.</td>
                  <td class="orden">5</td>
                  <td><button class="editar">Editar</button>&nbsp;<button>Eliminar</button></td>
                </tr>
              </tbody>
            </table>
			<?php require('partials/dialog.php'); ?>
          </div>
        </div>
      </div>
    </div>
	
      <?php require('partials/footer.php') ?>
  </body>
</html>
