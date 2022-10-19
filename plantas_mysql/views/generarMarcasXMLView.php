<?php

header("Content-Type: application/xml; charset=utf-8");
 //$file = fopen("../xml/plantas.xml", "w");
$txt = '<?xml version="1.0" encoding="utf-8"?>';
$txt .= '<marcas>';
foreach ($listaMarcas->marcas as $marca) {
	$txt .= '<marca>';
	$txt .= '<id><![CDATA['.$marca['id'].']]></id>';	
	$txt .= '<Nombre><![CDATA['.$marca['Nombre'].']]></Nombre>';		
	$txt .= '</marca>';
}
$txt .= '</marcas>';
echo $txt;
//fwrite($file, $txt . PHP_EOL);
//fclose($file);

