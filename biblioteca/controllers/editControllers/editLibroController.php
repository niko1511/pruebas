<?php 
include_once '../../models/bibliotecaModel.php';

$id =$_POST['ubicacion'];
$modificarLibro = new Biblioteca();
$modificarLibro -> modificarLibro($_POST['id'],$_POST['titulo'], $_POST['autor'] ,$_POST['ubicacion']);

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();
$statusLibro = $biblioteca-> statusLibro();


include_once '../../views/headView.php';
include_once '../../views/leerBibliotecaView.php';
include_once '../../views/footerView.php';
?>
