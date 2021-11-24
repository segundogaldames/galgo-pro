<?php 
/**
* 
*/
class cursoModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function getCursos(){
		$cur = $this->_db->query("SELECT DISTINCT cu.id, cu.nombre, cu.especialidad_id, cu.docente_id, cu.fecha_inicio, cu.fecha_fin, cu.valor, cu.activo, cu.created_at as creado, cu.updated_at as modificado, e.nombre as especialidad, u.nombre as docente FROM cursos cu INNER JOIN especialidades e ON cu.especialidad_id = e.id INNER JOIN usuarios u ON cu.docente_id = u.id ORDER BY cu.nombre");

		return $cur->fetchall();
	}

	public function getCursoId($id){
		$id = (int) $id;

		$cur = $this->_db->prepare("SELECT DISTINCT cu.id, cu.nombre, cu.especialidad_id, cu.docente_id, cu.fecha_inicio, cu.fecha_fin, cu.valor, cu.activo, cu.created_at as creado, cu.updated_at as modificado, cu.descripcion, e.nombre as especialidad, u.nombre as docente FROM cursos cu INNER JOIN especialidades e ON cu.especialidad_id = e.id INNER JOIN usuarios u ON cu.docente_id = u.id WHERE cu.id = ?");
		$cur->bindParam(1, $id);
		$cur->execute();

		return $cur->fetch();
	}

	public function getCursoRegistrado($nombre, $especialidad, $docente){
		$especialidad = (int) $especialidad;
		$docente = (int) $docente;

		$cur = $this->_db->prepare("SELECT id FROM cursos WHERE nombre = ? AND especialidad_id = ? AND docente_id = ?");
		$cur->bindParam(1, $nombre);
		$cur->bindParam(2, $especialidad);
		$cur->bindParam(3, $docente);
		$cur->execute();

		return $cur->fetch();
	}

	public function getCursosEspecialidad($especialidad){
		$especialidad = (int) $especialidad;

		$cur = $this->_db->prepare("SELECT id, nombre, fecha_inicio, fecha_fin, activo FROM cursos WHERE especialidad_id = ?");
		$cur->bindParam(1, $especialidad);
		$cur->execute();

		return $cur->fetchall();
	}

	public function addCurso($nombre, $especialidad, $docente, $fecha_inicio, $fecha_fin, $valor, $descripcion){
		$especialidad = (int) $especialidad;
		$docente = (int) $docente;
		$valor = (int) $valor;

		$cur = $this->_db->prepare("INSERT INTO cursos VALUES(null, ?, ?, ?, ?, ?, ?, 2, now(), now(), ?)");
		$cur->bindParam(1, $nombre);
		$cur->bindParam(2, $especialidad);
		$cur->bindParam(3, $docente);
		$cur->bindParam(4, $fecha_inicio);
		$cur->bindParam(5, $fecha_fin);
		$cur->bindParam(6, $valor);
		$cur->bindParam(7, $descripcion);
		$cur->execute();

		$row = $cur->rowCount();
		return $row;
	}

	public function editCurso($id, $nombre, $especialidad, $docente, $fecha_inicio, $fecha_fin, $valor, $activo, $descripcion){
		$id = (int) $id;
		$especialidad = (int) $especialidad;
		$docente = (int) $docente;
		$valor = (int) $valor;
		$activo = (int) $activo;

		$cur = $this->_db->prepare("UPDATE cursos SET nombre = ?, especialidad_id = ?, docente_id = ?, fecha_inicio = ?, fecha_fin = ?, valor = ?, activo = ?, descripcion = ? WHERE id = ?");
		$cur->bindParam(1, $nombre);
		$cur->bindParam(2, $especialidad);
		$cur->bindParam(3, $docente);
		$cur->bindParam(4, $fecha_inicio);
		$cur->bindParam(5, $fecha_fin);
		$cur->bindParam(6, $valor);
		$cur->bindParam(7, $activo);
		$cur->bindParam(8, $descripcion);
		$cur->bindParam(9, $id);
		$cur->execute();

		$row = $cur->rowCount();
		return $row;
	}
}