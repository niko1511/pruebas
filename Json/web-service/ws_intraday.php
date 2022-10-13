<?php

// Conectamos a BBDD
//$mysqli = new mysqli('localhost', 'pimec12', 'Pimec2020!', 'pimec12_bbdd');
$mysqli = new mysqli('localhost', 'root', 'Nascor2022-2', 'ejercicio_plantas');
if ($mysqli->connect_errno) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
$mysqli->set_charset("utf8");
//Cosultar las plantas
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        // Realizar una consulta SQL
        $sql = "SELECT * FROM `meta_data` WHERE id=" . $_GET['id'];

        if (!$resultado = $mysqli->query($sql)) {
            // ¡Oh, no! La consulta falló. 
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
    } else {
        // Realizar una consulta SQL
        $sql = "SELECT * FROM `meta_data` WHERE 1";
        if (!$resultado = $mysqli->query($sql)) {
            // ¡Oh, no! La consulta falló. 
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
    }
    header('Content-Type: application/json');
    echo '{"meta_data":';
    $registro_json = []; //creamos un array
    while ($registro = $resultado->fetch_assoc()) {
        $registro_json[] = $registro;
    }

    echo json_encode($registro_json);

    echo '}';


    // El script automáticamente cerrará la conexión
    // a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
    $mysqli->close();
    exit();
}
//Insertar una planta 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    //print_r($data);
    $information = $data['information'];
    $symbol = $data['symbol'];
    $last_refreshed = $data['last_refreshed'];
    $out_size = $data['out_size'];
   // $time_zone = $data['time_zone'];
    $sql = "INSERT INTO `meta_data` (`id`, `information`, `symbol`, `last_refreshed`, `out_size`) VALUES (NULL, '$information', '$symbol', '$last_refreshed', '$out_size')";
    if (!$resultado = $mysqli->query($sql)) {
        // ¡Oh, no! La consulta falló. 
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    } else {
        header("HTTP/1.1 200 OK");
        exit();
    }
}


//Borrar una planta 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = $_GET['id'];
    $sql = "DELETE from meta_data Where meta_data.id=".$id;
    if (!$resultado = $mysqli->query($sql)) {
        // ¡Oh, no! La consulta falló. 
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    } else {
        header("HTTP/1.1 200 OK");
        exit();
    }
}


//Modificar una planta 
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
	$data = json_decode(file_get_contents('php://input'), true);
	print_r($data);
	$id=$data['id'];
	$information=$data['information'];
	$symbol=$data['symbol'];
	$last_refreshed=$data['last_refreshed'];
	$out_size=$data['out_size'];
	$sql="UPDATE `meta_data` SET `information` = '$information', `symbol` = '$symbol', `last_refreshed` = '$last_refreshed', `out_size` = '$out_size' WHERE `meta_data`.`id` = $id";
		if (!$resultado = $mysqli->query($sql)) {
    		// ¡Oh, no! La consulta falló. 
    		echo "Lo sentimos, este sitio web está experimentando problemas.";
    		echo "Error: La ejecución de la consulta falló debido a: \n";
    		echo "Query: " . $sql . "\n";
    		echo "Errno: " . $mysqli->errno . "\n";
    		echo "Error: " . $mysqli->error . "\n";
    		exit;
			}
	    else
		    {
		      header("HTTP/1.1 200 OK");
		      exit();
			 }
}

?>

