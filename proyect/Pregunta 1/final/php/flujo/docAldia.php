verificaion de documentos al dia
<input type="hidden" name="flujo" value="F1">
<input type="hidden" name="proceso" value="P8">
<input type="hidden" name="procesoAnterior" value="P6">
<table class="table is-striped">
        <thead>
            <th>Id</th>
            <th>CI</th>
            <th>C. Nacimiento</th>
            <th>Fecha Nacimiento</th>
            <th>Pago</th>
            <th>Operacion</th>

        </thead>

        <?php
        $sql2 = "select * from personasfinal.documentos ";
        $resultado2 = mysqli_query($con, $sql2);
        while ($fila2 = mysqli_fetch_array($resultado2)) {
            echo "<tr>";
            echo "<td>" . $fila2["id"] . "</td>";
            //$id=$fila2["id"];
            echo "<td>" . $fila2["ci"] . "</td>";
            echo "<td>" . $fila2["cnacimiento"] . "</td>";
            echo "<td>" . $fila2["fechanacimeinto"] . "</td>";
            echo "<td>" . $fila2["Pago"] . "</td>";
            echo "<td ><a href='../flujo/DocNegado.php?flujo=F1&proceso=P5&rol=U'>Negar</a></td>";
            echo "</tr>";
            echo "<br>";
            //echo $fila["idUsuario"];
        }
        ?>
    </table>