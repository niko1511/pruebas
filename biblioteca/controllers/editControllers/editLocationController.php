<?php 

include_once '../../models/bibliotecaModel.php';

$editLocation = new Biblioteca();
$editLocation -> editLocation($_GET['id_libro']);


include_once '../../controllers/insertLocationController.php';