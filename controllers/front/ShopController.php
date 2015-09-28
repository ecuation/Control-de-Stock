<?php

class ShopController extends FrontController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::requireLogin();
		AuthController::requireShopSession();
		$this->shopSessionSwitcher();
		$this->setSmarty();
	}

	public function setSmarty()
	{
		$statistics = Statistics::getInstance();
		$month_info = $statistics->getCurrentMonthSalesInformation();
		$this->context->smarty->assign("operations", $month_info['operations']);
		$this->context->smarty->assign("month_sales", $month_info['total']);

		$this->context->smarty->assign("page_title","Shop page");
		$this->context->smarty->display("shop.tpl");	
	}		
}
?>