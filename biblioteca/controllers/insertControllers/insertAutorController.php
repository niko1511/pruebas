<?php
include_once '../../models/bibliotecaModel.php';

$leerAutors = new Biblioteca();
$leerAutors->leerAutors();

include_once '../../views/headView.php';
?>
<section>
<form action="../../controllers/insertControllers/insertNewAutor.php" method="post">
    <label >Nuevo Autor</label><input type="text" name="new_autor">
    <input type="submit" value="Agregar" name="agregar">
    <input type="submit" value="Cancelar" name="cancel">
</form>


<table>
    <tr>
        <th>Autores</th>
    </tr>
    <?php
     if(!empty($leerAutors->autores)){
    foreach ($leerAutors->autores as $aut) {
        echo '<tr>';
        echo '<td>' . $aut['nombre'] . '</td>';
        echo "<td> <a href='../../controllers/deleteControllers/deleteAutorController.php?id_libro=".$aut['id'] ."'>Borrar</a></td>";
        echo "<td> <a href='../../controllers/editControllers/editAutorController.php?id_libro=".$aut['id'] ."'>Modificar</a></td>";
        echo '</tr>';
    }
     }else{
        echo 'La base de datos Autores se encuentra vacía';
    }
    ?>


</table>
</section>
<?php 
include_once '../../views/footerView.php';
?>