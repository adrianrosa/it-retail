<?php
    $seccion = isset($seccion) ? $seccion : "";
?>
<ul class="nav nav-sidebar">
    <li class="titulo-menu">MENÚ</li>
    <li <?= $seccion=='categorias' ? 'class="active"' : ''; ?> ><a href="categorias.php">Categorías</a></li>
    <li <?= $seccion=='productos' ? 'class="active"' : ''; ?>><a href="productos.php">Productos</a></li>
    <li <?= $seccion=='usuarios' ? 'class="active"' : ''; ?>><a href="#">Usuarios</a></li>
    <li <?= $seccion=='sliders' ? 'class="active"' : ''; ?>><a href="sliders.php">Sliders</a></li>
    <li <?= $seccion=='chat' ? 'class="active"' : ''; ?>><a href="chat.php">Chat</a></li>
</ul>