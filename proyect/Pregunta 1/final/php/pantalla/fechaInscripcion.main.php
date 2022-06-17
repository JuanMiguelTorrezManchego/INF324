
<?php

    include "../motor/conexion.php";
    session_start();
    $rol=$_GET["rol"];
    if($_SESSION["rol"]=="O"){
        //echo "sesion de Oficina";
    //echo $_SESSION["id"];
    $sql="select * from personasfinal.usuario where id=".$_SESSION["id"];
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_array($resultado);

    $nombrecompleto=$fila["nombre"];
    $idRol=$fila["idrol"];
    $sql1="select * from personasfinal.rol where idrol='$idRol'";
    $resultado1=mysqli_query($con,$sql1);
    $fila1=mysqli_fetch_array($resultado1);
    $rol=$fila1["idrol"];
    }else{
        header("Location:otroRol.php");
    }
    
?>