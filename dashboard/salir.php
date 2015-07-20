<?php
    session_name('dashboard');
    session_start();
    session_destroy();
    header("Location: login.php");
?>
