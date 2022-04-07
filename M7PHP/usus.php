<?php
error_reporting(0);
session_start();
if($_SESSION['rol'] == 2){
$nombre=$_POST['filtro'];
$filtro=$_POST['xcarrera'];
$idborrar=$_GET['id'];
$where="";
$servidor="localhost";
$usuarioBD="root";
$password="usbw";
$bd="ironbug";
$contador=0;
$con=mysqli_connect($servidor,$usuarioBD,$password,$bd);
isset($_POST['buscar']);
$contador+1;
if(isset($_POST['buscar'])){
  if(empty($POST['xcarrera'])){
    $where = "where usuario like'".$nombre."%'";
  }else if(empty($_POST['filtro'])){
    $where = "where rol='".$filtro."'";
  }else{
    $where = "where usuario like '".$nombre."%'";
  }
}
  if(isset($_POST['modificar'])){
    header('Location:modifusuarios.php');
  }
  if(isset($_POST['borrar'])){
    echo $idborrar;
    $sql2="DELETE FROM `usuarios` WHERE `id` like ".$idborrar;
        $consulta=mysqli_query($con,$sql2);
  }
  if(isset($_POST['crear'])){
    header('Location:registrar.html');
  }

?>
<!DOCTYPE html>
<html lang = "en"> 
  
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initalice">
    <h1>Modificar Usuarios</h1>
    <link rel="stylesheet" href="f.css"/>
    <link rel="stylesheet" href="./frontend/css/BARRA.css" />
    <link rel="stylesheet" href="./frontend/css/estilos.css" />
    <link rel="stylesheet" href="./frontend/css/navbar.css" />
    
 
</head>
    <body>
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
    
    <div class="row"> 
    <form method="post">
    <input type="text" placeholder="Filtrar" name="filtro" class="filtro1">
      <select name="xcarrera" class="filtro">
       <option value="">Relevancia</option>
       <option value=1>Nivel admin 1</option>
       <option value=2>Nivel admin 2</option>
      </select>
      <button name="buscar" type="submit" class="filtro2">Filtrar</button>
    </form>
      </div>
        <?php  
        echo " <form method='post' action='prod.php'>
        <button name='crear' type='crear' class='crear'>Crear</button>
       </form>
       <br></br>"; 
        if($filtro==1){
          $argumento = "order by rol asc";
        }else{
          $argumento = "order by rol desc";
        }
        $sql2="SELECT * FROM `usuarios` $where $argumento";
        $consulta=mysqli_query($con,$sql2);
        while($fila=$consulta->fetch_assoc()){
            $hola=base64_decode($fila["foto"]);
            echo "<section>
             <div class='col'>
              <div class='card estilo-c'>
             
                  <div class='img-container'>
                    <img src=".$hola." alt='producto 1'>
                    
                  </div>
                
                <div class='info-container' >
                  <h3>".$fila["usuario"]."</h3>
                  <strong class = 'precio'>Nivel de admin ".$fila["rol"]."</strong>
                  <form method='post' action='modifusuarios.php?id=".$fila['id']."'>
                  <button name='modificar' type='submit' class='modifi-cart'>Modificar</button>
                 </form>
                <form method='post' action='usus.php?id=".$fila['id']."'>
                  <button name='borrar' type='submit' class='borrar-cart'>Borrar</button>
                 </form>
               
                </div>
                </div>
                </div>
              </div>
              <br>
          </section>";
           
            
        }
        ?>



    
    </body>
    </html>
   
<?php
}else{
  header('Location:index.html');
}
?>