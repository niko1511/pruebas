<?php

include_once '../models/plantasModel.php';
$listaPlantas = new Plantas();


$listaPlantas->modificarPlanta($_POST['idUbi'], $_POST['Nombre_cientifico'],  $_POST['Nombre_comun'], $_POST['Descripcion'],  $_POST['stock']);


include_once '../controllers/leerPlantasController.php';

?>

