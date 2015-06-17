<?php 
    require('../models/conexion.php');
    $conexion = Conexion::obtenerInstancia();
    $usuario = $conexion->real_escape_string($_POST['email']);
    $contrasena = $conexion->real_escape_string($_POST['password']);
    $rs = $conexion->prepare("SELECT * FROM Usuario WHERE Email='".$usuario."' AND Password='".$contrasena."' AND EsAdministrador = 1;");
    $rs->execute();
    $rs->store_result();
    
    if($rs->num_rows > 0){
        session_name('user_id_session');
        session_start();  
        $_SESSION["email"] = $usuario;
        $_SESSION["autenticado"] = "si";
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
        $rs->close();
        header("Location: ../categorias.php");
    }else {
        $rs->close();
        header("Location: ../login.php?errorusuario=si&email=".$usuario);
    }
?>