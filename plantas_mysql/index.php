<?php
/*
Plantas_Ubicación
=================

modelos/ubicacionClass.php 
--------------------------
-> hereda de connectClass.php
->leerUbicaciones()
	- Acceder a todos los datos de ubicaciones
-> modficarUbicacion($nombreUbi,$idUbi)
	- UPDATE `Plantas_Ubicacion` SET `Ubicacion` = '$nombreUbi' WHERE `Plantas_Ubicacion`.`id` = $idUbi; 
	- Delvolver un ok
-> insertarUbicacion($nombreUbi)
	- INSERT INTO `Plantas_Ubicacion` (`id`, `Ubicacion`) VALUES (NULL, '$nombreUbi');
	- Devolver un ok 

modelos/connectClass.php
	- conectarse con la BBDD

Listado de las ubicaciones
==========================
controladores/leerUbicacionesControlador.php
---------------------------------
- crear el objecto $Ubicaciones que es una instancia de la clase ubicacion:
$ubicaciones = new ubicacion();
- Ejecutar el método leerUbicaciones:
$ubicaciones->leerUbicaciones();
-----> $ubicaciones->ubicaciones (es un array que contiene todas las ubicaciones)
- Llamaremos a la vista leerUbicacionVista.php

vistas/leerUbicacionVista.php
-----------------------------
- Recorrerá $ubicaciones->ubicaciones con un foreach:

foreach ($ubicaciones->ubicaciones as $ubi) {
	echo $ubi['id'];
	echo $ubi['Ubicacion'];
}

*/
header('Location: ../plantas_mysql/controllers/leerUbicacionesControllers.php');
