<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';
echo '<th>Aciones</th>';
echo '</tr>';

foreach ($listaPlantas->plantas as $planta) {
    echo '<tr>';
    echo '<td>' . $planta['id'] . '</td>';
    echo '<td>' . $planta['Nombre_cientifico'] . '</td>';
    echo "<td><a href='?id=" . $planta['id'] . "&Nombre_cientifico=" . $planta['Nombre_cientifico'] . "&Nombre_comun=" . $planta['Nombre_comun'] . "&Descripcion=" . $planta['Descripcion'] . "&stock=" . $planta['stock'] . "'>Modificar</a></td>";
    echo ' </th>';
}

echo '</table>';

if (empty($_GET)) {
    $Nombre_cientifico = "";
    $Nombre_comun = "";
    $Descripcion = "";
    $stock = "";
} else {
   
    $Nombre_cientifico = $_GET['Nombre_cientifico'];
   $Nombre_comun = $_GET['Nombre_comun'];
    $Descripcion = $_GET['Descripcion'];
    $stock = $_GET['stock'];
}
?>

<form action="../controllers/modificarPlantaController.php" method="POST">
Nombre cientifico<input type="text" name="Nombre_cientifico" value="<?= $Nombre_cientifico; ?>"><br>
    Nombre comun<input type="text" name="Nombre_comun" value="<?= $Nombre_comun; ?>"><br>
    Descripcion<textarea name="Descripcion"  cols="30" rows="10" ><?= $Descripcion; ?></textarea><br>
    stock<input type="text" name="stock" value="<?= $stock; ?>"><br>
    <input type="hidden" name="idUbi" value="<?= $_GET['id']; ?>"><br>
    <input type="submit" value="modificar planta">
</form>
