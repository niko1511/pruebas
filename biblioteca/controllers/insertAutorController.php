<?php
include_once '../models/bibliotecaModel.php';

$leerAutors = new Biblioteca();
$leerAutors->leerAutors();

echo '<pre>';
//print_r($ubicaciones->autores);
echo '</pre>';
include_once '../views/headView.php';
?>
<section>
<form action="../controllers/insertNewAutor.php" method="post">
    <label >Nuevo Autor</label><input type="text" name="new_autor">
    <input type="submit" value="Agregar" name="agregar">
    <input type="submit" value="Cancelar" name="cancel">
</form>


<table>
    <tr>
        <th>Autores</th>
    </tr>
    <?php
    foreach ($leerAutors->autores as $aut) {
        echo '<tr>';
        echo '<td>' . $aut['nombre'] . '</td>';
        echo '<td> <a href="">Borrar</a></td>';
        echo '<td> <a href="">Modificar</a></td>';
        echo '</tr>';
    }
    ?>


</table>
</section>
<?php 
include_once '../views/footerView.php';
?>