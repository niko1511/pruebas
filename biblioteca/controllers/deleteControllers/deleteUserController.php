<?php 

include_once '../../models/bibliotecaModel.php';

$deleteUser = new Biblioteca();
$deleteUser -> deleteUser($_GET['id_libro']);


include_once '../../views/headView.php';
include_once '../../controllers/insertControllers/insertUserController.php';
include_once '../../views/footerView.php';
