<?php 
/**
* 
*/
class asuntosController extends Controller
{
	private $_asunto;
	private $_contacto;
	
	public function __construct(){
		parent::__construct();
		$this->_asunto = $this->loadModel('asunto');
		$this->_contacto = $this->loadModel('contacto');
	}

	public function index(){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'GalgoPro :: Asuntos');
		$this->_view->assign('asuntos', $this->_asunto->getAsuntos());
		$this->_view->renderizar('index');
	}

	public function add(){
		$this->verificarSession();
		$this->verificarRolAdmin();

		$this->_view->assign('titulo', 'GalgoPro::Nuevo Asunto');
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			//print_r($_POST);exit;
			$this->_view->assign('datos', $_POST);

			if (!$this->getSql('asunto')) {
				$this->_view->assign('_error', 'Ingrese el nombre del asunto');
				$this->_view->renderizar('add');
				exit;
			}

			if ($this->_asunto->getAsuntoNombre($this->getSql('asunto'))) {
				$this->_view->assign('_error', 'El asunto ya existe...');
				$this->_view->renderizar('add');
				exit;
			}

			$row = $this->_asunto->addAsunto($this->getAlphaNum('asunto'));

			if ($row) {
				Session::set('msg_success', 'El asunto se ha registrado correctamente');
			}else{
				Session::set('msg_error', 'El asunto no se ha registrado... Inténtelo nuevamente.');
			}

			$this->redireccionar('asuntos');
			
		}
		$this->_view->renderizar('add');
	}

	public function view($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarAsuntos($id);

		$this->_view->assign('titulo', 'GalgoPro :: Ver Asunto');
		$this->_view->assign('asunto', $this->_asunto->getAsuntoId($this->filtrarInt($id)));
		$this->_view->assign('contactos', $this->_contacto->getContactoAsunto($this->filtrarInt($id)));
		$this->_view->renderizar('view');
	}

	public function edit($id = null){
		#print_r($id);exit;
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarAsuntos($id);

		$this->_view->assign('titulo', 'GalgoPro :: Editar Asunto');
		$this->_view->assign('dato', $this->_asunto->getAsuntoId($this->filtrarInt($id)));
		$this->_view->assign('enviar', CTRL);

		if ($this->getAlphaNum('enviar') == CTRL) {
			if (!$this->getSql('nombre')) {
				$this->_view->assign('_error', 'Ingrese un asunto');
				$this->_view->renderizar('edit');
				exit;
			}

			$row = $this->_asunto->editAsunto(
				$this->filtrarInt($id),
				$this->getAlphaNum('nombre')
			);

			if ($row) {
				Session::set('msg_success', 'El asunto se ha modificado correctamente');
			}else{
				Session::set('msg_error', 'El asunto no se ha modificado... Inténtelo nuevamente');
			}

			$this->redireccionar('asuntos');
		}

		$this->_view->renderizar('edit');
	}

	public function delete($id = null){
		$this->verificarSession();
		$this->verificarRolAdmin();
		$this->verificarAsuntos($id);

		$row = $this->_asunto->deleteAsunto($this->filtrarInt($id));

		if ($row) {
			Session::set('msg_success', 'El asunto se ha eliminado correctamente');
		}else{
			Session::set('msg_error', 'El asunto no se ha eliminado... Inténtelo nuevamente');
		}

		$this->redireccionar('asuntos');
	}

	##################################################################################################
	private function verificarAsuntos($id){
		if (!$this->filtrarInt($id)) {
			$this->redireccionar('asuntos');
		}

		if (!$this->_asunto->getAsuntoId($this->filtrarInt($id))) {
			$this->redireccionar('asuntos');
		}
	}
}