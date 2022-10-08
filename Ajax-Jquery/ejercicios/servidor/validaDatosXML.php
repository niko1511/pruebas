<?php
header('Content-Type: text/xml');
$xml = file_get_contents("php://input");
$parametros = new SimpleXMLElement($xml);



echo "
<respuesta>
  <mensaje>La respuesta XML es: </mensaje>
  <parametros>
    <telefono>".$parametros->telefono."</telefono>
    <codigo_postal>".$parametros->codigo_postal."</codigo_postal>
    <fecha_nacimiento>".$parametros->fecha_nacimiento."</fecha_nacimiento>
  </parametros>
</respuesta>
";






?>