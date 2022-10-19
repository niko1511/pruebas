<?php


include_once '../models/MarcasModel.php';
$listaMarcas = new marcas();
$listaMarcas -> leerMarcas();

include_once '../views/insertarMarcaView.php';