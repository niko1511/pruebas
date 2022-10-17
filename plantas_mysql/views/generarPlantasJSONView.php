<?php
header("Content-Type: application/json; charset=utf-8");
 echo $json = json_encode($listaPlantas->plantas);
$bytes = file_put_contents("../json/myfile.json", $json); 
?>