<?php 

include_once '../models/bibliotecaModel.php';

$deleteUser = new Biblioteca();
$deleteUser -> deleteUser($_GET['id_libro']);




include_once '../controllers/insertUserController.php';