<?php

class indexController extends Controller
{
	private $_enlace;

	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		
		$this->_view->assign('titulo', 'Bienvenido a GalgoPro');
		


		$this->_view->renderizar('index');
	}
}