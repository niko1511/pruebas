<?php 

//print_r($_POST);
//Array ( [title] => Curso de desarrollo web [autor] => 2 [location] => 7 [insertar] => Agregar ) 
if(!empty($_POST['title'])){
session_start();
if(isset($_SESSION['verifica'])){
$verifica = $_SESSION['verifica'];

if($verifica ==1){

    unset($_SESSION['verifica']);
include_once '../../models/bibliotecaModel.php';
$ubiName = new Biblioteca();
$ubicacion_nombre = $ubiName->leerUbicacion1($_POST['location']);

$InsertNewLibro = new Biblioteca();
$InsertNewLibro -> InsertLibroBiblioteca($_POST['title'],$_POST['autor'],$ubicacion_nombre['cordenadas']);

$biblioteca = new Biblioteca();
$biblioteca -> leerLibros();

}
}
}
include_once '../../controllers/leerControllers/leerBibliotecaController.php';

