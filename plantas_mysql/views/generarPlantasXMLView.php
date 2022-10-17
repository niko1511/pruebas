<?php

//[id] => 3
//[Nombre_cientifico] => Allamanda modi
//[Nombre_comun] => Trompeta
//[Descripcion] => Planta  trepadora  o  enredadera  con  bonitas flores rosas a rojas en forma de trompeta y hojas perennes.
//[id_ubicacion] => 2
//[stock] => 0
//[Ubicacion] => Exterior modificado

header("Content-Type: application/xml; charset=utf-8");
 $file = fopen("../xml/plantas.xml", "w");
$txt = '<?xml version="1.0" encoding="utf-8"?>';
$txt .= '<plantas>';
foreach ($listaPlantas->plantas as $planta) {
	$txt .= '<planta>';
	$txt .= '<id><![CDATA['.$planta['id'].']]></id>';	
	$txt .= '<Nombre_cientifico><![CDATA['.$planta['Nombre_cientifico'].']]></Nombre_cientifico>';		
	$txt .= '<Nombre_comun><![CDATA['.$planta['Nombre_comun'].']]></Nombre_comun>';		
    $txt .= '<Descripcion><![CDATA['.$planta['Descripcion'].']]></Descripcion>';		
    $txt .= '<id_ubicacion><![CDATA['.$planta['id_ubicacion'].']]></id_ubicacion>';		
    $txt .= '<stock><![CDATA['.$planta['stock'].']]></stock>';		
    $txt .= '<Ubicacion><![CDATA['.$planta['Ubicacion'].']]></Ubicacion>';		
	$txt .= '</planta>';
}
$txt .= '</plantas>';
echo $txt;
fwrite($file, $txt . PHP_EOL);
fclose($file);

