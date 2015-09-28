<?php
class IndexController extends FrontController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		$this->userSessionSwitcher();
		$this->setSmarty();
	}

	// log or unlog to the user
	public function userSessionSwitcher()
	{
		if(AuthController::isLogged())
			AuthController::unlogUser();
	
		AuthController::loginUser();
	}


	public function setSmarty()
	{
		$this->context->smarty->assign('shop_name', Shop::getInstance()->getShopName($_GET['id_shop']));
		$this->context->smarty->assign("page_title","Login");
		$this->context->smarty->display("index.tpl");	
	}


}

?>