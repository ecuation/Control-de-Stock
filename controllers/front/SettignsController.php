<?php
class SettingsController extends FrontController
{
	function __construct()
	{
		parent::__construct();	
	}

	public function init(){
		parent::init();
		AuthController::requireLogin();	
		AuthController::requireShopSession();
		$this->setSmarty();
	}

	public function setSmarty()
	{
		$this->context->smarty->assign("page_title","Settings");
		$this->context->smarty->display('settings.tpl');
	}


}

?>