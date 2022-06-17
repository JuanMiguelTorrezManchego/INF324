usuario aceptado
<?php
    include "conexion.php";
    $usuario= $_GET["usuario"];
    $password= $_GET["password"];
    $sql="select * from personasfinal.usuario where usuario='$usuario' and password='$password'";
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_array($resultado);
    $id=$fila['id'];
    if($id==null){
        header("Location:login.php");
    }else{
        header("Location:bandeja.php?id=$id");
    }
   
?>