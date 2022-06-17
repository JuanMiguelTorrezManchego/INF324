<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <section class="hero is-info">
        <div class="hero-body">
            <p class="title">
                Bandeja de Entrada
            </p>
        </div>
    </section>

    <div  class="columns is-mobile is-centered">
        <?php
        include "conexion.php";
        session_start();
        $_SESSION["id"] = $_GET['id'];
        $sql = "select * from flujoprocesoseguimiento ";
        $sql .= "where idUsuario='" . $_SESSION["id"] . "' ";
        $sql .= "and FechaFin is null";
        $resultado = mysqli_query($con, $sql);
        ?>
        <table class="table is-striped">
            <thead>
                <th>Nro tramite</th>
                <th>Flujo</th>
                <th>Proceso</th>
                <th>Rol</th>
                <th>Fecha Inicio</th>
                <th>Operacion</th>
            </thead>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["NroTramite"] . "</td>";
                echo "<td>" . $fila["FlujoP"] . "</td>";
                echo "<td>" . $fila["Proceso"] . "</td>";
                echo "<td>" . $fila["rol"] . "</td>";
                echo "<td>" . $fila["FechaInicio"] . "</td>";
                echo "<td ><a href='nuevoProceso.php?flujo=" . $fila["FlujoP"] . "&proceso=" . $fila["Proceso"] . "&rol=" . $fila["rol"] . "'>Continuar</a></td>";
                echo "</tr>";
                echo "<br>";
                //echo $fila["idUsuario"];
            }
            ?>
        </table>
       
        
    </div>
    <div class="columns is-mobile is-centered">
        <a class="button is-link" href="carga.php">Nuevo Proceso</a>
            <a class="button is-danger" href="../../index.php">Salir</a>
    </div>
</body>

</html>