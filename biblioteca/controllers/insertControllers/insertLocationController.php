<?php

include_once '../../models/bibliotecaModel.php';

$ubicaciones = new Biblioteca();
$ubicaciones->leerUbicaciones();

include_once '../../views/headView.php';
?>
<section>
<form action="../../controllers/insertControllers/insertNewLocationController.php" method="post">
    <label >Nueva Ubicacion</label><input type="text" name="new_location">
    <input type="submit" value="Agregar" name="agregar">
    <input type="submit" value="Cancelar" name="cancel">
</form>


<table>
    <tr>
        <th>Ubicaciones</th>
    </tr>
    <?php
    if(!empty($ubicaciones->locations)){
    foreach ($ubicaciones->locations as $loc) {
        echo '<tr>';
        echo '<td>' . $loc['cordenadas'] . '</td>';
        echo "<td> <a href='../../controllers/deleteControllers/deleteLocationController.php?id_libro=".$loc['id'] ."'>Borrar</a></td>";
        echo "<td> <a href='../../controllers/editControllers/editLocationController.php?id_libro=".$loc['id'] ."'>Modificar</a></td>";
        echo '</tr>';
    }
}else{
    echo 'La base de datos ubicaciones se encuentra vacía';
}
    ?>


</table>
</section>

<?php include_once '../../views/footerView.php'; ?>

