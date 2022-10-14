<?php
/*Leer Plantas
============

leerPlantasControlador
----------------------
- Crear el objeto $listaPlantas = new plantas();
- $listaPlantas->leerPlantas();
    ----> $listaPlantas->plantas tenemos un array con todas las plantas
- Llamaremos a la vista leerPlantasVista.php
*/

include_once '../models/plantasModel.php';
$listaPlantas = new Plantas();
$listaPlantas->leerPlantas();

include_once '../views/leerPlantasView.php';

