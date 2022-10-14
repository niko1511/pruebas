<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';

echo '</tr>';



foreach ($ubicaciones->ubicaciones as $ubi) {
    //echo $ubi['id'];
    echo '<tr>';
    echo '<td>'.$ubi['id'].'</td>';
    echo '<td>'. $ubi['Ubicacion'].'</td>';
  
    echo ' </th>';
}

echo '</table>';
?>
<a href="../controllers/modificarUbicacionController.php">Modificar</a><br>
<a href="../controllers/leerPlantasController.php">Leer plantas</a><br>