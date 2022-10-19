<?php

include_once '../models/marcasModel.php';
$listaMarcas = new marcas();
$listaMarcas->leerMarcas();

include_once '../views/borrarMarcasView.php';

?>

