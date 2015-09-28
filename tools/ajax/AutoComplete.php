<?php
header("Content-type: application/json; charset=utf-8");
require_once(dirname(__FILE__).'/../../config/config.inc.php');

class AutoComplete
{
	private $db;

	private $query; 

	private static $instance;

	private function __construct()
	{
		$this->sale_type = $_GET['delimiter'];
		$this->query = trim($_GET['query']);
	}

	public function isQueryEmpty()
	{
		if(strlen($this->query) == 0)
			return true;
	}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new AutoComplete();

		return self::$instance;
	}

	public function getRelatedProducts()
	{
		if($this->isQueryEmpty())
			return false;

		$tag = $this->query;
		$likeQuery = '%'.$this->query.'%';
		$inQuery = $this->getRelatedCategories();

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT DISTINCT  product_lang.id_product as id_product, product_lang.product as value, stock_available.stock_available as stock,
							product.reference
				FROM 	tags
				INNER JOIN product_tag ON product_tag.id_tag = tags.id_tag
				INNER JOIN product_lang ON product_tag.id_product = product_lang.id_product
				INNER JOIN product	ON product.id_product = product_lang.id_product
				INNER JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE 	tags.tag = :tag
				AND 	product.id_category IN  (".$inQuery.")
				AND 	product_lang.id_lang = "._ID_LANG_."
				AND 	stock_available.id_shop = ".$_SESSION['id_shop']."
				".$this->getSaleType()."

			UNION

			SELECT DISTINCT  product_lang.id_product as id_product, product_lang.product as value, stock_available.stock_available as stock,
					product.reference
				FROM product_lang
				INNER JOIN product ON product.id_product = product_lang.id_product
				INNER JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE product_lang.product LIKE :likeQuery
				AND 	product.id_category IN  (".$inQuery.")
				AND 	stock_available.id_shop = ".$_SESSION['id_shop']."
				".$this->getSaleType()."
				AND product_lang.id_lang ="._ID_LANG_;

				

		$res = $db->prepareQuery($sql);

		$res->bindParam(':tag', $tag, PDO::PARAM_STR);
		$res->bindParam(':likeQuery', $likeQuery);

		$res->execute();

		if($db->numRows($res) > 0)
		{
			while($row = $db->next_row($res))
				$query .= '{ "value": "'.$row['value'].' ('.$row['reference'].')", "id_product": "'.$row['id_product'].'", "stock": "'.$row['stock'].'" },';

			return rtrim($query,',');
		}

			return '{ "value": "...", "id_product": "...", "stock": "..."}';	
	}

	public function getCategoryProducts()
	{
		if($this->isQueryEmpty())
			return false;
		$tag = $_GET['query'];
		$likeQuery = '%'.$_GET['query'].'%';
		$id_category = intval($_GET['id_category']);



		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT DISTINCT  product_lang.id_product as id_product, product_lang.product as value, stock_available.stock_available as stock,
							product.reference, stock_available.price
				FROM 	tags
				INNER JOIN product_tag ON product_tag.id_tag = tags.id_tag
				INNER JOIN product_lang ON product_tag.id_product = product_lang.id_product
				INNER JOIN product	ON product.id_product = product_lang.id_product
				INNER JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE 	tags.tag = :tag
				AND 	product.id_category IN  (".$id_category.")
				AND 	product_lang.id_lang = "._ID_LANG_."
				AND 	stock_available.id_shop = ".$_SESSION['id_shop']."
				".$this->getSaleType()."

			UNION

			SELECT DISTINCT  product_lang.id_product as id_product, product_lang.product as value, stock_available.stock_available as stock,
					product.reference, stock_available.price
				FROM product_lang
				INNER JOIN product ON product.id_product = product_lang.id_product
				INNER JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE product_lang.product LIKE :likeQuery
				AND 	product.id_category IN  (".$id_category.")
				AND 	stock_available.id_shop = ".$_SESSION['id_shop']."
				".$this->getSaleType()."
				AND product_lang.id_lang ="._ID_LANG_;

				

		$res = $db->prepareQuery($sql);

		$res->bindParam(':tag', $tag, PDO::PARAM_STR);
		$res->bindParam(':likeQuery', $likeQuery);

		$res->execute();

		if($db->numRows($res) > 0)
		{
			while($row = $db->next_row($res))
				$query .= '{ "value": "'.$row['value'].'", "id_product": "'.$row['id_product'].'", "stock": "'.$row['stock'].'", "price": "'.$row['price'].'", "reference": "'.$row['reference'].'" },';

			return rtrim($query,',');
		}

			return '{ "value": "...", "id_product": "...", "stock": "..."}';	
	}


	public function getSaleType()
	{
		if($this->sale_type == 1)
		{
			$andClause = 'AND 	stock_available.stock_available > 0 ';
		}
		elseif($this->sale_type == 0)
		{
			$andClause = '';
		}else
		{
			return false;
		}
		return $andClause;
	}


	public function getRelatedCategories()
	{
		$categories = Category::getInstance();
		$res = $categories->getRelatedCategories($_GET['id_category']);

		while($row = PDOQuery::getInstance()->next_row($res)){
			 $query .= $row['id_children_category'].',';
		}
		return rtrim($query, ",");
	}
}
$action = $_GET['action'];
$json = AutoComplete::getInstance();
//echo '{"suggestions":['.$json->getRelatedProducts().']}';
switch($action)
{
	case 'category':
		echo '{"suggestions":['.$json->getCategoryProducts().']}';
		break;
	case 'related':
		echo '{"suggestions":['.$json->getRelatedProducts().']}';
		break;
	default:
		echo '{"suggestions": [{ "value": "...", "id_product": "...", "stock": "..."}]}';
		break;
}
exit();

?>