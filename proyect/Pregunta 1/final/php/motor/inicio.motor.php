<?php
    include "conexion.php";
    $_SESSION["id"]=$_GET["id"];
    $flujo=$_GET["flujo"];
    $proceso=$_GET["proceso"];
    $procesoAnterior=$_GET["procesoAnterior"];
    $tramite=$_SESSION['tramite'];

    //echo $_SESSION["nombre"];
    //crea un nueno campo en la tabla flujo seguimiento
    $id=$_SESSION["id_usuario"];
    $rol=$_SESSION["rol"];
    $fecha=date('Y-m-d');
    $sql="insert into flujoprocesoseguimiento (FlujoP,Proceso,NroTramite,idUsuario,rol,FechaInicio) values('$flujo','$proceso','$tramite','$id','$rol','$fecha')";
    $resultado=mysqli_query($con,$sql);

    //se actualiza el campo anterior
    $sql="update flujoprocesoseguimiento set FechaFin='$fecha' where idUsuario='$id' and NroTramite='$tramite' and Proceso='$procesoAnterior'";
    $resultado=mysqli_query($con,$sql);

?>