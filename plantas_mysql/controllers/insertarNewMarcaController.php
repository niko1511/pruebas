<?php

include_once '../models/marcasModel.php';
$listaMarcas = new marcas();
$listaMarcas ->insertMarcas($_POST['Nombre']);
$listaMarcas -> leerMarcas();


include_once '../views/leerMarcasView.php';



?>