
<?php

include "../motor/conexion.php";
session_start();

$rol=$_GET["rol"];

if($rol=="O"){
$sql="select * from personasfinal.usuario where id=".$_SESSION["id"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_array($resultado);
$nombrecompleto=$fila["nombre"];
$apellido=$fila["apellido"];
$idRol=$fila["idrol"];
$sql1="select * from personasfinal.rol where idrol='$idRol'";
$resultado1=mysqli_query($con,$sql1);
$fila1=mysqli_fetch_array($resultado1);
$rol=$fila1["idrol"];
$_SESSION["id_usuario"]=$fila["id"];
//echo $_SESSION["id_usuario"] ;
}else{
    header("Location:otroRol.php");
}

?>