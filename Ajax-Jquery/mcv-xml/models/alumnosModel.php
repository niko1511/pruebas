<?php
include_once '../config/connectClass.php';
class Alumnos extends connect
{
    private $db;
    public $array_alumnos;

    public function __construct()
    {
        $this->db = connect::conexion();
    }
    public function leerAlumnos()
    {

        $sql = "SELECT * FROM `ga_alumnos` WHERE 1";
        $query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->array_alumnos[] = $fila;
		}
        
    }
}
