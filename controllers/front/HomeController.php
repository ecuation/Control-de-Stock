<?php
class HomeController extends FrontController
{
	function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::requireLogin();
		$this->shopSessionSwitcher();
		$this->setSmarty();
	}


	public function setSmarty()
	{
		$this->context->smarty->assign("page_title","Home");
		$this->context->smarty->display('home.tpl');
	}
}

?>