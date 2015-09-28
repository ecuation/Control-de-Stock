<?php
class Shop_session_starterController extends FrontController
{

	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		$this->startShopSession();
	}


	public function startShopSession()
	{
		if(Shop::getInstance()->isShopUser())
		{	
			if(AuthController::setShopSession())
			{
				Shop::setShopSession($_GET['id_shop']);
				header('Location: home.php');
				exit();
			}	
		}

		header('Location: shop_selection.php?errorMessage=accessDenied');
		exit();	
	}
	
}

?>