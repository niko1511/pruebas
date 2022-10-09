<?php
include_once '../../models/bibliotecaModel.php';
$datoLibro = new Biblioteca();
$dato = $datoLibro->leerLibro($_GET['id_libro']);

$datoLocation = new Biblioteca();
$location = $datoLocation->leerUbicacion($dato['id_estante']);

$datoAutor = new Biblioteca();
$autor = $datoAutor->leerAutor($dato['id_autor']);
include_once '../../views/headView.php';


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
            <td id="autor"><?php
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

    <div id="borrar-editar">
        <a href="../../controllers/deleteControllers/deleteLibroController.php?id_libro=<?php echo $_GET['id_libro'] ?>"><i class="fa-sharp fa-solid fa-trash"> delete</i></a>
        <a href="../../controllers/editControllers/editLibroFormController.php?id_libro=<?php echo $_GET['id_libro'] ?>"><i class="fa-sharp fa-solid fa-file-pen"> edit</i></a>
    </div>

</section>
<?php include_once '../../views/footerView.php';
?>