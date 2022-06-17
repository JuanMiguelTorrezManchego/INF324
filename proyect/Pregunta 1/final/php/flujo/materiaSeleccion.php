Seleccion de Materias <br>
<label for="">ID </label>
<?php
        $sql2 = "select id from personasfinal.usuario where idrol='U' ";
        $resultado2 = mysqli_query($con, $sql2);
       
?>
<select name="id" id="">
    <?php 
    while ($fila2 = mysqli_fetch_array($resultado2)) {
            $id=$fila2["id"] ;
            echo "<option value='$id '>" . $id . "</option>";
           

        }
        ?>
    ?>
</select> <br>
<label for="">Materias</label>
<select name="materia" id="">
    <option value="Python">Python</option>
    <option value="PHP">PHP</option>
    <option value="Java">Java</option>
    <option value="Arduino">Arduino</option>
</select>

<input type="hidden" name="flujo" value="F1">
<input type="hidden" name="proceso" value="P10">
<input type="hidden" name="procesoAnterior" value="P9">