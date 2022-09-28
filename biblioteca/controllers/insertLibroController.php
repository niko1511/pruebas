<?php 
include '../models/bibliotecaModel.php';

$InsertNewLibro = new Biblioteca();
$InsertNewLibro -> InsertLibroBiblioteca($_POST['title'],$_POST['autor'],$_POST['location']);

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();

include_once '../views/headView.php';
include_once '../views/leerBibliotecaView.php';
include_once '../views/footerView.php';
?>
