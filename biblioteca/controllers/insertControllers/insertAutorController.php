<?php
include_once '../../models/bibliotecaModel.php';

$leerAutors = new Biblioteca();
$leerAutors->leerAutors();

include_once '../../views/headView.php';
include_once '../../views/insertAutorView.php';
include_once '../../views/footerView.php';
?>