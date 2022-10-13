<?php 
include_once '../models/ubicacionesModel.php';
$ubicaciones = new Ubicacion();
$ubicaciones -> leerUbicaciones();

include_once '../views/ubicacionView.php';

include_once '../controllers/insertarUbicacionController.php';

?>