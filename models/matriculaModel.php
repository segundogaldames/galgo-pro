<?php 
/**
* 
*/
class matriculaModel extends Model
{
	
	public function __construct(){
		parent::__construct();
	}

	public function verificarMatricula($curso, $estudiante){
		$curso = (int) $curso;
		$estudiante = (int) $estudiante;

		$mat = $this->_db->prepare("SELECT id FROM matriculas WHERE curso_id = ? AND estudiante_id = ?");
		$mat->bindParam(1, $curso);
		$mat->bindParam(2, $estudiante);
		$mat->execute();

		return $mat->fetch();
	}

	public function getMatriculadosCurso($curso){
		$curso = (int) $curso;

		$mat = $this->_db->prepare("SELECT m.id, m.curso_id, m.estudiante_id, m.fecha_matricula, m.activo, m.updated_at as modificado, c.nombre as curso, u.nombre as estudiante FROM matriculas m INNER JOIN cursos c ON m.curso_id = c.id INNER JOIN usuarios u ON m.estudiante_id = u.id WHERE m.curso_id = ? ORDER BY estudiante");
		$mat->bindParam(1, $curso);
		$mat->execute();

		return $mat->fetchall();
	}

	public function addMatricula($curso, $estudiante){
		$curso = (int) $curso;
		$estudiante = (int) $estudiante;

		$mat = $this->_db->prepare("INSERT INTO matriculas VALUES(null, ?, ?, now(), 1, now())");
		$mat->bindParam(1, $curso);
		$mat->bindParam(2, $estudiante);
		$mat->execute();

		$row = $mat->rowCount();
		return $row;
	}
}