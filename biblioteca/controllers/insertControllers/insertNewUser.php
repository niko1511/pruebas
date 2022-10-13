<?php
include_once '../../models/bibliotecaModel.php';
include_once '../../views/headView.php';

if (isset($_POST['cancel']) == 'Cancel') {
    $biblioteca = new Biblioteca();
    $biblioteca->leerUsuarios();

    $statusLibro = new Biblioteca();
    $statusLibro->statusLibro();

    include_once '../../controllers/leerControllers/leerBibliotecaController.php';
} else {
    if (!empty($_POST['new_user'])) {

        $InsertNewUser = new Biblioteca();
        $InsertNewUser->InsertNewUser($_POST['new_user']);


        $biblioteca = new Biblioteca();
        $biblioteca->leerLibros();
    }

    include_once '../../controllers/insertControllers/insertUserController.php';
    include_once '../../views/footerView.php';
}
