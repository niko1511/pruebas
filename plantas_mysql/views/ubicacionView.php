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
<a href="../controllers/generarPlantasXMLController.php">Generar plantas XML</a><br>
<a href="../controllers/generarPlantasJSONController.php">Generar plantas JSON</a><br>
<a href="../controllers/leerMarcasController.php"><h1>Examen2 Table Marcas</h1></a><br>