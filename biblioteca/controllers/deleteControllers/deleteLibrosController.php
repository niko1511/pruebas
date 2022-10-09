<?php 

include_once '../models/bibliotecaModel.php';

$deleteLibro = new Biblioteca();
$deleteLibro -> deleteLibros();

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();


include_once '../controllers/leerBibliotecaController.php';