<?php
class Product_saleController extends FrontController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		//precedence order
		parent::init();
		AuthController::requireLogin();
		AuthController::requireShopSession();
		Shop::getInstance()->requireOpenShop();

		$formProcess = new FormProductProcess();

		$this->verifyURLVars();
		$this->requireActiveCategory();
		
		
		$this->setSmarty();
	}


	public function verifyURLVars()
	{
		if(!isset($_GET['id_category']) || !is_numeric($_GET['id_category']) || ($_GET['delimiter'] != 1) || !is_numeric($_GET['delimiter']))
		{
			header('location: sale.php');
			exit();
		}
		return true;
	}

	public function requireActiveCategory()
	{
		if(!Category::isCategoryActive($_GET['id_category'])){
			header('Location: sale.php');
			exit();
		}
	}

	public function hasChildrenCategories($id_parent_category)
	{
		$children = Category::getInstance();
		$res = $children->getRelatedCategories($id_parent_category);

		if($res->rowCount() > 0)
			return true;

		return false;
	}

	public function setSmarty()
	{
		$this->context->smarty->assign('category_name',strtoupper(Category::getInstance()->getCategoryName()));
		$this->context->smarty->assign("page_title","New sale");
		$this->addJS(array('Product.js','Validator.js'));

		// verify if the parent category has children categories
		if($this->hasChildrenCategories(intval($_GET['id_category'])))
			$this->context->smarty->assign('hasChildrenCategories','true');

		$this->context->smarty->display("product_sale.tpl");	
	}
}
?>