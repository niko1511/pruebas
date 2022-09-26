<?php 

include '../models/bibliotecaModel.php';
$datosUser = new Biblioteca();
$datosAutor = new Biblioteca();
$datosUser -> leerUsuario($_GET['id_libro']);
$datosAutor -> leerAutors($_GET['id_libro']);
echo '<pre>';
//print_r($_GET);
print_r($datosUser);
//print_r($datosAutor);

echo '</pre>';

include '../views/headView.php';
include '../views/leerEstadoView.php';
include '../views/footerView.php';
