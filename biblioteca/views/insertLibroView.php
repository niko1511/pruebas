<section>
<form action="insertLibroController.php" method="post">
    <label for="title">Titulo del Libro</label>
    <input type="text" name="title"><br>
    <label for="author">Autor del Libro</label>
    <?php 
    if(!empty($autores->autores)){
        ?>
    <select name="autor">
        <?php
        
        foreach ($autores->autores as $autor) {
            echo "<option value='" . $autor['id'] . "'>" . $autor['nombre'] . "</option>";
        }
        ?>
        </select>
        <?php
    }else{
        echo " <strong>necesita agregar autores antes</strong>";
    }
        ?>

    
    <br>
    <label for="location">Ubicación</label>
    <?php
        if(!empty($ubicaciones->locations)){
            ?>
    <select name="location">
        <?php
        foreach ($ubicaciones->locations as $location) {
            echo "<option value='" . $location['id'] . "'>" . $location['cordenadas'] . "</option>";
        }
        ?>
        </select>
        <?php
    }else{
        echo " <strong>necesita agregar ubicaciones antes</strong>";
    }
        ?>

    
     <br>
     <?php
     if(!empty($ubicaciones->locations)){
     ?>
    <input type="submit" value="Agregar" name="insertar">
    <?php
    }else{
        ?>
        <input type="submit" value="Agregar" name="insertar" disabled>
        <?php
    }
    ?>
</form>
</section>