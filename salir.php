<?php
    session_name('ecommerce');
    session_start();
    session_destroy();
    header("Location: index.php");
?>
