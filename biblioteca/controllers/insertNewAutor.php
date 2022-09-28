<?php
include '../models/bibliotecaModel.php';

echo '<pre>';
//print_r($_POST);
echo '</pre>';

if (isset($_POST['cancel']) == 'Cancel') {
    $biblioteca = new Biblioteca();
    $biblioteca->leerLibros();

    $statusLibro = new Biblioteca();
    $statusLibro->statusLibro();
    include_once '../views/headView.php';
    include_once '../views/leerBibliotecaView.php';
    //include_once '../controllers/insertLocationController.php';
    include_once '../views/footerView.php';
} else {
    if (!empty($_POST['new_autor'])) {

        $InsertNewLibro = new Biblioteca();
        $InsertNewLibro->InsertNewAutor($_POST['new_autor']);


        $biblioteca = new Biblioteca();
        $biblioteca->leerLibros();
    } else {
        echo 'campo vacio';
    }
    //include_once '../views/headView.php';
    //include_once '../views/leerBibliotecaView.php';
    include_once '../controllers/insertAutorController.php';
    include_once '../views/footerView.php';
}
