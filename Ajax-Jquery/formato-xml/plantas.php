<?php

	$mysqli = new mysqli('localhost', 'root', 'Nascor2022-2', 'ejercicio_plantas');
	if ($mysqli->connect_errno) {
    	echo "Lo sentimos, este sitio web está experimentando problemas.";
   	 	echo "Error: Fallo al conectarse a MySQL debido a: \n";
    	echo "Errno: " . $mysqli->connect_errno . "\n";
    	echo "Error: " . $mysqli->connect_error . "\n";
    	exit;
	}	
	// Realizar una consulta SQL
	$sql = "SELECT plantas_plantas.id, Nombre_cientifico, Nombre_comun, Descripcion, id_ubicacion,plantas_ubicacion.ubicacion, stock FROM plantas_plantas,plantas_ubicacion WHERE plantas_plantas.id_ubicacion=plantas_ubicacion.id ";
	if (!$resultado = $mysqli->query($sql)) {
    	// ¡Oh, no! La consulta falló. 
    	echo "Lo sentimos, este sitio web está experimentando problemas.";
    	echo "Error: La ejecución de la consulta falló debido a: \n";
    	echo "Query: " . $sql . "\n";
    	echo "Errno: " . $mysqli->errno . "\n";
    	echo "Error: " . $mysqli->error . "\n";
    	exit;
	}	
$file = fopen("plantas.xml", "w");
$txt = utf8_encode('<?xml version="1.0" encoding="utf-8"?>');
$txt .= utf8_encode('<plantas>');
fwrite($file, $txt . PHP_EOL);
while ($registro=$resultado->fetch_assoc()) {
	$txt = utf8_encode('<planta>');
	$txt .= utf8_encode("<id><![CDATA[".$registro['id']."]]></id>");
	$txt .= utf8_encode("<nombre_cientifico><![CDATA[".$registro['Nombre_cientifico']."]]></nombre_cientifico>");
	$txt .= utf8_encode("<nombre_comun><![CDATA[".$registro['Nombre_comun']."]]></nombre_comun>");
	$txt .= utf8_encode("<descripcion><![CDATA[".$registro['Descripcion']."]]></descripcion>");
	$txt .= utf8_encode("<ubicacion><![CDATA[".$registro['ubicacion']."]]></ubicacion>");
	$txt .= utf8_encode("<stock><![CDATA[".$registro['stock']."]]></stock>");	
	$txt .= utf8_encode('</planta>');
	fwrite($file, $txt . PHP_EOL);
}
$txt = utf8_encode('</plantas>');
fwrite($file, $txt . PHP_EOL);
fclose($file);




// El script automáticamente cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$mysqli->close();
?>
		
