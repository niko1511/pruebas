<?php
/*MODIFCAR UBICACION
==================
modificar1UbicacionControlador.php
----------------------------------
- Creamos el objeto $listaUbicaciones que es una instancia de ubicaciones
- llamaremos al método $listaUbicaciones->leerUbicacion($_GET['idUbi']) que devuelve un array en $datosUbi.
- llamaremos a modificarUbicacionVista.php
*/

include_once '../models/ubicacionesModel.php';
$listaUbicaciones = new Ubicacion();
$listaUbicaciones -> leerUbicaciones();
include_once '../views/modificarUbicacionView.php';
?>



