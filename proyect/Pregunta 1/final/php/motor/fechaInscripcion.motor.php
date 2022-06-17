<?php

    
    //echo "Hola ".$_SESSION["id"];
    //echo "<br>";

    include "conexion.php";
    //session_start();
    $sql="select * from personasfinal.usuario where id=".$_SESSION["id"];
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_array($resultado);

    $nombrecompleto=$fila["nombre"];
    $idRol=$fila["idrol"];
    $sql1="select * from personasfinal.rol where idrol='$idRol'";
    $resultado1=mysqli_query($con,$sql1);
    $fila1=mysqli_fetch_array($resultado1);
    $rol=$fila1["idrol"];

    //nuevo campo
    $flujo=$_GET["flujo"];
    $proceso=$_GET["proceso"];
    $procesoAnterior=$_GET["procesoAnterior"];
    $tramite=$_SESSION['tramite'];

    $id=$_SESSION["id_usuario"];
    $rol=$_SESSION["rol"];
    $fecha=date('Y-m-d');
    $sql="insert into flujoprocesoseguimiento (FlujoP,Proceso,NroTramite,idUsuario,rol,FechaInicio) values('$flujo','$proceso','$tramite','$id','$rol','$fecha')";
    $resultado=mysqli_query($con,$sql);

    //se actualiza el campo anterior
    $sql="update flujoprocesoseguimiento set FechaFin='$fecha' where idUsuario='$id' and NroTramite='$tramite' and Proceso='$procesoAnterior'";
    $resultado=mysqli_query($con,$sql);

    //se agraga la fecha de inscripcion
    $fechaInicio=$_GET["fechaInicio"];
    $fechaFin=$_GET["fechaFin"];
    $sql="insert into personasfinal.fechas (fechaInicio,fechaFin) values('$fechaInicio','$fechaFin')";
    $resultado=mysqli_query($con,$sql);
?>