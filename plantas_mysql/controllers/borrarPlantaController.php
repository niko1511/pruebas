<?php

include_once '../models/plantasModel.php';
$listaPlantas = new Plantas();
$listaPlantas->leerPlantas();

include_once '../views/borrarPlantasView.php';

?>

