<?php 
/**
* 
*/
class cursosController extends Controller
{
	private $_curso;
	private $_especialidad;
	private $_usuario;
	private $_matricula;
	private $_clase;
	
	public function __construct(){
		parent::__construct();
		$this->_especialidad = $this->loadModel('especialidad');
		$this->_usuario = $this->loadModel('usuario');
		$this->_curso = $this->loadModel('curso');
		$this->_matricula = $this->loadModel('matricula');
		$this->_clase = $this->loadModel('clase');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Cursos');
		$this->_view->assign('cursos', $this->_curso->getCursos());
		$this->_view->renderizar('index');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->getCurso($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Curso');
		$this->_view->assign('curso', $this->_curso->getCursoId($this->filtrarInt($id)));
		$this->_view->assign('estudiantes', $this->_matricula->getMatriculadosCurso($this->filtrarInt($id)));
		$this->_view->assign('clases', $this->_clase->getClasesCurso($this->filtrarInt($id)));		
		$this->_view->renderizar('view');
	}

	public function add($especialidad = null){
		#print_r($especialidad);exit;
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->getEspecialidad($especialidad);

		$this->_view->assign('titulo', 'GalgoPro :: Nuevo Curso');
		$this->_view->assign('docentes', $this->_usuario->getUsuarioDocente());
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre del curso');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getInt('docente')) {
				$this->_view->assign('_error', 'Seleccione al docente del curso');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('f_inicio')) {
				$this->_view->assign('_error', 'Seleccione una fecha de inicio');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('f_fin')) {
				$this->_view->assign('_error', 'Seleccione una fecha de fin');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->getSql('f_inicio') > $this->getSql('f_fin')) {
				$this->_view->assign('_error', 'La fecha final no puede ser menor a la fecha de inicio');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->getInt('valor') < 0) {
				$this->_view->assign('_error', 'El precio del curso no es válido');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('descripcion') || strlen($this->getSql('descripcion')) < 5) {
				$this->_view->assign('_error', 'La descripción del curso debe ser mas precisa');
				$this->_view->renderizar('add');
				exit;
			}

			#comprueba que el curso no este registrado
			if ($this->_curso->getCursoRegistrado($this->getSql('nombre'), $this->filtrarInt($especialidad), $this->getInt('docente'))) {
				$this->_view->assign('_error', 'El curso ya existe... Intente con otro');
				$this->_view->renderizar('add');
				exit;
			}

			#registra curso
			$row = $this->_curso->addCurso(
				$this->getAlphaNum('nombre'), 
				$this->filtrarInt($especialidad), 
				$this->getInt('docente'), 
				$this->getSql('f_inicio'), 
				$this->getSql('f_fin'), 
				$this->getInt('valor'),
				$this->getSql('descripcion')
			);

			if ($row) {
				Session::set('msg_success', 'El curso se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'El curso no se ha registrado... Intente nuevamente');
			}

			$this->redireccionar('cursos');
		}

		$this->_view->renderizar('add');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->getCurso($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Curso');
		$this->_view->assign('dato', $this->_curso->getCursoId($this->filtrarInt($id)));
		$this->_view->assign('especialidades', $this->_especialidad->getEspecialidades());
		$this->_view->assign('docentes', $this->_usuario->getUsuarioDocente());
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre del curso');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getInt('especialidad')) {
				$this->_view->assign('_error', 'Seleccione la especialidad');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getInt('docente')) {
				$this->_view->assign('_error', 'Seleccione al docente del curso');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('f_inicio')) {
				$this->_view->assign('_error', 'Seleccione una fecha de inicio');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('f_fin')) {
				$this->_view->assign('_error', 'Seleccione una fecha de fin');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->getSql('f_inicio') > $this->getSql('f_fin')) {
				$this->_view->assign('_error', 'La fecha final no puede ser menor a la fecha de inicio');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->getInt('valor') < 0) {
				$this->_view->assign('_error', 'El precio del curso no es válido');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getInt('activo')) {
				$this->_view->assign('_error', 'Seleccione una opción de estado');
				$this->_view->renderizar('add');
				exit;
			}

			if (!$this->getSql('descripcion') || strlen($this->getSql('descripcion')) < 5) {
				$this->_view->assign('_error', 'La descripción del curso debe ser mas precisa');
				$this->_view->renderizar('add');
				exit;
			}

			#edita el curso
			$row = $this->_curso->editCurso(
				$this->filtrarInt($id), 
				$this->getAlphaNum('nombre'), 
				$this->getInt('especialidad'), 
				$this->getInt('docente'), 
				$this->getSql('f_inicio'), 
				$this->getSql('f_fin'), 
				$this->getInt('valor'), 
				$this->getInt('activo'), 
				$this->getSql('descripcion')
			);

			if ($row) {
				Session::set('msg_success', 'El curso se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'El curso no se ha modificado... Intente nuevamente');
			}

			$this->redireccionar('cursos');
		}

		$this->_view->renderizar('edit');
	}

	##################################################################################################
	private function getEspecialidad($especialidad){
		if (!$this->filtrarInt($especialidad)) {
			$this->redireccionar('especialidades');
		}

		if (!$this->_especialidad->getEspecialidadId($this->filtrarInt($especialidad))) {
			$this->redireccionar('especialidades');
		}
	}

	private function getCurso($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('cursos');
		}

		if (!$this->_curso->getCursoId($this->filtrarInt($id))) {
			$this->redireccionar('cursos');
		}
	}
}