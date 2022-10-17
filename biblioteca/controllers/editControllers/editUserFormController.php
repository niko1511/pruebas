<?php 
include_once '../../models/bibliotecaModel.php';

$user = new Biblioteca();
$user -> modificarUser($_POST['id'],$_POST['nombre']);


$leerUsuarios = new Biblioteca();
$leerUsuarios->leerUsuarios();

include_once '../../views/headView.php';
include_once '../../views/insertUserView.php';
include_once '../../views/footerView.php';

?>