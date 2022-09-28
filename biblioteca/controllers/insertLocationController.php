<?php
include_once '../models/bibliotecaModel.php';

$ubicaciones = new Biblioteca();
$ubicaciones->leerUbicaciones();

echo '<pre>';
//print_r($ubicaciones->locations);
echo '</pre>';
include_once '../views/headView.php';
?>

<form action="../controllers/insertNewLocation.php" method="post">
    <label >Nueva Ubicacion</label><input type="text" name="new_location">
    <input type="submit" value="Agregar" name="agregar">
    <input type="submit" value="Cancelar" name="cancel">
</form>


<table>
    <tr>
        <th>Ubicaciones</th>
    </tr>
    <?php
    foreach ($ubicaciones->locations as $loc) {
        echo '<tr>';
        echo '<td>' . $loc['cordenadas'] . '<a href="">Modificar</a></td>';
        echo '</tr>';
    }
    ?>


</table>