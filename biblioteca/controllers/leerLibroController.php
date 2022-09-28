<?php
include '../models/bibliotecaModel.php';
$datoLibro = new Biblioteca();
$dato = $datoLibro->leerLibro($_GET['id_libro']);
$datoAutor = new Biblioteca();
$autor = $datoAutor->leerAutor($_GET['id_libro']);
$datoLocation = new Biblioteca();
$location = $datoLocation->leerUbicacion($_GET['id_libro']);
include_once '../views/headView.php';
?>
<table>
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Ubicación</th>

    </tr>
    <tr>
        <td><?php echo $dato['nombre'] ?></td>
        <td><?php
            if (empty($autor['nombre'])) {
                echo '<a href="">agregar autor</a>';
            } else {
                echo $autor['nombre'];
            }

            ?></td>

        <td><?php
            if (empty($location['cordenadas'])) {
                echo '<a href="">agregar Ubicación</a>';
            } else {
                echo $location['cordenadas'];
            }

            ?></td>

    </tr>
</table>

<a href="../controllers/deleteLibroController.php?id_libro=<?php echo $_GET['id_libro'] ?>">Borrar</a>
<a href="../controllers/editLibroFormController.php?id_libro=<?php echo $_GET['id_libro'] ?>">Modificar</a>

<?php include_once '../views/footerView.php';
?>