
<form action="../../controllers/editControllers/editUserFormController.php" method="post">
    <label >Edit User</label><input type="text" name="nombre" value="<?php echo $datoUser['nombre']?>">
    <input type="hidden" value="<?php echo $datoUser['id']?>" name="id">
    <input type="submit" value="Modificar" name="modificar">
    <input type="submit" value="Cancelar" name="cancel">
</form>
