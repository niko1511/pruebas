<?php

/*modificarUbicacionVista.php
---------------------------
Crear un formulario con el campo de texto nombreUbi y, además, le pasamos el id a modificar:
<form action="../controladores/modificar2UbicacionControlador.php" method="POST">
    <input type="text" name="nombreUbi" value="<?php $datosUbi['Ubicacion']; ?>">
    <input type="hidden" name="idUbi" value="<?php $datosUbi['id']; ?>">
    <input type="submit" avlue="Añadir ubicación">
</form>*/


echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';
echo '<th>Aciones</th>';
echo '</tr>';

//print_r($listaUbicaciones->ubicaciones);

foreach ($listaUbicaciones->ubicaciones as $ubi) {
    //echo $ubi['id'];
    echo '<tr>';
    echo '<td>'.$ubi['id'].'</td>';
    echo '<td>'. $ubi['Ubicacion'].'</td>';
    echo "<td><a href='?id=".$ubi['id']."&Ubicacion=".$ubi['Ubicacion']."'>Modificar</a></td>";
    echo ' </th>';

    
}

echo '</table>';

if(empty($_GET)){
$nombreUbi = "";
}else{
    $nombreUbi = $_GET['Ubicacion'];
}
?>

<p>Crear un formulario con el campo de texto nombreUbi y, además, le pasamos el id a modificar:</p>
<form action="../controllers/modificarNewUbicacionController.php" method="POST">
    <input type="text" name="nombreUbi" value="<?= $nombreUbi; ?>">
    <input type="hidden" name="idUbi" value="<?= $_GET['id']; ?>">
    <input type="submit" value="modificar ubicación">
</form>