<?php
class IndexController extends AdminController
{
	function __construct()
	{
		parent::__construct();
	}

	public function init(){
		parent::init();
		$this->setSmarty();
	}

	public function setSmarty()
	{
		$this->context->smarty->assign("page_title","Settings admin");
		$this->context->smarty->display('index.tpl');

	}


}

?>