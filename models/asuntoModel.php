<?php 
/**
* 
*/
class asuntoModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getAsuntos(){
		$as = $this->_db->query("SELECT id, nombre FROM asuntos Order By nombre");

		return $as->fetchall();
	}

	public function getAsuntoId($id){
		$id = (int) $id;

		$as = $this->_db->prepare("SELECT id, nombre FROM asuntos WHERE id = ?");
		$as->bindParam(1, $id);
		$as->execute();

		return $as->fetch();
	}

	public function getAsuntoNombre($nombre){
		$as = $this->_db->prepare("SELECT id FROM asuntos WHERE nombre = ?");
		$as->bindParam(1, $nombre);
		$as->execute();

		return $as->fetch();
	}

	public function addAsunto($nombre){
		//print_r($nombre);exit;
		$as = $this->_db->prepare("INSERT INTO asuntos VALUES(null, ?)");
		$as->bindParam(1, $nombre);
		$as->execute();

		$row = $as->rowCount();
		return $row;
	}

	public function editAsunto($id, $nombre){
		$id = (int) $id;

		$as = $this->_db->prepare("UPDATE asuntos SET nombre = ? WHERE id = ?");
		$as->bindParam(1, $nombre);
		$as->bindParam(2, $id);
		$as->execute();

		$row = $as->rowCount();
		return $row;
	}

	public function deleteAsunto($id){
		$id = (int) $id;

		$as = $this->_db->prepare("DELETE FROM asuntos WHERE id = ?");
		$as->bindParam(1, $id);
		$as->execute();

		$row = $as->rowCount();
		return $row;
	}
}