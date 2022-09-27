<?php 
include '../models/bibliotecaModel.php';

$deleteLibro = new Biblioteca();
$deleteLibro -> deleteLibro($_GET['id_libro']);

$bibliteca = new Biblioteca();
$bibliteca -> leerLibros();

include '../views/leerBibliotecaView.php';

?>
