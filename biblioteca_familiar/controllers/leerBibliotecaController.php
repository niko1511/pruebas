<?php 
include '../models/bibliotecaModel.php';
$bibliteca = new Biblioteca();
$bibliteca -> leerLibros();

$statusLibro = new Biblioteca();
$statusLibro -> statusLibro();

include_once '../views/headView.php';
include '../views/leerBibliotecaView.php';
include_once '../views/footerView.php';

?>