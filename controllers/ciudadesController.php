<?php 
/**
* 
*/
class ciudadesController extends Controller
{
	private $_ciudad;
	private $_region;
	
	public function __construct(){
		parent::__construct();
		$this->_ciudad = $this->loadModel('ciudad');
		$this->_region = $this->loadModel('region');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Ciudades');
		$this->_view->assign('ciudades', $this->_ciudad->getCiudades());
		$this->_view->renderizar('index');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarCiudad($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Ciudad');
		$this->_view->assign('ciudad', $this->_ciudad->getCiudadId($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function add($region = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRegion($region);

		$this->_view->assign('titulo', 'GalgoPro :: Nueva Ciudad');
		$this->_view->assign('region', $this->_region->getRegionId($this->filtrarInt($region)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese un nombre a la ciudad');
				$this->_view->renderizar('add');
				exit;
			}

			#comprobar que la ciudad no haya sido guardada anteriormente
			if ($this->_ciudad->getCiudadNombre($this->getSql('nombre'))) {
				$this->_view->assign('_error', 'La ciudad ya está registrada... Intente con otra');
				$this->_view->renderizar('add');
				exit;
			}

			#registrar ciudad
			$row = $this->_ciudad->addCiudad($this->getSql('nombre'), $this->filtrarInt($region));

			if ($row) {
				Session::set('msg_success', 'La ciudad se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'La ciudad no se ha registrado... Intente nuevamente');
			}

			$this->redireccionar('ciudades');
		}

		$this->_view->renderizar('add');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarCiudad($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Ciudad');
		$this->_view->assign('dato', $this->_ciudad->getCiudadId($this->filtrarInt($id)));
		$this->_view->assign('regiones', $this->_region->getRegiones());
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre de la ciudad');
				$this->_view->renderizar('edit');
				exit;
			}

			if (!$this->getInt('region')) {
				$this->_view->assign('_error', 'Seleccione la región');
				$this->_view->renderizar('edit');
				exit;
			}

			#editar ciudad
			$row = $this->_ciudad->editCiudad($this->filtrarInt($id), $this->getAlphaNum('nombre'), $this->getInt('region'));

			if ($row) {
				Session::set('msg_success', 'La ciudad se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'La ciudad no se ha modificado... Intente nuevamente');
			}

			$this->redireccionar('ciudades');
		}

		$this->_view->renderizar('edit');
	}

	################################################################################
	private function verificarRegion($region){
		if (!$this->filtrarInt($region)) {
			$this->redireccionar('regiones');
		}

		if (!$this->_region->getRegionId($this->filtrarInt($region))) {
			$this->redireccionar('regiones');
		}
	}

	private function verificarCiudad($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('ciudades');
		}

		if (!$this->_ciudad->getCiudadId($this->filtrarInt($id))) {
			$this->redireccionar('ciudades');
		}
	}
}