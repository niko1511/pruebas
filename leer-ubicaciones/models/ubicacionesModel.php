<?php
include_once '../config/connectClass.php';
class Ubicacion extends connect
{
    private $db;
    public $ubicaciones;
    public $listaUbicaciones;

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

    public function leerUbicacion($id)
    {

        $sql = "SELECT * FROM `Plantas_Ubicacion` WHERE id=$id";
        $query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->listaUbicaciones[] = $fila;
		}
        
    }


    public function insertUbicacion($nombreUbi){
        $sql = "INSERT `Plantas_Ubicacion` SET `Ubicacion` = '$nombreUbi'";
        $query = $this->db->query($sql);
    }


    public function modificarUbicacion($nombreUbi,$idUbi){
        $sql = "UPDATE `Plantas_Ubicacion` SET `Ubicacion` = '$nombreUbi' WHERE `Plantas_Ubicacion`.`id` = $idUbi;";
        $query = $this->db->query($sql);
    }
}


?>
