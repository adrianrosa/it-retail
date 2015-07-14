<?php
    //session_name('user_id_session');
    session_start();
    session_destroy();
    header("Location: login.php");
?>
