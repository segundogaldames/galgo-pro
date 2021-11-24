<?php

class usuariosController extends Controller
{
	private $_usuario;
	private $_role;

	public function __construct(){
		parent::__construct();
		$this->_usuario = $this->loadModel('usuario');
		$this->_role = $this->loadModel('role');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Usuarios');
		$this->_view->assign('usuarios', $this->_usuario->getUsuarios());
		$this->_view->renderizar('index');
	}

	public function login(){
		if (Session::get('autenticado')) {
			$this->redireccionar();
		}

		$this->_view->assign('titulo', 'GalgoPro :: Iniciar Sesión');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getPostParam('email')) {
				$this->_view->assign('_error', 'Ingrese un correo electrónico');
				$this->_view->renderizar('login');
				exit;
			}
			
			if(!$this->validarEmail($this->getPostParam('email'))){
				$this->_view->assign('_error', 'El correo electrónico no es válido');
				$this->_view->renderizar('login');
				exit;
			}
			
			if (!$this->getSql('password')) {
				$this->_view->assign('_error', 'Ingrese una clave');
				$this->_view->renderizar('login');
				exit;
			}
			
			$row = $this->_usuario->verificarUsuario(
				$this->getPostParam('email'), 
				$this->getSql('password'));

			if (!$row) {
				$this->_view->assign('_error', 'El usuario o la clave no están registrados');
				$this->_view->renderizar('login');
				exit;
				}
			
			Session::set('autenticado', true);
			Session::set('usuario', $row['nombre']); 
			Session::set('id_usuario', $row['id']); 
			Session::set('role', $row['role']);
			Session::set('tiempo', time()); 

			if (Session::get('role') == 'Administrador') {
				$this->redireccionar('admin');	
			}
			
			$this->redireccionar();	
		}

		$this->_view->renderizar('login');
	}

	public function add($role = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRole($role);

		$this->_view->assign('titulo', 'GalgoPro :: Nuevo Usuario');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			//print_r($_POST);exit;
			$this->_view->assign('datos', $_POST);

			if (!$this->getAlphaNum('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre del usuario');
				$this->_view->renderizar('add');
				exit;
			}
			
			if (!$this->getPostParam('email')) {
				$this->_view->assign('_error', 'Ingrese el correo electrónico');
				$this->_view->renderizar('add');
				exit;
			}
			
			if (!$this->validarEmail($this->getPostParam('email'))) {
				$this->_view->assign('_error', 'El correo electrónico ingresado no es válido');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->_usuario->getUsuarioEmail($this->getPostParam('email'))) {
				$this->_view->assign('_error', 'El correo electrónico ingresado ya existe... intente con otro');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->getInt('telefono') && strlen($this->getInt('telefono')) < 9) {
				$this->_view->assign('_error', 'El teléfono ingresado no es válido, debe tener al menos 9 dígitos');
				$this->_view->renderizar('add');
				exit;
			}
			
			if (!$this->getSql('password')) {
				$this->_view->assign('_error', 'Ingrese su password o clave');
				$this->_view->renderizar('add');
				exit;
			}

			if (strlen($this->getSql('password')) < 8) {
				$this->_view->assign('_error', 'El password o clave no es válido...');
				$this->_view->renderizar('add');
				exit;
			}

			if($this->getSql('repassword') != $this->getSql('password')){
				$this->_view->assign('_error', 'El password o clave no coincide');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_usuario->addUsuarios(
				$this->getAlphaNum('nombre'), 
				$this->getPostParam('email'),
				$this->filtrarInt($role), 
				$this->getSql('password'),
				$this->getSql('direccion'),
				$this->getInt('ciudad'),
				$this->getInt('telefono')
				);
			
			if ($row) {
				Session::set('msg_success', 'El usuario se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'El usuario no se ha registrado... inténtelo nuevamente');
			}

			$this->redireccionar('usuarios');		
		}

		$this->_view->renderizar('add');
	}

	public function cerrar(){
		Session::destroy();
		$this->redireccionar();
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarUsuario($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Usuario');
		$this->_view->assign('usuario', $this->_usuario->getUsuarioId($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarUsuario($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Usuario');
		$this->_view->assign('roles', $this->_role->getRoles());
		$this->_view->assign('dato', $this->_usuario->getUsuarioId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getPostParam('email')) {
				$this->_view->assign('_error', 'Ingrese el correo electrónico');
				$this->_view->renderizar('edit');
				exit;
			}
			
			if (!$this->validarEmail($this->getPostParam('email'))) {
				$this->_view->assign('_error', 'El correo electrónico ingresado no es válido');
				$this->_view->renderizar('edit');
				exit;
			}

			if ($this->getInt('telefono') && strlen($this->getInt('telefono')) < 9) {
				$this->_view->assign('_error', 'El teléfono ingresado no es válido... Debe poseee al menos 9 dígitos');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getInt('role')) {
				$this->_view->assign('_error', 'Ingrese el rol del usuario');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getInt('activo')) {
				$this->_view->assign('_error', 'Ingrese opcion para activación o no del usuario');
				$this->_view->renderizar('edit');
				exit;
			}

			$row = $this->_usuario->editUsuario(
				$this->filtrarInt($id), 
				$this->getAlphaNum('nombre'),
				$this->getPostParam('email'),
				$this->getInt('role'),
				$this->getInt('activo'),
				$this->getSql('direccion'),
				$this->getInt('ciudad'),
				$this->getInt('telefono')
			);

			if ($row) {
				Session::set('msg_success', 'El usuario se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'El usuario no se ha modificado... Intente nuevamente');
			}

			$this->redireccionar('usuarios');
		}

		$this->_view->renderizar('edit');
	}

	###############################################################################
	private function verificarUsuario($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('usuarios');
		}

		if (!$this->_usuario->getUsuarioId($this->filtrarInt($id))) {
			$this->redireccionar('usuarios');
		}
	}

	private function verificarRole($role){
		if (!$this->filtrarInt($role)) {
			$this->redireccionar('roles');
		}

		if (!$this->_role->getRoleId($this->filtrarInt($role))) {
			$this->redireccionar('roles');
		}
	}
}