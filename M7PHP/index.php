<?php 
session_start();

?><link rel="stylesheet" href="./frontend/css/BARRA.css" />
<link rel="stylesheet" href="./frontend/css/estilos.css" />
<link rel="stylesheet" href="./frontend/css/navbar.css" />
<nav class="navbar">
  <div class="logo">Iron<span>BUG</span></div>

  <input type="checkbox" id="burger-checkbox" />
  <label for="burger-checkbox" class="burger-label"></label>

  <ul class="navbar-list">
    <li class="navbar-item"><a href="index.php">Inicio</a></li>
    <li class="navbar-item"><a href="productos.php">Productos</a></li>
    <li class="navbar-item"><a href="https://www.reddit.com/r/deathrush/comments/s4cwzu/rdeathrush_lounge/">Foro</a></li>
    <?php
    if(isset($_SESSION["login"])){
      echo "<li class='navbar-item'><a href='carrito.php'>Carrito</a></li>";    
    echo "<li class='navbar-item'><a href='logout.php'>Cerrar Sesion</a></li>";
    echo "<li class='navbar-item'><a href='perfil.php'>".$_SESSION["login"]."</a></li>";
    if($_SESSION['rol'] == 2){
      echo "<li class='navbar-item'><a href='administrar.php'>Administrar</a></li>";
    }
    }else{
    echo "<li class='navbar-item'><a href='registrar.html'>Registrarse</a></li>";
    echo "<li class='navbar-item'><a href='iniciosesion.html'>IniciarSesion</a></li>";
    
    }
     ?>
  </ul>
</nav>
    <h1 style="text-align: center;">Bienvenido a la tienda de IronBug!</h1>
    <h2 style="text-align: center;">Donde podras comprar variedad de cosas</h2>
    <img src="wallpaper1.jpg" style="margin-left: 500px;">