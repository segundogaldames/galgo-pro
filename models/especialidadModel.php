<?php 
/**
* 
*/
class especialidadModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getEspecialidades(){
		$esp = $this->_db->query("SELECT id, nombre FROM especialidades ORDER BY nombre");

		return $esp->fetchall();
	}

	public function getEspecialidadId($id){
		$id = (int) $id;

		$esp = $this->_db->prepare("SELECT id, nombre FROM especialidades WHERE id = ?");
		$esp->bindParam(1, $id);
		$esp->execute();

		return $esp->fetch();
	}

	public function getEspecialidadNombre($nombre){
		$esp = $this->_db->prepare("SELECT id FROM especialidades WHERE nombre = ?");
		$esp->bindParam(1, $nombre);
		$esp->execute();

		return $esp->fetch();
	}

	public  function addEspecialidad($nombre){
		$id = (int) $id;

		$esp = $this->_db->prepare("INSERT INTO especialidades VALUES(null, ?)");
		$esp->bindParam(1, $nombre);
		$esp->execute();

		$row = $esp->rowCount();
		return $row;
	}

	public function editEspecialidad($id,$nombre){
		$id = (int) $id;

		$esp = $this->_db->prepare("UPDATE especialidades SET nombre = ? WHERE id = ?");
		$esp->bindParam(1, $nombre);
		$esp->bindParam(2, $id);
		$esp->execute();

		$row = $esp->rowCount();
		return $row;
	}
}