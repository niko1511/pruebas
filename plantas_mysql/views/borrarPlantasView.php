<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';
echo '<th>Aciones</th>';
echo '</tr>';
echo '<h1>Borrar plantas</h1>';
foreach ($listaPlantas->plantas as $planta) {
    echo '<tr>';
    echo '<td>' . $planta['id'] . '</td>';
    echo '<td>' . $planta['Nombre_cientifico'] . '</td>';
    echo "<td><a href='borrarThisPlantaController.php?idPlanta=" . $planta['id'] ."'>Borrar</a></td>";
    echo ' </th>';
}

echo '</table>';

?>
<a href="../controllers/leerPlantasController.php">Leer plantas</a><br>