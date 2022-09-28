<?php 
include '../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();
$biblioteca -> statusLibro();

include_once '../views/headView.php';
include_once '../views/leerBibliotecaView.php';
include_once '../views/footerView.php';

?>