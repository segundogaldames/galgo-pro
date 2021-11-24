<?php 
/**
* 
*/
class matriculasController extends Controller
{
	private $_matricula;
	private $_curso;
	private $_usuario;
	
	public function __construct(){
		parent::__construct();
		$this->_matricula = $this->loadModel('matricula');
		$this->_curso = $this->loadModel('curso');
		$this->_usuario = $this->loadModel('usuario');
	}

	public function index(){

	}

	public function add($curso = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->getCurso($curso);

		$this->_view->assign('titulo', 'GalgoPro :: Nueva Matricula');
		$this->_view->assign('estudiantes', $this->_usuario->getUsuariosEstudiantes());
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getInt('estudiante')) {
				$this->_view->assign('_error', 'Seleccione a un estudiante');
				$this->_view->renderizar('add');
				exit;
			}

			#comprobar que la matricula no este registrada previamente
			if ($this->_matricula->verificarMatricula($this->filtrarInt($curso), $this->getInt('estudiante'))) {
				$this->_view->assign('_error', 'Esta matrícula ya existe... intente con otro estudiante o curso');
				$this->_view->renderizar('add');
				exit;
			}

			#crear matricula
			$row = $this->_matricula->addMatricula($this->filtrarInt($curso), $this->getInt('estudiante'));

			if ($row) {
				Session::set('msg_success', 'La matricula se ha realizado correctamente');
			}else{
				Session::set('msg_error', 'La matricula no se ha realizado... Intente nuevamente');
			}

			$this->redireccionar('cursos');
		}

		$this->_view->renderizar('add');
	}

	##############################################################################################
	private function getCurso($curso){
		if (!$this->filtrarInt($curso)) {
			$this->redireccionar('cursos');
		}

		if (!$this->_curso->getCursoId($this->filtrarInt($curso))) {
			$this->redireccionar('cursos');
		}
	}
}