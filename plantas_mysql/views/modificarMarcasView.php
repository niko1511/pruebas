<?php

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>ubicacion</th>';
echo '<th>Aciones</th>';
echo '</tr>';

foreach ($listaMarcas->marcas as $marca) {
    echo '<tr>';
    echo '<td>' . $marca['id'] . '</td>';
    echo '<td>' . $marca['Nombre'] . '</td>';
    echo "<td><a href='?id=" . $marca['id'] . "&Nombre=" . $marca['Nombre'] . "'>Modificar</a></td>";
    echo ' </th>';
}

echo '</table>';

if (empty($_GET)) {
    $Nombre = "";
    $id = "";
} else {

    $Nombre = $_GET['Nombre'];
    $id = $_GET['id'];
}
?>

<form action="../controllers/modificarMarcaController.php" method="POST">
    Nombre <input type="text" name="Nombre" value="<?= $Nombre; ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="submit" value="modificar marca">
</form>