<?php
/*
insertar2PlantaControlador.php
------------------------------
crear el objeto $listaPlantas que es una instancia de plantas
Llamaremos al método $listaPlantas->insertarPlanta($_POST['nombre_cientifico'],
                                                   $_POST['nombre_comun'],
                                                   $_POST['descripcion'],
                                                   $_POST['stock'],
                                                   $_POST['idUbi'])
Llamaremos a $listaPlantas->leerPlantas()
Llamaremos a la vista leerPlantasVista()
*/
//echo '<pre>';
//print_r($_POST);
include_once '../models/plantasModel.php';
$listaPlantas = new Plantas();
$listaPlantas->insertarPlanta(
    $_POST['nombre_cientifico'],
    $_POST['nombre_comun'],
    $_POST['descripcion'],
    $_POST['stock'],
    $_POST['idUbi']
);

$listaPlantas->leerPlantas();

include_once '../views/leerPlantasView.php';
