<?php

header("Content-Type: application/xml; charset=utf-8");
//echo $file = fopen("../views/plantas.xml", "w");
$txt = '<?xml version="1.0" encoding="utf-8"?>';
$txt .= '<ga_alumnos>';
foreach ($alumnos->array_alumnos as $fila) {
	$txt .= '<alumnos>';
	$txt .= '<id_alumno><![CDATA['.$fila['id_alumno'].']]></id_alumno>';	
	$txt .= '<nombre><![CDATA['.$fila['nombre'].']]></nombre>';		
	$txt .= '<apellido1><![CDATA['.$fila['apellido1'].']]></apellido1>';	
	$txt .= '<dni><![CDATA['.$fila['dni'].']]></dni>';	
	$txt .= '</alumnos>';
}
$txt .= '</ga_alumnos>';
echo $txt;
//fwrite($file, $txt . PHP_EOL);
//fclose($file);

