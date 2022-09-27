<?php 
include '../models/bibliotecaModel.php';

$InsertNewLibro = new Biblioteca();
$InsertNewLibro -> InsertLibroBiblioteca($_POST['title'],$_POST['autor'],$_POST['location']);

$bibliteca = new Biblioteca();
$bibliteca -> leerLibros();

include '../views/leerBibliotecaView.php'
?>
