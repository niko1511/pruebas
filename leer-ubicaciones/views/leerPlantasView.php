<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>planta</th>';

echo '</tr>';



foreach ($listaPlantas->plantas as $planta) {
    //echo $ubi['id'];
    //echo '<pre>';
   // print_r($listaPlantas->plantas);
    echo '<tr>';
    echo '<td>'.$planta['id'].'</td>';
     echo "<td><a href='../controllers/leerPlantaControlador.php?idPlanta=".$planta['id']."'>".$planta['Nombre_cientifico']."</a></td>";
    echo ' </th>';
}

echo '</table>';
?>
