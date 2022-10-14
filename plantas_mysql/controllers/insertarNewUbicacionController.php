<?php
/*
insertar2UbicacionControlador.php
---------------------------------
- Creamos el objeto $listaUbicaciones a instancias de la clase ubicaciones
- Llamar a $listaUbicaciones->insertarUbicacion($_POST[nombreUbi])
- Llamar a $listaUbicaciones->leerUbicaciones();
- Llamar a la vista leerUbicacionVista.php
*/

include_once '../models/ubicacionesModel.php';
$ubicaciones = new Ubicacion();
$ubicaciones -> insertUbicacion($_POST['nombreUbi']);
$ubicaciones -> leerUbicaciones();

include_once '../views/ubicacionView.php';
include_once '../controllers/insertarUbicacionController.php';



?>