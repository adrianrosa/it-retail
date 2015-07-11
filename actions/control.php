<?php 
    require('../dashboard/models/conexion.php');
    $conexion = Conexion::obtenerInstancia();
    $usuario = $conexion->real_escape_string($_POST['email']);
    $contrasena = $conexion->real_escape_string($_POST['password']);
    //$rs = $conexion->prepare("SELECT * FROM Usuario WHERE Email='".$usuario."' AND Password='".$contrasena."';");
    $results = $conexion->query("SELECT * FROM Usuario WHERE Email='".$usuario."' AND Password='".$contrasena."';");
    $user = $results->fetch_assoc();
    
    /*$rs->execute();
    $rs->store_result();*/
    
    //if($rs->num_rows > 0){
    if(!empty($user["Email"])){
        //session_name('user_id_session');
        session_start();  
        $_SESSION["email"] = $usuario;
        $_SESSION["id"] = $user["IdUsuario"];
        $_SESSION["autenticado"] = "si";
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
        $results->free();
        header("Location: ../perfil.php?usuario=".$usuario."&id=".$user["IdUsuario"]);
    }else {
        $results->free();
        header("Location: ../login.php?errorusuario=si&email=".$usuario);
    }
?>