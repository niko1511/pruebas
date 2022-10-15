<?php

include_once '../models/plantasModel.php';
$listaPlantas = new Plantas();
//print_r($_GET);
$listaPlantas->borrarPlanta($_GET['idPlanta']);

$listaPlantas->leerPlantas();

include_once '../views/borrarPlantasView.php';
