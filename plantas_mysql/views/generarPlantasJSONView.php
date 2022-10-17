<?php
echo $json = json_encode($listaPlantas);
echo "  BYTES ".$bytes = file_put_contents("../json/myfile.json", $json); 
?>