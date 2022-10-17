<?php 

include_once '../../models/bibliotecaModel.php';

$user = new Biblioteca();


$datoUser =$user -> leerUsuario($_GET['id_libro']);

include_once '../../views/headView.php';
include_once '../../views/editUserView.php';
include_once '../../views/footerView.php';
?>