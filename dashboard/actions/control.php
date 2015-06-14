<?php 
    
    $mysqli = new mysqli("localhost", "root", "admin", "it-retail");
    $rs = $mysqli->prepare("SELECT * FROM Usuario WHERE Email='".$_POST['email']."' AND Password='".$_POST['password']."';");
    $rs->execute();
    $rs->store_result();
    
    if($rs->num_rows > 0){
        session_name('user_id_session');
        session_start();  
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["autenticado"] = "si";
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
        $rs->close();
        header("Location: ../categorias.php");
    }else {
        header("Location: ../login.php?errorusuario=si");
        $rs->close();
    }

    /*if($_POST['usuario'] == "adrian" && $_POST['pass'] == "pucho"){
        
        session_name('user_id_session');
        session_start();
        
        $_SESSION["autenticado"] = "si";
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
        header("Location: aplicacion.php");
            
    } else {
        header("Location: index.php?errorusuario=si");
    }*/
?>