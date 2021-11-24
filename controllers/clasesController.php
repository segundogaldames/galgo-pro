<?php 
/**
* 
*/
class clasesController extends Controller
{
	private $_clase;
	private $_curso;
	
	public function __construct(){
		parent::__construct();
		$this->_clase = $this->loadModel('clase');
		$this->_curso = $this->loadModel('curso');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Clases');
		$this->_view->assign('clases', $this->_clase->getClases());
		$this->_view->renderizar('index');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarClase($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Clase');
		$this->_view->assign('clase', $this->_clase->getClaseId($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarClase($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Clase');
		$this->_view->assign('dato', $this->_clase->getClaseId($this->filtrarInt($id)));
		$this->_view->assign('cursos', $this->_curso->getCursos());
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('titulo')) {
				$this->_view->assign('_error', 'Ingrese el título de la clase');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getInt('curso')) {
				$this->_view->assign('_error', 'Seleccione el currso de la clase');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getSql('descripcion')) {
				$this->_view->assign('_error', 'Ingrese una descripción de la clase');
				$this->_view->renderizar('edit');
				exit;
			}

			#Editar la clase
			$row = $this->_clase->editClase(
				$this->filtrarInt($id), 
				$this->getAlphaNum('titulo'), 
				$this->getInt('curso'), 
				$this->getSql('descripcion')
			);

			if ($row) {
				Session::set('msg_success', 'La clase fue modificada correctamente');
			}else{
				Session::set('msg_error', 'La clase no fue modificada... Intente mas tarde');
			}

			$this->redireccionar('clases');
		}

		$this->_view->renderizar('edit');
	}	

	public function add($curso = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarCurso($curso);

		$this->_view->assign('titulo', 'GalgoPro :: Nueva Clase');
		$this->_view->assign('curso', $this->_curso->getCursoId($this->filtrarInt($curso)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('titulo')) {
				$this->_view->assign('_error', 'Ingrese el título de la clase');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('descripcion')) {
				$this->_view->assign('_error', 'Ingrese una descripción de la clase');
				$this->_view->renderizar('add');
				exit;
			}

			#comprobar si una clase ya existe
			if ($this->_clase->verificarClaseCurso($this->getSql('titulo'), $this->filtrarInt($curso))) {
				$this->_view->assign('_error', 'La clase ingresada ya existe... intente con otra');
				$this->_view->renderizar('add');
				exit;
			}

			#registrar la clase
			$row = $this->_clase->addClase(
				$this->getAlphaNum('titulo'),
				$this->filtrarInt($curso),
				$this->getSql('descripcion')
			);

			if ($row) {
				Session::set('msg_success', 'La clase fue registrada correctamente');
			}else{
				Session::set('msg_error', 'La clase no fue registrada... Intente mas tarde');
			}

			$this->redireccionar('clases');
		}

		$this->_view->renderizar('add');
	}

	################################################################################################
	private function verificarCurso($curso){
		if (!$this->filtrarInt($curso)) {
			$this->redireccionar('clases');
		}

		if (!$this->_curso->getCursoId($this->filtrarInt($curso))) {
			$this->redireccionar('clases');
		}
	}

	private function verificarClase($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('clases');
		}

		if (!$this->_clase->getClaseId($this->filtrarInt($id))) {
			$this->redireccionar('clases');
		}
	}
}