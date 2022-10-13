<?php
/*
leerPlantaVista.php
-------------------
Mostrar por pantalla los datos de la planta. Y estos datos estan recogidos en el array $datosPlanta.

*/
echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>Nombre cientifico</th>';
echo '<th>Nombre comun</th>';
echo '<th>Descripcion </th>';
echo '</tr>';
    echo '<tr>';
    echo '<td>'.$datosPlanta['id'].'</td>';
    echo '<td>'. $datosPlanta['Nombre_cientifico'].'</td>';
    echo '<td>'. $datosPlanta['Nombre_comun'].'</td>';
    echo '<td>'. $datosPlanta['Descripcion'].'</td>';
    echo ' </th>';
echo '</table>';
?>