<?php

include_once '../../models/bibliotecaModel.php';

$biblioteca = new Biblioteca();
$biblioteca -> actualizarStatusLibro($_POST['select_location'],$_POST['select_user']);

include_once '../../controllers/leerControllers/leerBibliotecaController.php';
?>