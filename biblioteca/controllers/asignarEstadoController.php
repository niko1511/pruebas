<?php
include_once '../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();
$usuarios = $biblioteca->leerUsuarios();
$locations = $biblioteca->leerUbicacion($_GET['id_libro']);
$datoLibro = $biblioteca->leerLibro($_GET['id_libro']);

echo '<pre>';
//echo '" $biblioteca->usuarios  " ';
print_r($biblioteca->usuarios);
echo '" datos libro " ';
print_r($datoLibro);
print_r($locations);
echo '</pre>';

include_once '../views/asignarView.php';



