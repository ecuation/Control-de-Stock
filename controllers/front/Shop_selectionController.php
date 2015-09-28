<?php
class Shop_selectionController extends FrontController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::getInstance()->requireLogin();
		ErrorHandler::getInstance()->getUrlErrorMessage();
		$this->setSmarty();
	}

	

	public function setSmarty()
	{
		$this->context->smarty->assign("shopList", Shop::getInstance()->getShops());
		$this->context->smarty->assign("page_title","Shop selection");
		$this->context->smarty->display('shop_selection.tpl');
	}
}

?>