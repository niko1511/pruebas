<?php
/*
insertar1PlantaControlador.php
-----------------------------
crear el objeto $listaUbicaciones que es una instancia de la clase ubicaciones
Llamar al método $listaUbicaciones->leerUbicaciones()
---> $listaUbicaciones->ubicaciones tendremos todo el listado de ubicaciones.
llamar a la vista insertarPlantaVista.php
*/

include_once '../models/ubicacionesModel.php';
$ubicaciones = new Ubicacion();
$ubicaciones -> leerUbicaciones();

include_once '../views/insertarPlantaView.php';