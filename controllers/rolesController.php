<?php

class rolesController extends Controller
{
	private $_role;
	private $_usuario;

	public function __construct(){
		parent::__construct();
		$this->_role = $this->loadModel('role');
		$this->_usuario = $this->loadModel('usuario');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Roles');
		$this->_view->assign('roles', $this->_role->getRoles());

		$this->_view->renderizar('index');
	}

	public function add(){
		$this->verificarSession();
		$this->verificarRolAdmin();

		$this->_view->assign('titulo', 'GalgoPro :: Crear Roles');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getAlphaNum('nombre')) {
				$this->_view->assign('_error', 'Ingrese un nombre para el rol');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_role->getRoleNombre($this->getAlphaNum('nombre'));

			if ($row) {
				$this->_view->assign('_error', 'El rol ya existe, intente con otro nombre');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_role->addRoles(
				$this->getAlphaNum('nombre')
				);

			if ($row) {
				Session::set('msg_success', 'El rol se ha ingresado correctamente');
			}else{
				Session::set('msg_error', 'El rol no se ha registrado... inténtelo nuevamente');
			}

			$this->redireccionar('roles');		
		}

		$this->_view->renderizar('add');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRole($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Rol');		
		$this->_view->assign('role', $this->_role->getRoleId($this->filtrarInt($id)));
		$this->_view->assign('usuarios', $this->_usuario->getUsuariosRole($this->filtrarInt($id)));
		$this->_view->renderizar('view');		
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRole($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Rol');
		$this->_view->assign('dato', $this->_role->getRoleId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {

			if (!$this->getAlphaNum('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre del role');
				$this->_view->renderizar('editar');
				exit;
			}

			$row = $this->_role->editRole(
				$this->filtrarInt($id),
				$this->getAlphaNum('nombre')
				);


			if ($row) {
				Session::set('msg_success', 'El rol se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'El rol no se ha modificado... inténtelo nuevamente');
			}

			$this->redireccionar('roles');
		}

		
		$this->_view->renderizar('edit');
	}

	public function delete($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRole($id);

		$usuario = $this->_usuario->getUsuariosRole($this->filtrarInt($id));
		#print_r($usuario);exit;
		if ($usuario) {
			throw new Exception("Error de integridad referencial... Operación no permitida", 1);
			
			
		}else{
			$row = $this->_role->deleteRole($this->filtrarInt($id));

			if ($row) {
				Session::set('msg_success', 'El rol se ha eliminado correctamente');
			}else{
				Session::set('msg_error', 'El rol no se ha eliminado... Intente nuevamente');
			}
		}
		
		$this->redireccionar('roles');
	}

	###################################################################################################
	private function verificarRole($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('roles');
		}

		if (!$this->_role->getRoleId($this->filtrarInt($id))) {
			$this->redireccionar('roles');
		}
	}	
}