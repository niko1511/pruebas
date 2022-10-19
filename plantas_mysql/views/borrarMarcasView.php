<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';
echo '<th>Aciones</th>';
echo '</tr>';
echo '<h1>Borrar marcas</h1>';
foreach ($listaMarcas->marcas as $marca) {
    echo '<tr>';
    echo '<td>' . $marca['id'] . '</td>';
    echo '<td>' . $marca['Nombre'] . '</td>';
    echo "<td><a href='borrarThisMarcaController.php?id=" . $marca['id'] ."'>Borrar</a></td>";
    echo ' </th>';
}

echo '</table>';

?>
