<?php
class connect {
	public function conexion() {
		$user = "root";
		$pass = "Nascor2022-2";
		$host = "localhost";
		$database = "nascor01_db";
			
		$cnx = new mysqli($host, $user, $pass, $database);
		
		//$cnx->set_charset("utf-8");
		$cnx->set_charset("utf8mb4");

		return $cnx;
	}
}
