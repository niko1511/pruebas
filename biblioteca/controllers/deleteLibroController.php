<?php 
include '../models/bibliotecaModel.php';

$deleteLibro = new Biblioteca();
$deleteLibro -> deleteLibro($_GET['id_libro']);

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();

$statusLibro = new Biblioteca();
$statusLibro = $biblioteca-> statusLibro();

include_once '../views/headView.php';
include_once '../views/leerBibliotecaView.php';
include_once '../views/footerView.php';

?>
