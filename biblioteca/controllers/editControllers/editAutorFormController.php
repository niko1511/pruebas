<?php 
//Array ( [cordenadas] => arribaaa [id] => 7 [id_cordenadas] => 0 [agregar] => Agregar ) 
include_once '../../models/bibliotecaModel.php';

$autor = new Biblioteca();
$autor -> modificarAutor($_POST['id'],$_POST['nombre']);

$leerAutors = new Biblioteca();
$leerAutors->leerAutors();

include_once '../../views/headView.php';
include_once '../../views/insertAutorView.php';
include_once '../../views/footerView.php';

?>