<?php
require_once(dirname(__FILE__).'/../../config/config.inc.php');

class AjaxProductsController
{


	public $action;

	public function __construct()
	{
		$this->action = $this->getAction();
		$this->switchAction();
	}

	public function getAction()
	{
		if(!isset($_GET['action']))
			return false;
		return $this->action = $_GET['action'];
	}


	public function switchAction()
	{
		switch($this->action)
		{
			case 'get_products': 
				$this->getProductsByCategoryAndManufacturerID();
				break;

			case 'get_manufacturers':
				$this->getManufacturerByCategoryID();

				break;
			default:
				break;
		}
	}

	public function getProductsByCategoryAndManufacturerID()
	{
		if(!isset($_GET['id_category']) && !isset($_GET['id_manufacturer']))
			return false;
		$id_category = $_GET['id_category'];
		$id_manufacturer = $_GET['id_manufacturer'];
		$delimiter = $_GET['delimiter'];


		$product = new Product;
		$res = $product->getProducts($id_category,$id_manufacturer, $delimiter);

		while($row = PDOQuery::getInstance()->next_row($res)){
			// $products .= '<li class="product-list">';
			// $products .= '<a max="'.$row['stock_available'].'" price='.$row['price'].' href="tools/ajax/AjaxProductsController.php?action=getProductByID&id_product='.
			// $row['id_product'].'">'.$row['product'].' ('.$row['stock_available'].')</a>';
			// $products .= '</li>';

			$products .= '{"stock_available": "'.$row['stock_available'].'", "price": "'.$row['price'].'", "id_product": "'.$row['id_product'].'", "product": "'.$row['product'].'"},';
		}
		$products = '{"success": ['.rtrim($products,',').']}';
		echo $products;
	}

	public function getManufacturerByCategoryID()
	{
		if(!isset($_GET['id_category']) || !is_numeric($_GET['id_category']))
			return false;

		$categories = new Product;
		$res = $categories->getManufacturerByCategoryID($_GET['id_category']);

		
		while($row = PDOQuery::getInstance()->next_row($res))
		{
			//$category_list .= '<li class="manufacturer-list"><a href="product_sale.php?id_manufacturer='.$row['id_manufacturer'].'">'.$row['manufacturer'].'</a></li>';
			$category_list .= '{"id_manufacturer": "'.$row['id_manufacturer'].'", "manufacturer": "'.$row['manufacturer'].'"},';
		}

		$category_list = '{"success": ['.rtrim($category_list,',').']}';

		echo $category_list;
	}

	
}


$test = new AjaxProductsController();

