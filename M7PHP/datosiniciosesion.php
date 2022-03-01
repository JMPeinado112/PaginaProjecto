<link href='ab.css' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul>
        <li class="signin-active"><a class="btn">Iniciar Sesion</a></li>

      </ul>
    </div>
    <div ng-app ng-init="checked = false">
				        <form class="form-signin" action="/datosiniciosesion.php" method="post" name="form">
          <label for="usuario">Usuario</label>
          <input class="form-styling" type="text" name="usuario" placeholder=""/>
          <label for="contraseña">Contrase&ntilde;a</label>
          <input class="form-styling" type="password" name="contraseña" placeholder=""/>
          <input type="checkbox" id="checkbox"/>
          <label for="checkbox" ><span class="ui"></span>Mantenme iniciado</label>
          <div class="btn-animate">
            <button type="submit" value="submit"class="btn-signin">Iniciar Sesion</button>
          </div>
				        </form>
<?php
session_start();
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];  //$_GET muestra los datos en el link, POST NO

$servidor="localhost";
$usuarioBD="root";
$password="usbw";
$bd="daw2";
$sesion = false;
$nickname="";
$con=mysqli_connect($servidor,$usuarioBD,$password,$bd);
if(!$con){
die("no se ha podido realizar la conexion".mysqli_connect_error());

}else{
    mysqli_set_charset($con,"utf8");
    $sql="SELECT * FROM `usuarios` WHERE 1";
    $consulta=mysqli_query($con,$sql);
    while($fila=$consulta->fetch_assoc()){
    if($fila['usuario'] == $usuario && $fila['contraseña'] == crypt('a',$contraseña)){
        $nickname =$fila['usuario'];
        $a=$fila['id'];
        $b=$fila['rol'];
        $sesion = true;
        $foto="<img src=".base64_decode($fila['foto'])." height=200 width=200 />";
        header('Location:productos.php');
    }else {
        
    }
    }
    if($sesion == true){
        echo "Se ha iniciado sesion correctamente, bienvenido " .$nickname; 
        $_SESSION['login']=$nickname;
        $_SESSION['id']=$a;
        $_SESSION['carrito'] = array();
        $_SESSION['foto2'] = $foto;
        $_SESSION['rol'] = $b;
        
    }else{
        header('Location:iniciosesion.html');
        echo "<script>alert('Contraseña Incorrecta');</script>";
    }
}
?>

