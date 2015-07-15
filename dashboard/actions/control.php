<?php 
    require('../models/conexion.php');
    $conexion = Conexion::obtenerInstancia();
    /*$usuario = $conexion->real_escape_string($_POST['email']);
    $contrasena = $conexion->real_escape_string($_POST['password']);*/

    $usuario = array();
    $usuario["Email"] = $conexion->real_escape_string($_POST['email']);
    $usuario["Password"] = $conexion->real_escape_string($_POST['password']);

    require('../models/usuario.php');
    $u = new Usuario();
    $user = $u->iniciarSesionUsuarioAdministrador($usuario);
 
    /*$rs = $conexion->prepare("SELECT * FROM Usuario WHERE Email='".$usuario."' AND Password='".$contrasena."' AND EsAdministrador = 1;");
    $rs->execute();
    $rs->store_result();*/
    
    //if($rs->num_rows > 0){
    if(!empty($user["Email"])){
        //session_name('user_id_session');
        session_start();  
        $_SESSION["email"] = $user["Email"];
        $_SESSION["autenticado"] = "si";
        $_SESSION["id"] = $user["IdUsuario"];
        $_SESSION["domicilio"] = $user["Domicilio"];
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
        //$rs->close();
        header("Location: ../categorias.php");
    }else {
        //$rs->close();
        header("Location: ../login.php?errorusuario=si&email=".$usuario["Email"]);
    }
?>