<?php

include_once '../models/marcasModel.php';
$listaMarcas = new marcas();
$listaMarcas->deleteMarcas($_GET['id']);

$listaMarcas->leerMarcas();

include_once '../views/leerMarcasView.php';
