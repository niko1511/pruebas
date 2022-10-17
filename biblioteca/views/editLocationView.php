<?php

?>

<form action="../../controllers/editControllers/editLocationFormController.php" method="post">
    <label >Edit Ubicacion</label><input type="text" name="cordenadas" value="<?php echo $ubic['cordenadas']?>">
    <input type="hidden" value="<?php echo $ubic['id']?>" name="id">
    <input type="hidden" value="<?php echo $ubic['id_cordenadas']?>" name="id_cordenadas">
    <input type="submit" value="Modificar" name="modificar">
    <input type="submit" value="Cancelar" name="cancel">
</form>



