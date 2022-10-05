<?php 
if(!empty($_POST['title'])){
session_start();
if(isset($_SESSION['verifica'])){
$verifica = $_SESSION['verifica'];

if($verifica ==1){

    unset($_SESSION['verifica']);
include_once '../models/bibliotecaModel.php';

$InsertNewLibro = new Biblioteca();
$InsertNewLibro -> InsertLibroBiblioteca($_POST['title'],$_POST['autor'],$_POST['location']);

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();

}
}
}
include_once '../controllers/leerBibliotecaController.php';

