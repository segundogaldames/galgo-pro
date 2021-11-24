<?php 
/**
* 
*/
class claseModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getClases(){
		$cla = $this->_db->query("SELECT cl.id, cl.titulo, cl.curso_id, cl.created_at as creado, cl.descripcion, cu.nombre as curso FROM clases cl INNER JOIN cursos cu ON cl.curso_id = cu.id");

		return $cla->fetchall();
	}

	public function getClaseId($id){
		#print_r($id);exit;
		$id = (int) $id;

		$cla = $this->_db->prepare("SELECT cl.id, cl.titulo, cl.curso_id, cl.created_at as creado, cl.descripcion, cu.nombre as curso FROM clases cl INNER JOIN cursos cu ON cl.curso_id = cu.id WHERE cl.id = ?");
		$cla->bindParam(1, $id);
		$cla->execute();

		return $cla->fetch();
	}

	public function verificarClaseCurso($titulo, $curso){
		$curso = (int) $curso;

		$cla = $this->_db->prepare("SELECT id FROM clases WHERE titulo = ? AND curso_id = ?");
		$cla->bindParam(1, $titulo);
		$cla->bindParam(2, $curso);
		$cla->execute();

		return $cla->fetch();
	}

	public function getClasesCurso($curso){
		$curso = (int) $curso;

		$cla = $this->_db->prepare("SELECT id, titulo, created_at as creado FROM clases WHERE curso_id = ?");
		$cla->bindParam(1, $curso);
		$cla->execute();

		return $cla->fetchall();
	}

	public function addClase($titulo, $curso, $descripcion){
		$curso = (int) $curso;

		$cla = $this->_db->prepare("INSERT INTO clases VALUES(null, ?, ?, now(), ?)");
		$cla->bindParam(1, $titulo);
		$cla->bindParam(2, $curso);
		$cla->bindParam(3, $descripcion);
		$cla->execute();

		$row = $cla->rowCount();
		return $row;
	}

	public function editClase($id, $titulo, $curso, $descripcion){
		$id = (int) $id;
		$curso = (int) $curso;

		$cla = $this->_db->prepare("UPDATE clases SET titulo = ?, curso_id = ?, descripcion = ? WHERE id = ?");
		$cla->bindParam(1, $titulo);
		$cla->bindParam(2, $curso);
		$cla->bindParam(3, $descripcion);
		$cla->bindParam(4, $id);
		$cla->execute();

		$row = $cla->rowCount();
		return $row;
	}
}