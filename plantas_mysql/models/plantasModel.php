<?php

/*
-->leerPlantas()
    "SELECT Plantas_Plantas.*,Plantas_Ubicacion.Ubicacion FROM `Plantas_Plantas`,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id"
-->leerPlanta($idPlanta)
"SELECT Plantas_Plantas.*,Plantas_Ubicacion.Ubicacion FROM `Plantas_Plantas`,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id
and Plantas_Plantas.id=$idPlanta"
/*
-->modificarPlanta($idPlanta,$nombre_cientifico,$nombre_comun,$descripcion,$stock,$idUbi)
-->insertarPlanta($nombre_cientifico,$nombre_comun,$descripcion,$stock,$idUbi)
-->borrarPlanta($idPlanta)
*/

include_once '../config/connectClass.php';
class Plantas extends connect
{
    private $db;
    public $plantas;
   
   

    public function __construct()
    {
        $this->db = connect::conexion();
    }
    public function leerPlantas()
    {

        $sql = "SELECT Plantas_Plantas.*,Plantas_Ubicacion.Ubicacion FROM `Plantas_Plantas`,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id";
        $query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->plantas[] = $fila;
		}
        
    }

    public function leerPlanta($idPlanta)
    {

        $sql = "SELECT Plantas_Plantas.*,Plantas_Ubicacion.Ubicacion FROM `Plantas_Plantas`,Plantas_Ubicacion WHERE Plantas_Plantas.id_ubicacion=Plantas_Ubicacion.id and plantas_plantas.id = $idPlanta ";
		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
        
    }

    public function  modificarPlanta($idPlanta,$nombre_cientifico,$nombre_comun,$descripcion,$stock){
        $sql = "UPDATE `plantas_plantas` SET `Nombre_cientifico` = '$nombre_cientifico', `Nombre_comun` = '$nombre_comun', `Descripcion` = '$descripcion', `stock` = '$stock' WHERE `plantas_plantas`.`id` = $idPlanta";
        $query = $this->db->query($sql);
    }

    
    public function  insertarPlanta($nombre_cientifico,$nombre_comun,$descripcion,$stock,$idUbi){
        $sql = "INSERT INTO `plantas_plantas` (`id`, `Nombre_cientifico`, `Nombre_comun`, `Descripcion`, `id_ubicacion`, `stock`) VALUES (NULL, '$nombre_cientifico', '$nombre_comun', '$descripcion', '$idUbi', '$stock');";
        $query = $this->db->query($sql);
    }
    public function  borrarPlanta($idPlanta){

        $sql = "DELETE FROM plantas_plantas WHERE `plantas_plantas`.`id` = $idPlanta";
       
      
       $query = $this->db->query($sql);
        if($query = $this->db->query($sql)>0){
            echo 'la planta fue borra';
        }else{
            echo 'error al querer borrar la planta ';
        }

        
    }
   
}


?>
