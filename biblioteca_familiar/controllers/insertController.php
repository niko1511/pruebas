<?php 
include '../models/bibliotecaModel.php';
$autores = new Biblioteca();
$ubicaciones = new Biblioteca();
$autores -> leerAutors();
$ubicaciones -> leerUbicaciones();

include '../views/insertLibroView.php'


?>
