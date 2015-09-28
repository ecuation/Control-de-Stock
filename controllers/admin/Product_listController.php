<?php
class Product_listController extends AdminController
{

	protected $smarty_products = array();

	function __construct()
	{
		parent::__construct();
	}

	public function startSearchQuery()
	{
		if(isset($_POST['search']))
		{
			$db = Db::getInstance();
			$db->connect();
			$_POST = Db::getInstance()->escape($_POST);

			$searcher = Searcher::getInstance($_POST);
			$searcher->setQuery();
			$searcher->getQuery();
		}
		elseif(isset($_POST['reset']))
		{
			$_POST = array();

			$searcher = Searcher::getInstance($_POST);
			$searcher->setQuery();
			$searcher->getQuery();
		}
		else
		{
			return false;
		}

		return $searcher->getQuery();
	}

	public function setSmarty()
	{
		$this->getProducts($this->startSearchQuery());

		$this->context->smarty->assign("page_name","Product list");
		$this->context->smarty->assign("page_title","Product list");
		$this->context->smarty->display('product_list.tpl');
	}

	public function init()
	{
		parent::init();
		AuthController::requireLogin();
		AuthController::requireShopSession();
		$this->setSmarty();
	}

	public function getProducts($searchQuery = null)
	{
		$product = new Product;
		$res = $product->getProductsByIdShop(intval($_GET['records']));

		while($row = PDOQuery::getInstance()->next_row($res)){
			$this->smarty_products[] = array(	'id_product' => $row['id_product'], 'product' => $row['product'], 
												'reference'	=> $row['reference'], 
												'stock_available' => $row['stock_available'],
												'price' => $row['price']);
		}

		$this->context->smarty->assign("productList", $this->smarty_products);
		$this->context->smarty->assign("pagination", $product->pagination_render);
	}


}

?>