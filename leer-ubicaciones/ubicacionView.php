<?php

echo '<table>';
echo '<h2>Ubicacion</h2>';

echo '<table>';
echo '  <tr>';
foreach ($ubicaciones->ubicaciones as $ubi) {
    //echo $ubi['id'];
    echo '   <th>'. $ubi['Ubicacion'].'</th>';
    
}
echo ' </tr>';
echo '</table>';
?>