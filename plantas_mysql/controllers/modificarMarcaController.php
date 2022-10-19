<?php

include_once '../models/marcasModel.php';
$listaMarcas = new marcas();


$listaMarcas->modificarMarcas($_POST['id'], $_POST['Nombre']);


include_once '../controllers/leerMarcasController.php';

?>

