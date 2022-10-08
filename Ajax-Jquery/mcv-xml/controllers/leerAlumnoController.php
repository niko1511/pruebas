<?php 
include_once '../models/alumnosModel.php';
$alumnos = new Alumnos();
$alumnos -> leerAlumnos();

include_once '../views/alumnosView.php';

?>