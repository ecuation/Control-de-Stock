<?php
header("Content-type: application/json; charset=utf-8");
require_once(dirname(__FILE__).'/../../config/config.inc.php');

class AutoComplete
{
	private $db;

	private static $instance;

	private function __construct()
	{

	}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new AutoComplete();

		return self::$instance;
	}

	public function getRelatedProducts()
	{
		$tag = $_GET['query'];
		$likeQuery = '%'.$_GET['query'].'%';
		$inQuery = $this->relatedCategoriesQuery();

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT DISTINCT  product_lang.id_product as data, product_lang.product as value
				FROM 	tags
				RIGHT JOIN product_tag USING(id_tag)
				INNER JOIN product_lang USING(id_product)
				INNER JOIN product	USING(id_product)
				WHERE 	tags.tag = :tag
				AND 	product.id_category IN  (".$inQuery.")
				AND 	product_lang.id_lang = "._ID_LANG_."

			UNION

			SELECT DISTINCT  product_lang.id_product as data, product_lang.product as value
				FROM product_lang
				INNER JOIN product ON product.id_product = product_lang.id_product
				WHERE product_lang.product LIKE :likeQuery
				AND 	product.id_category IN  (".$inQuery.")
				AND product_lang.id_lang ="._ID_LANG_;

				

		$res = $db->prepareQuery($sql);

		$res->bindParam(':tag', $tag, PDO::PARAM_STR);
		$res->bindParam(':likeQuery', $likeQuery);

		$res->execute();

		if($db->numRows($res) > 0)
		{
			while($row = $db->next_row($res))
			{
				$query .= '{ "value": "'.$row['value'].'", "data": "'.$row['data'].'" },';
			}
			return rtrim($query,',');
		}
		else
		{
			return '{ "value": "...", "data": "..."}';
		}
		
	}


	


	public function relatedCategoriesQuery()
	{
		$categories = Category::getInstance();
		$res = $categories->getRelatedCategories($_GET['id_category']);

		while($row = PDOQuery::getInstance()->next_row($res)){
			 $query .= $row['id_children_category'].',';
		}
		return rtrim($query, ",");
	}
}

$json = AutoComplete::getInstance();
echo '{"suggestions":['.$json->getRelatedProducts().']}';
exit();

?>