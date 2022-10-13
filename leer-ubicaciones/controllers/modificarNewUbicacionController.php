<?php
/*
modificar2UbicacionControlador.php
----------------------------------
- Creamos el objeto $listaUbicaciones a instancia de la clase ubicaciones
- Llamar a $listaUbicaciones->modificarUbicacion($_POST['nombreUbi'],$_POST['idUbi'])
- Llamar a $listaUbicaciones->leerUbicaciones();
- Llamar a la vista leerUbicacionVista.php

ubicacionesClass.php
--------------------*/
include_once '../models/ubicacionesModel.php';
$ubicaciones = new Ubicacion();
$ubicaciones -> leerUbicaciones();

//print_r($_POST);
$ubicaciones -> modificarUbicacion($_POST['nombreUbi'],$_POST['idUbi']);

include_once '../controllers/leerUbicacionesControllers.php';
?>

