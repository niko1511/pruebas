<?php
include_once '../config/connectClass.php';
class marcas extends connect
{
	private $db;
	public $marcas;
	
	public function __construct()
	{
		$this->db = connect::conexion();
	}
	public function leerMarcas()
	{
		$sql = "SELECT * FROM `Plantas_Marcas`";
		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->marcas[] = $fila;
		}
	}

    public function insertMarcas($nombre)
	{
		$sql = "INSERT INTO `Plantas_Marcas` (`id`, `Nombre`) VALUES (NULL, '$nombre')";
		$query = $this->db->query($sql);
		
	}
    public function deleteMarcas($id)
	{
		$sql = "DELETE FROM `Plantas_Dosis_abono` WHERE `id_marca` = $id";
		$this->db->query($sql);

		$sql = "DELETE FROM Plantas_Marcas WHERE `Plantas_Marcas`.`id` = $id";
		$this->db->query($sql);
		
	}

    public function modificarMarcas($id,$nombre)
	{
		$sql = "UPDATE `Plantas_Marcas` SET `Nombre` = '$nombre' WHERE `Plantas_Marcas`.`id` = $id";
		$query = $this->db->query($sql);
		
	}
	
	
}
