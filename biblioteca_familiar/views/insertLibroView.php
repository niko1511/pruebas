<form action="insertLibroController.php" method="post">
    <label for="title">Titulo del Libro</label>
    <input type="text" name="title"><br>
    <label for="author">Autor del Libro</label>
    <select name="autor">
        <?php
        foreach ($autores->autores as $autor) {
            echo "<option value='" . $autor['id'] . "'>" . $autor['nombre'] . "</option>";
        }
        ?>

    </select>
    <br>
    <label for="location">Ubicación</label>
    <select name="location">
        <?php
        foreach ($ubicaciones->locations as $location) {
            echo "<option value='" . $location['id'] . "'>" . $location['cordenadas'] . "</option>";
        }
        ?>

    </select>
     <br>
    <input type="submit" value="Agregar" name="insertar">
</form>