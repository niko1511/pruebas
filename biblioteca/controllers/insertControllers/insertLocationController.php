<?php

include_once '../../models/bibliotecaModel.php';

$ubicaciones = new Biblioteca();
$ubicaciones->leerUbicaciones();

include_once '../../views/headView.php';
include_once '../../views/insertLocationView.php';
include_once '../../views/footerView.php';

