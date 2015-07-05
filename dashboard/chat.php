<?php include('seguridad.php'); $seccion = "chat"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require('partials/header.php') ?>
    <link href="./assets/css/chat.css" rel="stylesheet">   
  </head>

  <body>

    <?php require('partials/menu-principal.php') ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require('partials/menu-lateral.php'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<iframe id="chat" class="ventana-chat" src="https://dashboard.zopim.com/?lang=en-us#home"></iframe>
	   </div>
      </div>
    </div>
    
    <?php require('partials/footer.php'); ?>
      
  </body>
</html>
