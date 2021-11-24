<?php 
/**
* 
*/
class ciudadModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getCiudades(){
		$ciud = $this->_db->query("SELECT c.id, c.nombre, c.region_id, r.nombre as region FROM ciudades c INNER JOIN regiones r ON c.region_id = r.id ORDER BY c.nombre");

		return $ciud->fetchall();
	}

	public function getCiudadId($id){
		$id = (int) $id;

		$ciud = $this->_db->prepare("SELECT c.id, c.nombre, c.region_id, r.nombre as region FROM ciudades c INNER JOIN regiones r ON c.region_id = r.id WHERE c.id = ?");
		$ciud->bindParam(1, $id);
		$ciud->execute();

		return $ciud->fetch();
	}

	public function getCiudadNombre($nombre){
		$ciud = $this->_db->prepare("SELECT id FROM ciudades WHERE nombre = ?");
		$ciud->bindParam(1, $nombre);
		$ciud->execute();

		return $ciud->fetch();
	}

	public function getCiudadesRegion($region){
		$region = (int) $region;

		$ciud = $this->_db->prepare("SELECT id, nombre FROM ciudades WHERE region_id = ?");
		$ciud->bindParam(1, $region);
		$ciud->execute();

		return $ciud->fetchall();
	}

	public function addCiudad($nombre, $region){
		$region = (int) $region;

		$ciud = $this->_db->prepare("INSERT INTO ciudades VALUES(null, ?, ?)");
		$ciud->bindParam(1, $nombre);
		$ciud->bindParam(2, $region);
		$ciud->execute();

		$row = $ciud->rowCount();
		return $row;
	}

	public function editCiudad($id, $nombre, $region){
		$id = (int) $id;
		$region = (int) $region;

		$ciud = $this->_db->prepare("UPDATE ciudades SET nombre = ?, region_id = ? WHERE id = ?");
		$ciud->bindParam(1, $nombre);
		$ciud->bindParam(2, $region);
		$ciud->bindParam(3, $id);
		$ciud->execute();

		$row = $ciud->rowCount();
		return $row;
	}
}