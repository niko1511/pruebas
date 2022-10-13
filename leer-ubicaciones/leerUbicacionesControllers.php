<?php 
include_once 'ubicacionesModel.php';
$ubicaciones = new Ubicacion();
$ubicaciones -> leerUbicaciones();

include_once 'ubicacionView.php';

?>