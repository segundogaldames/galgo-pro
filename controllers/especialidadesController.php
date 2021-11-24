<?php 
/**
* 
*/
class especialidadesController extends Controller
{
	private $_especialidad;
	private $_curso;
	
	public function __construct(){
		parent::__construct();
		$this->_especialidad = $this->loadModel('especialidad');
		$this->_curso = $this->loadModel('curso');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Especialidades');
		$this->_view->assign('especialidades', $this->_especialidad->getEspecialidades());
		$this->_view->renderizar('index');
	}

	public function add(){
		$this->verificarSession();
		$this->verificarRolAdmin();

		$this->_view->assign('titulo', 'GalgoPro :: Especialidades');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre de la especialidad');
				$this->_view->renderizar('add');
				exit;
			}

			#verifica existencia previa de la especialidad
			if ($this->_especialidad->getEspecialidadNombre($this->getSql('nombre'))) {
				$this->_view->assign('_error', 'La especialidad ingresada ya existe... Intente con otra');
				$this->_view->renderizar('add');
				exit;
			}
			#registra especialidad
			$row = $this->_especialidad->addEspecialidad($this->getAlphaNum('nombre'));

			if ($row) {
				Session::set('msg_success', 'La especialidad se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'La especialidad no se ha registrado... Intente nuevamente');
			}

			$this->redireccionar('especialidades');
		}

		$this->_view->renderizar('add');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarEspecialidades($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Especialidad');
		$this->_view->assign('especialidad', $this->_especialidad->getEspecialidadId($this->filtrarInt($id)));
		$this->_view->assign('cursos', $this->_curso->getCursosEspecialidad($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarEspecialidades($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Especialidad');
		$this->_view->assign('dato', $this->_especialidad->getEspecialidadId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre de la especialidad');
				$this->_view->renderizar('edit');
				exit;
			}

			$row = $this->_especialidad->editEspecialidad($this->filtrarInt($id), $this->getSql('nombre'));

			if ($row) {
				Session::set('msg_success', 'La especialidad se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'La especialidad no se ha modificado... Intente nuevamente');
			}

			$this->redireccionar('especialidades');
		}

		$this->_view->renderizar('edit');
	}

	####################################################################################################
	private function verificarEspecialidades($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('especialidades');
		}

		if (!$this->_especialidad->getEspecialidadId($this->filtrarInt($id))) {
			$this->redireccionar('especialidades');
		}
	}
}