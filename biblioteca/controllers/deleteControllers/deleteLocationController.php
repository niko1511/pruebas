<?php 

include_once '../../models/bibliotecaModel.php';

$deleteLocation = new Biblioteca();
$deleteLocation -> deleteLocation($_GET['id_libro']);


include_once '../../controllers/insertControllers/insertLocationController.php';