<?php 

    session_name('dashboard');
    session_start();

    if($_SESSION["autenticado"] != "si"){
        header('Location: login.php');
        exit();
    } else {
        $fechaGuardada = $_SESSION['ultimoAcceso'];
        $ahora = date('Y-n-j H:i:s');
        $tiempoTranscurrido = (strtotime($ahora) - strtotime($fechaGuardada));
        if($tiempoTranscurrido >= 1500){
            session_destroy();
            header('Location: login.php');
        } else {
            $_SESSION['ultimoAcceso'] = $ahora;
        }
    }
?>