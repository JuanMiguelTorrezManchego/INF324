<?php
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

    $idnuevo="1";
    $id=$_SESSION["id"];
    $rolNuevo="O";
    $fecha=date('Y-m-d');
    $sql="insert into flujoprocesoseguimiento (FlujoP,Proceso,NroTramite,idUsuario,rol,FechaInicio) values('$flujo','$proceso','$tramite','$idnuevo','$rolNuevo','$fecha')";
    $resultado=mysqli_query($con,$sql);
    //echo $id;
    //se actualiza el campo anterior
    $rol=$_SESSION["rol"];
    $sql="update flujoprocesoseguimiento set FechaFin='$fecha' where idUsuario='$id' and NroTramite='$tramite' and Proceso='$procesoAnterior'";
    $resultado=mysqli_query($con,$sql);

    //se agrega a la tabla documentos
    $ci=$_GET["CI"];
    if($_GET["nacimiento"]=='1'){
        $nacimiento=1;
    }else{
        $nacimiento=0;
    }
    $fecha=$_GET["fecha"];

    if($_GET["pago"]=='1'){
        $pago=1;
    }else{
        $pago=0;
    }
    $_SESSION["rol"]='O';
    $sql="insert into personasfinal.documentos (id,ci,cnacimiento,fechanacimeinto,Pago) values('$id','$ci','$nacimiento','$fecha','$pago')";
    $resultado=mysqli_query($con,$sql);


?>