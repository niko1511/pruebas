<?php
/*

INSERTA UBICACION
=================
insertar1UbicacionControlador.php
---------------------------------
llamar a la vista insertarUbicacionVista.php

insertarUbicacionVista.php
--------------------------
Crear un formulario con el campo de texto nombreUbi:
<form action="../controladores/insertar2UbicacionControlador.php" method="POST">
    <input type="text" name="nombreUbi">
    <input type="submit" avlue="Añadir ubicación">
</form>

insertar2UbicacionControlador.php
---------------------------------
- Creamos el objeto $listaUbicaciones a instancias de la clase ubicaciones
- Llamar a $listaUbicaciones->insertarUbicacion($_POST[nombreUbi])
- Llamar a $listaUbicaciones->leerUbicaciones();
- Llamar a la vista leerUbicacionVista.php
*/
include_once '../views/insertarUbicacionView.php';