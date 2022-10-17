<?php
include_once '../../models/bibliotecaModel.php';
$biblioteca = new Biblioteca();
$usuarios = $biblioteca->leerUsuarios();
$locations = $biblioteca->leerUbicacion($_GET['id_libro']);
$datoLibro = $biblioteca->leerLibro($_GET['id_libro']);


include_once '../../views/headView.php';
include_once '../../views/asignarView.php';
include_once '../../views/footerView.php';



