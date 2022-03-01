<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];   
$probar = $_FILES['foto']["tmp_name"]; 
echo "El nombre es ".$usuario;
$usuario2="";
$servidor="localhost";
$usuarioBD="root";
$password="usbw";
$bd="daw2";
if(isset($_POST['submit']))
{ 
$filepath = $_FILES["foto"]["name"];

if(move_uploaded_file($_FILES["foto"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
} 
$salt = substr(bin2hex(openssl_random_pseudo_bytes(16)),0,16);
$base64 = base64_encode($filepath);
$encrip = crypt('a',$contraseña);
$con=mysqli_connect($servidor,$usuarioBD,$password,$bd);
if(!$con){
die("no se ha podido realizar la conexion".mysqli_connect_error());

}else{
    if($contraseña == $contraseña2){
    if($contraseña != "" && $usuario != ""){
        $sql3="SELECT * FROM `usuarios` where '".$usuario."' like `usuario`";
        $consulta=mysqli_query($con,$sql3);
        while($fila=$consulta->fetch_assoc()){
        $usuario2=$fila["usuario"];
        }
    if($usuario != $usuario2){
    mysqli_set_charset($con,"utf8");
    echo "se ha conectado correctamente";
    $sql="INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `foto`, `rol`) VALUES (null,'".$usuario."', '".$encrip."','".$base64."', 1)";
    $consulta=mysqli_query($con,$sql);
    if(!$consulta){
        die("no se ha podido realizar el insert");
    }else{
        header('Location:productos.php');
    }
    }else{
        header('Location:registrar.html');
    }
}else{
    header('Location:registrar.html');
}
}else{
    header('Location:registrar.html',  "<script>alert('Contraseña Incorrecta');</script>");
}
}
?>