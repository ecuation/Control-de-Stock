<?php
/**
*@class optimized 02/09/14
*/
class FrontController extends ControllerCore
{

	function __construct()
	{
		parent::__construct();
		$this->init();
	}

	public function init()
	{
		$this->addMedia();
		$this->get_hint_messages();
	}

	public function addMedia()
	{
		parent::addMedia();
	}

	public function shopSessionSwitcher()
	{
		if(!isset($_SESSION['id_shop']))
			return false;

		Shop::getInstance()->shopSessionSwitch();

		if(Shop::getInstance()->isOpenShop())
		{
			$this->context->smarty->assign("isOpenShop","true");
		}else{
			$this->context->smarty->assign("isOpenShop","false");
		}

	}


	public function setSmarty(){}

}

?>