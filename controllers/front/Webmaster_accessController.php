<?php
class Webmaster_accessController extends FrontController
{

	function __construct()
	{
		parent::__construct();

		$this->setWebmasterAutentication();

		$this->context->smarty->assign("page_name","Index page");
		$this->context->smarty->assign("page_title","Index page title");
		$this->context->smarty->display('webmaster_access.tpl');

	}


	public function setWebmasterAutentication()
	{
		if(isset($_POST['submit']))
		{
			if($_POST['password'] == "esbien")
			{
				$webmasterSession = SessionController::getInstance();
				$webmasterSession->setSessionVar('webmaster', 1);
			}

			if(isset($_SESSION['webmaster']))
				header('Location: index.php');
		}
	}


}

?>