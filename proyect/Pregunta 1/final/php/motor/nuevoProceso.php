<?php
include "conexion.php";
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$sql = "select * from flujoproceso where FlujoP='$flujo' and Proceso='$proceso'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
$pantalla = $fila['Pantalla'];
$pantalla .= ".php";
$pantallaLogica = $fila['Pantalla'];
$pantallaLogica .= ".main.php";
$procesoSiguiente = $fila['ProcesoSiguiente'];
$procesAnterior = $proceso;
include "../pantalla/$pantallaLogica";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkFlow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <section class="hero is-primary">
        <div class="hero-body">
            <p class="title">
                Proceso de WorkFlow
            </p>
        </div>
    </section>

    <div class="columns is-centered">
        <div class="columns is-mobile">
            <div class="column ">
                <form class="box" action="motor.php" method="GET">
                    <input type="hidden" name="flujo" value="<?php echo $flujo; ?>">
                    <input type="hidden" name="proceso" value="<?php echo $procesoSiguiente; ?>">
                    <input type="hidden" name="procesoAnterior" value="<?php echo $procesAnterior; ?>">
                    <?php
                    include "../flujo/$pantalla";
                    //echo $pantalla;
                    ?>
                    <br>
                    <input class="button is-info is-light" type="submit" value="Anterior" name="Anterior">
                    <input class="button is-info is-light" type="submit" value="Siguiente" name="Siguiente">
                </form>
                <br>
                <a class="button is-danger is-light" href="../../index.php">Salir</a>
            </div>
        </div>

    </div>


</body>

</html>