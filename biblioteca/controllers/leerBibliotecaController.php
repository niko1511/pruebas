<?php 
include '../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();

$statusLibro = new Biblioteca();
$statusLibro -> statusLibro();

include_once '../views/headView.php';
include_once '../views/leerBibliotecaView.php';
include_once '../views/footerView.php';

?>