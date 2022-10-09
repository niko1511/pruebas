<?php 

include_once '../../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();

$datoUsuario = $biblioteca -> leerUsuario($_GET['id_libro']);
$biblioteca -> leerAutors($_GET['id_libro']);
echo '<pre>';
//print_r($_GET);
//print_r($biblioteca->autores);
//print_r($datoUsuario);

echo '</pre>';

include_once '../../views/headView.php';
//include '../views/leerEstadoView.php';
include_once '../../views/footerView.php';
