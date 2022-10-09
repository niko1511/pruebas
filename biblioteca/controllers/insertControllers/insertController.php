<?php 
session_start();
$verifica =1;
$_SESSION['verifica'] = $verifica;
include_once '../../models/bibliotecaModel.php';
$autores = new Biblioteca();
$ubicaciones = new Biblioteca();
$autores -> leerAutors();
$ubicaciones -> leerUbicaciones();

include_once '../../views/headView.php';
include_once '../../views/insertLibroView.php';
include_once '../../views/footerView.php';


?>
