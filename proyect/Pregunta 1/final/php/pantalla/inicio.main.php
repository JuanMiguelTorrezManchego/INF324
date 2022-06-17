
<?php
    include "../motor/conexion.php";
    session_start();
    $_SESSION["rol"]=$_GET["rol"];
    if($_SESSION["rol"]=="O"){
        //echo "sesion de Oficina";
    }else{
        header("Location:otroRol.php");
    }
?>