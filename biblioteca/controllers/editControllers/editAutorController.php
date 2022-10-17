<?php 

include_once '../../models/bibliotecaModel.php';

$autor = new Biblioteca();


$datoAutor =$autor -> leerAutor($_GET['id_libro']);

include_once '../../views/headView.php';
include_once '../../views/editAutorView.php';
include_once '../../views/footerView.php';
?>