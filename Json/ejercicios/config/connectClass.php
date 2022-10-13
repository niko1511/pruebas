<?php
class connect
{
	public function conexion()
	{
		$user = "root";
		$pass = "Nascor2022-2";
		$host = "localhost";
		$database = "ejercicio_plantas";
			
		$mysqli = new mysqli($host, $user, $pass, $database);
		
		//$cnx->set_charset("utf-8");
		$mysqli->set_charset("utf8mb4");

		return $mysqli;
		// Conectamos a BBDD
		//$mysqli = new mysqli('localhost', 'pimec12', 'Pimec2020!', 'pimec12_bbdd');
		/*
		$mysqli = new mysqli('localhost', 'root', 'Nascor2022-2', 'ejercicio_plantas');
		if ($mysqli->connect_errno) {
			echo "Lo sentimos, este sitio web está experimentando problemas.";
			echo "Error: Fallo al conectarse a MySQL debido a: \n";
			echo "Errno: " . $mysqli->connect_errno . "\n";
			echo "Error: " . $mysqli->connect_error . "\n";
			exit;
		}*/
	}
}
