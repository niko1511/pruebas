<?php
/*
leerPlantaControlador.php
-------------------------
- Crear el objeto $listaPlantas = new plantas();
- Llamar al método $datosPlanta = $listaPlantas->leerPlanta($_GET['idPlanta']);
- Llamamos a la vista leerPlantaVista.php
*/

include_once '../models/plantasModel.php';
$listaPlanta = new Plantas();
$datosPlanta = $datosPlanta = $listaPlanta->leerPlanta($_GET['idPlanta']);

include_once '../views/leerPlantaView.php';

?>