<?php
class CancelController extends FrontController
{
	public $smarty_categories = array();


	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::getInstance()->requireLogin();
		AuthController::requireShopSession();
		Shop::getInstance()->requireOpenShop();
		$this->setSmarty();
	}


	public function getFormMessages()
	{
		if(isset($_GET['success'])){
			if($_GET['success'] == 'true'){
				$this->context->smarty->assign('formMessages', 'true');	
				$this->context->smarty->assign('error', 'class="success"');
			}else{
				$this->context->smarty->assign('formMessages', 'false');
				$this->context->smarty->assign('error', 'class="error"');
			}		
		}
	}


	public function setSmarty()
	{
		$this->setCategoriesInSmarty();
		$this->getFormMessages();
		$this->context->smarty->assign("page_title","Cancel sale");
		$this->context->smarty->display("cancel.tpl");	
	}


	public function setCategoriesInSmarty()
	{
		$categoryObj = Category::getInstance();
		$res = $categoryObj->getCategories();
		

		while($row = PDOQuery::getInstance()->next_row($res)){
			$this->smarty_categories[] = array('id_category' => $row['id_category'], 'category_name' => $row['category_name'], 
												'color'	=> $row['color']);
		}
			
		$this->context->smarty->assign("categoryList", $this->smarty_categories);
	}

}

?>