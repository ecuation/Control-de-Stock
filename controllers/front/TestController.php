<?php
header('Content-Type: text/html; charset=utf-8');
class TestController extends FrontController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		$this->sqltest();
		//$this->setSmarty();
	}

	public function setSmarty()
	{
		$this->context->smarty->assign('shop_name', Shop::getInstance()->getShopName($_GET['id_shop']));
		$this->context->smarty->assign("page_title","Test");
		$this->context->smarty->display("test.tpl");	
	}


	public function sqltest()
	{
		//session_start();

		$id_sesion_antigua = session_id();

		session_regenerate_id();

		$id_sesion_nueva = session_id();

		echo "Sesión Antigua: $id_sesion_antigua<br />";
		echo "Sesión Nueva: $id_sesion_nueva<br />";

		print_r($_SESSION);
	}

}

?>