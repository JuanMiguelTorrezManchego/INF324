documento negados
<?php
$flujo=$_GET["flujo"];
$procesoSiguiente=$_GET["proceso"];
$rol=$_GET["rol"];

header("Location:../motor/nuevoProceso.php?flujo=$flujo&proceso=$procesoSiguiente&rol=$rol");
?>