<?php 

include_once '../../models/bibliotecaModel.php';

$deleteLocation = new Biblioteca();
$deleteLocation -> deleteAutor($_GET['id_libro']);


include_once '../../controllers/insertControllers/insertAutorController.php';