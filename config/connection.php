<?php
$user = "root";
$pass = "12345";
$host = "localhost";

$conn = mysqli_connect($host, $user, $pass);

if(!$conn) 
        {
            echo"No se ha podido conectar con el servidor";
          
        }
  else
        {
            echo"Hemos conectado al servidor <br>" ;
          
        }


        $datab = "test";
        $db = mysqli_select_db($conn,$datab);

        if (!$db){
            echo"No se ha podido encontrar la Tabla";
        }    else
        {
        echo "Tabla seleccionada" ;
        }    

?>