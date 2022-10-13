<?php	
// Conectamos a BBDD
//$mysqli = new mysqli('localhost', 'pimec12', 'Pimec2020!', 'pimec12_bbdd');
$mysqli = new mysqli('localhost', 'nascor13', 'Nascor2022-2', 'nascor13_bbdd');
if ($mysqli->connect_errno) {
    	echo "Lo sentimos, este sitio web está experimentando problemas.";
   	 	echo "Error: Fallo al conectarse a MySQL debido a: \n";
    	echo "Errno: " . $mysqli->connect_errno . "\n";
    	echo "Error: " . $mysqli->connect_error . "\n";
    	exit;
}	
$mysqli->set_charset("utf8");
//Cosultar las plantas
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
		// Realizar una consulta SQL
		$sql = "SELECT Plantas_Plantas.id, Nombre_cientifico, Nombre_comun,Descripcion,  id_ubicacion,Plantas_Ubicacion.Ubicacion, stock FROM Plantas_Plantas,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id and Plantas_Plantas.id=".$_GET['id'];
		
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
    else {
		// Realizar una consulta SQL
		$sql = "SELECT Plantas_Plantas.id, Nombre_cientifico, Nombre_comun,Descripcion,  id_ubicacion,Plantas_Ubicacion.Ubicacion, stock FROM Plantas_Plantas,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id";
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
	echo '{"plantas":';
	$registro_json = []; //creamos un array
	while ($registro=$resultado->fetch_assoc()) {
		//echo json_encode($registro,JSON_UNESCAPED_UNICODE);
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
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = json_decode(file_get_contents('php://input'), true);
	//print_r($data);
	$nombre_comun=$data['nombre_comun'];
	$nombre_cientifico=$data['nombre_cientifico'];
	$descripcion=$data['descripcion'];
	$stock=$data['stock'];
	$ubicacion=$data['id_ubicacion'];
    $sql = "INSERT INTO Plantas_Plantas
          (Nombre_comun, Nombre_cientifico, Descripcion, Stock,id_ubicacion)
          VALUES
          ('".$nombre_comun."','".$nombre_cientifico."','".$descripcion."',".$stock.",".$ubicacion.")";
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


//Borrar una planta 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id=$_GET['id'];
    $sql = "DELETE from Plantas_Plantas Where Plantas_Plantas.id=".$id;
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

//Modificar una planta 
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
	$data = json_decode(file_get_contents('php://input'), true);
	//print_r($data);
	$id=$data['id'];
	$nombre_comun=$data['nombre_comun'];
	$nombre_cientifico=$data['nombre_cientifico'];
	$descripcion=$data['descripcion'];
	$stock=$data['stock'];
	$ubicacion=$data['id_ubicacion'];
	$sql="UPDATE `Plantas_Plantas` SET `Nombre_cientifico` = '$nombre_cientifico', `Nombre_comun` = '$nombre_comun', `Descripcion` = '$descripcion', `stock` = '$stock' WHERE `Plantas_Plantas`.`id` = $id";
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