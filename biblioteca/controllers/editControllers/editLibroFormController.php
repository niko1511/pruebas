<?php
include_once '../../models/bibliotecaModel.php';

$biblioteca = new Biblioteca();
$biblioteca->leerUbicaciones();
$modificar = $biblioteca->leerLibro($_GET['id_libro']);
$datoAutor = $biblioteca->leerAutor($_GET['id_libro']);
$datoLocation = new Biblioteca();
$location = $datoLocation->leerUbicacion($modificar['id_estante']);
$title = $modificar['nombre'];

$autores = new Biblioteca();
$ubicaciones = new Biblioteca();
$autores -> leerAutors();
$ubicaciones -> leerUbicaciones();


include_once '../../views/headView.php';
?>



<form action="../../controllers/editControllers/editLibroController.php" method="post">
    
    <label>Titulo</label><input type="text" name="titulo" value="<?= $title ?>"><br>
    <label>Autor</label><select name="autor">
        <?php foreach ($autores->autores as $aut) {
            if ($aut['id'] == $modificar['id_autor']) {
                echo '<option value="' . $aut['id'] . '" selected>' . $aut['nombre'] . '</option>';
            }else{
                echo '<option value="' . $aut['id'] . '">' . $aut['nombre'] . '</option>';
            }
        }
        ?>
        </select><br><br>
    <label>Ubicación</label>

    <select name="ubicacion">
        <?php foreach ($ubicaciones->locations as $loc) {
            if ($loc['id'] == $_GET['id_libro']) {
                echo '<option value="' . $loc['id'] . '" selected>' . $loc['cordenadas'] . '</option>';
            }else{
                echo '<option value="' . $loc['id'] . '">' . $loc['cordenadas'] . '</option>';
            }
        }
        ?>
        </select><br>

        <input type="hidden" name="id" value="<?=$_GET['id_libro'] ?>">
        
        <input type="submit" value="Modificar">
</form>

<?php
include_once '../../views/footerView.php';
?>