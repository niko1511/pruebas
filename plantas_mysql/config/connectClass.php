<?php
class connect {
	public function conexion() {
		$user = "nascor01";
		$pass = "Nascor2022-2";
		$host = "nascor01.md360.es";
		$database = "nascor01_DB";
			
		$cnx = new mysqli($host, $user, $pass, $database);
		
		//$cnx->set_charset("utf-8");
		$cnx->set_charset("utf8mb4");

		return $cnx;
	}
}

