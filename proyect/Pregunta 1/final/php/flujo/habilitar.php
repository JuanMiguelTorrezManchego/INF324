se muestra a los usuarios habilitados
<input type="hidden" name="flujo" value="F1">
<input type="hidden" name="proceso" value="P9">
<input type="hidden" name="procesoAnterior" value="P8">

<table class="table is-striped">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            

        </thead>

        <?php
        $sql2 = "select U.id,U.nombre,U.apellido from personasfinal.usuario U, personasfinal.documentos D where U.idrol='U' and U.id=D.id";
        $resultado2 = mysqli_query($con, $sql2);
        while ($fila2 = mysqli_fetch_array($resultado2)) {
            echo "<tr>";
            echo "<td>" . $fila2["id"] . "</td>";
            //$id=$fila2["id"];
            echo "<td>" . $fila2["nombre"] . "</td>";
            echo "<td>" . $fila2["apellido"] . "</td>";
            echo "</tr>";
            echo "<br>";
            
        }
        ?>

    </table>
<?php
     $_SESSION["rol"]='O';
?>