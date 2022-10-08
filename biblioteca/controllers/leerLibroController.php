<?php
include_once '../models/bibliotecaModel.php';
$datoLibro = new Biblioteca();
$dato = $datoLibro->leerLibro($_GET['id_libro']);

$datoLocation = new Biblioteca();
$location = $datoLocation->leerUbicacion($dato['id_estante']);

$datoAutor = new Biblioteca();
$autor = $datoAutor->leerAutor($dato['id_autor']);
include_once '../views/headView.php';


echo '<pre>';
//print_r($dato);

echo '<pre>';
?>
<section>
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
        <a href="../controllers/deleteLibroController.php?id_libro=<?php echo $_GET['id_libro'] ?>">Borrar</a><br>
        <a href="../controllers/editLibroFormController.php?id_libro=<?php echo $_GET['id_libro'] ?>">Modificar</a>
    </table>


</section>
<?php include_once '../views/footerView.php';
?>