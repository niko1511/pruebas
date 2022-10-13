<?php
include_once 'connectClass.php';
class Ubicacion extends connect
{
    private $db;
    public $ubicaciones;

    public function __construct()
    {
        $this->db = connect::conexion();
    }
    public function leerUbicaciones()
    {

        $sql = "SELECT * FROM `Plantas_Ubicacion` WHERE 1";
        $query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->ubicaciones[] = $fila;
		}
        
    }


    public function modficarUbicacion($nombreUbi,$idUbi){
        $sql = "UPDATE `Plantas_Ubicacion` SET `Ubicacion` = '$nombreUbi' WHERE `Plantas_Ubicacion`.`id` = $idUbi;";
        $query = $this->db->query($sql);
    }
}
