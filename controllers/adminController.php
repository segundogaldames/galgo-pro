<?php 

/**
* 
*/
class adminController extends Controller
{
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->_view->assign('titulo', 'GalgoPro :: Administracion');
		$this->_view->renderizar('index');
	}
}