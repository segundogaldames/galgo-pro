<?php 
/**
* 
*/
class regionesController extends Controller
{
	private $_region;
	private $_ciudad;
	
	public function __construct(){
		parent::__construct();
		$this->_region = $this->loadModel('region');
		$this->_ciudad = $this->loadModel('ciudad');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Regiones');
		$this->_view->assign('regiones', $this->_region->getRegiones());
		$this->_view->renderizar('index');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRegion($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Region');
		$this->_view->assign('region', $this->_region->getRegionId($this->filtrarInt($id)));
		$this->_view->assign('ciudades', $this->_ciudad->getCiudadesRegion($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function add(){
		$this->verificarSession();
		$this->verificarRolAdmin();

		$this->_view->assign('titulo', 'GalgoPro :: Nueva Region');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre de la región');
				$this->_view->renderizar('add');
				exit;
			}

			#comprobar que no este registrada la region
			if ($this->_region->getRegionNombre($this->getSql('nombre'))) {
				$this->_view->assign('_error', 'La región ingresada ya existe... Intente con otra');
				$this->_view->renderizar('add');
				exit;
			}

			#registrar la region
			$row = $this->_region->addRegion($this->getAlphaNum('nombre'));

			if ($row) {
				Session::set('msg_success', 'La región se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'La región no se ha registrado...Intente nuevamente');
			}

			$this->redireccionar('regiones');
		}

		$this->_view->renderizar('add');
	}

	public function edit($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarRegion($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Region');
		$this->_view->assign('dato', $this->_region->getRegionId($this->filtrarInt($id)));		
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese el nombre de la región');
				$this->_view->renderizar('add');
				exit;
			}

			#editar la region
			$row = $this->_region->editRegion($this->filtrarInt($id), $this->getAlphaNum('nombre'));

			if ($row) {
				Session::set('msg_success', 'La región se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'La región no se ha modificado...Intente nuevamente');
			}

			$this->redireccionar('regiones');
		}

		$this->_view->renderizar('edit');
	}

	######################################################################################################
	private function verificarRegion($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('regiones');
		}

		if (!$this->_region->getRegionId($this->filtrarInt($id))) {
			$this->redireccionar('regiones');
		}
	}
}