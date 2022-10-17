<?php
include_once '../../config/connectClass.php';
class Biblioteca extends connect
{
	private $db;
	public $biblioteca;
	public $autores;
	public $usuarios;
	public $locations;
	public $datoLibro;
	public $datoAutor;
	public $deleteLibro;
	public $statusLibro;
	public $datoUsuario;
	public $modificarLibro;
	public function __construct()
	{
		$this->db = connect::conexion();
	}
	public function leerBiblioteca()
	{
		$sql = "SELECT bf_personas.nombre AS persona_nombre, bf_libros.nombre AS persona_libro, bf_libros.id AS id_libro, bf_autor.nombre, `fecha_inicio`, `fecha_fin`, bf_estante.cordenadas FROM bf_personas, bf_libros, bf_libro_persona, bf_autor, bf_estante WHERE bf_libro_persona.id_persona = bf_personas.id AND bf_libro_persona.id_libro = bf_libros.id AND bf_libro_persona.autor = bf_autor.id AND bf_libro_persona.id_estante = bf_estante.id";
		//$sql = "SELECT * FROM `bf_libros` WHERE 1";
		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->biblioteca[] = $fila;
		}
	}
	public function leerEstadoLibro($idLibro)
	{
		$sql = "SELECT bf_personas.nombre AS persona_nombre, bf_libros.nombre AS persona_libro, bf_libros.id AS id_libro, bf_autor.nombre, `fecha_inicio`, `fecha_fin`, bf_estante.cordenadas FROM bf_personas, bf_libros, bf_libro_persona, bf_autor, bf_estante WHERE bf_libro_persona.id_persona = bf_personas.id AND bf_libro_persona.id_libro = bf_libros.id AND bf_libro_persona.autor = bf_autor.id AND bf_libro_persona.id_estante = bf_estante.id AND `bf_libro_persona`.`id` = $idLibro;";
		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
	}

	public function leerLibro($idLibro)
	{
		$sql = "SELECT * FROM `bf_libros` WHERE `id` =$idLibro";

		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
	}

	public function deleteLibro($idLibro)
	{
		$sql = "DELETE FROM bf_libro_persona WHERE `bf_libro_persona`.`id` = $idLibro";
		$this->db->query($sql);

		$sql = "DELETE FROM `bf_libros` WHERE `bf_libros`.`id` = $idLibro";
		$this->db->query($sql);
	}

	public function InsertLibroBiblioteca($titulo, $autor, $ubicacion)
	{
		$sql = "INSERT INTO `bf_libros` (`id`, `nombre`, `id_autor`, `id_estante`, `status`) VALUES (NULL, '$titulo', '$autor', '$ubicacion', '0');";
		$this->db->query($sql);

		//obtengo el ultimo id ingresado 
		$last_id = $this->db->insert_id;

		$sql = "INSERT INTO `bf_estante` (`id`, `cordenadas`) VALUES ('$last_id', '$ubicacion');";
		$this->db->query($sql);
	}


	public function InsertNewLocation($ubicacion)
	{
		$sql = "INSERT INTO `bf_estante` ( `cordenadas`) VALUES ( '$ubicacion')";
		$this->db->query($sql);
	}

	public function InsertNewAutor($ubicacion)
	{
		$sql = "INSERT INTO `bf_autor` (`id`, `nombre`) VALUES (NULL, '$ubicacion'); ";
		$this->db->query($sql);
	}

	public function InsertNewUser($user)
	{
		$sql = "INSERT INTO `bf_personas` (`id`, `nombre`, `id_libro`) VALUES (NULL, '$user', '0'); ";
		$this->db->query($sql);
	}


	public function modificarLibro($id, $titulo, $autor, $ubicacion)
	{
		$sql = "UPDATE `bf_libros` SET `nombre` = '$titulo', `id_autor` = '$autor', `id_estante` = '$ubicacion' WHERE `bf_libros`.`id` = $id; ";
		$this->db->query($sql);
	}

	public function actualizarStatusLibro($id, $status)
	{
		$sql = "UPDATE `bf_libros` SET `status` = '$status' WHERE `bf_libros`.`id` = $id";
		$this->db->query($sql);
	}


	public function leerAutors()
	{
		$sql = "SELECT * FROM `bf_autor` WHERE 1";

		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->autores[] = $fila;
		}
	}

	public function leerAutor($idLibro)
	{
		$sql = "SELECT * FROM `bf_autor` WHERE `id` =$idLibro";

		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
	}

	public function leerLibros()
	{   //$sql = "`bf_libro_persona`.`id`, bf_autor.nombre AS autor, bf_personas.nombre, `fecha_inicio`, `fecha_fin`, bf_libros.nombre, bf_estante.cordenadas, bf_prestamos_persona.status FROM `bf_libro_persona`, `bf_autor`, `bf_personas`, `bf_libros`, `bf_estante`, `bf_prestamos_persona` WHERE bf_libro_persona.id_persona = bf_personas.id AND bf_libro_persona.id_libro = bf_libros.id AND bf_libro_persona.autor = bf_autor.id AND bf_libro_persona.id_estante = bf_estante.id AND bf_prestamos_persona.id = bf_libro_persona.id";
		$sql = "SELECT * FROM `bf_libros` ";

		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->autores[] = $fila;
		}
	}

	public function leerUbicaciones()
	{
		$sql = "SELECT * FROM `bf_estante` WHERE 1";

		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->locations[] = $fila;
		}
	}
	public function leerUbicacion($idLibro)
	{
		$sql = "SELECT * FROM `bf_estante` WHERE `id` =$idLibro";

		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
	}


	public function statusLibro()
	{
		$sql = "SELECT * FROM `bf_libros` ";
		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->statusLibro[] = $fila;
		}
	}

	public function actualizarEstado($idLibro, $status)
	{
		$sql = "UPDATE `bf_libros` SET `status` = $status WHERE bf_libros.id = $idLibro; ";
		$this->db->query($sql);
	}


	public function leerUsuario($idLibro)
	{
		$sql = "SELECT `bf_libro_persona`.`id`, bf_autor.nombre AS autor, bf_personas.nombre, `fecha_inicio`, `fecha_fin`, bf_libros.nombre, bf_estante.cordenadas, bf_libro_persona.status FROM `bf_libro_persona`, `bf_autor`, `bf_personas`, `bf_libros`, `bf_estante` WHERE bf_libro_persona.id_persona = bf_personas.id AND bf_libro_persona.id_libro = bf_libros.id AND bf_libro_persona.autor = bf_autor.id AND bf_libro_persona.id_estante = bf_estante.id AND `bf_libro_persona`.`id` = $idLibro;";

		$query = $this->db->query($sql);
		$fila = $query->fetch_assoc();
		return $fila;
	}

	public function leerUsuarios()
	{
		$sql = "SELECT * FROM `bf_personas` ";

		$query = $this->db->query($sql);
		while ($fila = $query->fetch_assoc()) {
			$this->usuarios[] = $fila;
		}
	}

	public function deleteLibros()
	{
		$sql = "DELETE FROM `bf_libros` WHERE 0";
		$query = $this->db->query($sql);
		//$fila = $query->fetch_assoc();

	}

	public function deleteUser($id)
	{
		$sql = "DELETE FROM bf_prestamos_persona WHERE `bf_prestamos_persona`.`id` = $id";
		$query = $this->db->query($sql);
		

		$sql = "DELETE FROM bf_personas WHERE `bf_personas`.`id` = $id";
		$query = $this->db->query($sql);
		

	}

	public function deleteLocation($id)
	{
		$sql = "DELETE FROM `bf_libros` WHERE `id_estante` = $id";
		$query = $this->db->query($sql);

		$sql = "DELETE FROM bf_estante WHERE `bf_estante`.`id` = $id";
		$query = $this->db->query($sql);
		

	}

	public function editLocation($id)
	{
		$sql = "DELETE FROM bf_estante WHERE `bf_estante`.`id` = $id";
		$query = $this->db->query($sql);
		//$fila = $query->fetch_assoc();

	}

	public function deleteAutor($id)
	{
		$sql = "DELETE FROM bf_autor WHERE `bf_autor`.`id` = $id";
		$query = $this->db->query($sql);
		//$fila = $query->fetch_assoc();

	}
}
