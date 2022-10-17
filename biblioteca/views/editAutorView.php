<?php
//print_r($datoAutor);
?>
<form action="../../controllers/editControllers/editAutorFormController.php" method="post">
    <label >Edit Autor</label><input type="text" name="nombre" value="<?php echo $datoAutor['nombre']?>">
    <input type="hidden" value="<?php echo $datoAutor['id']?>" name="id">
    <input type="submit" value="Modificar" name="modificar">
    <input type="submit" value="Cancelar" name="cancel">
</form>
