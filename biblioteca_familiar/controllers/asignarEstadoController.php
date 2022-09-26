<?php 
include_once '../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();
$biblioteca->leerUsuarios();
$datoLibro = $biblioteca -> leerLibro($_GET['id_libro']);

echo '<pre>';
print_r($biblioteca->usuarios);
print_r($datoLibro);
echo '</pre>';
?>