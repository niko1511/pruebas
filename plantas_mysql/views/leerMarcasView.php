<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>marca</th>';

echo '</tr>';

foreach ($listaMarcas->marcas as $marca) {
   
    echo '<tr>';
    echo '<td>'.$marca['id'].'</td>';
     echo "<td><a href='../controllers/leerMarcaController.php?idPlanta=".$marca['id']."'>".$marca['Nombre']."</a></td>";
    echo ' </th>';
}
?>
</table>
<hr>
<a href='../controllers/modificarMarcasController.php'>Modificar marcas</a>
<br>
<a href='../controllers/borrarMarcasController.php'>Borrar marcas</a><br>


<a href="../controllers/insertarMarcasController.php">Insertar marcas</a>
<a href="../controllers/generarMarcasXMLController.php">generar XML</a>
<a href="../controllers/generarMarcasJSONController.php">generar JSON</a>