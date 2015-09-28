<?php

/**
*optimized 02/09/14
*/
/**
*updated to PDO 19/09/14
*/

class Product
{
	/**
	 *@var idLanguage
	*/
	public $idLanguage;

	public $pagination_render;

	public function __construct()
	{
		$this->idLanguage = _ID_LANG_;
	}

	/**
	 * singleton
	*/
	/*public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Product();

		return self::$instance;
	}*/

	//searchear
	public  function getProductsByIdShop($records_per_page = null)
	{

		$pagination = new Zebra_Pagination();

        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $records_per_page = ($records_per_page == null) ? 25 : $records_per_page;

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = 'SELECT SQL_CALC_FOUND_ROWS DISTINCT
						product_lang.product, product.id_product, stock_available.stock_available, stock_available.price,
						product.reference
				FROM 	product_lang
				RIGHT JOIN product ON product.id_product = product_lang.id_product
				RIGHT JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE stock_available.id_shop = :id_shop1
				AND product_lang.id_lang='._ID_LANG_.$_SESSION['adminQuery'].'

		UNION

		SELECT DISTINCT
				product_lang.product, product.id_product, stock_available.stock_available, stock_available.price,
				product.reference
		FROM 	product_lang
		RIGHT JOIN product ON product.id_product = product_lang.id_product
		RIGHT JOIN stock_available ON product.id_product = stock_available.id_product
		RIGHT JOIN product_tag ON product_tag.id_product = product.id_product
		RIGHT JOIN tags ON tags.id_tag = product_tag.id_tag
		WHERE 	stock_available.id_shop = :id_shop2
		AND 	product_lang.id_lang='._ID_LANG_.'
		AND 	tags.tag = :tagQuery
		ORDER BY id_product asc
		LIMIT
			' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page;

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':id_shop1', $_SESSION['id_shop'],PDO::PARAM_INT);
		$stmt->bindParam(':id_shop2', $_SESSION['id_shop'],PDO::PARAM_INT);
		$stmt->bindParam(':tagQuery', $_SESSION['tagQuery'],PDO::PARAM_STR);
		$stmt->execute();

       	$rows = $db->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN);
        // pass the total number of records to the pagination class
        $pagination->records($rows);

        // records per page
        $pagination->records_per_page($records_per_page);

        $this->pagination_render = $pagination->render();

		$db->close();

		return $stmt;

	}

	public static function getProducts($id_category, $id_manufacturer, $stock_delimeter = 1)
	{
		if(!is_numeric($id_category) && !is_numeric($id_manufacturer))
			return false;

		if($stock_delimeter == 1)
		{
			$delimeter = " AND stock_available.stock_available > 0";
		}else{
			$delimeter = " ";
		}

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT product_lang.product, product.id_product, stock_available.stock_available, stock_available.price
				FROM 	product_lang
				RIGHT JOIN product ON product.id_product = product_lang.id_product
				RIGHT JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE product.id_category= :id_category
				AND product.id_manufacturer = :id_manufacturer
				AND stock_available.id_shop= :id_shop
				".$delimeter."
				AND product_lang.id_lang="._ID_LANG_."
				GROUP BY product_lang.product
				ORDER BY stock_available.stock_available ASC";

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
		$stmt->bindParam(':id_manufacturer', $id_manufacturer, PDO::PARAM_INT);
		$stmt->bindParam(':id_shop', $_SESSION['id_shop'], PDO::PARAM_INT);

		$stmt->execute();

		$db->close();

		return $stmt;
	}

	/*public static function getProductByID($id_product)
	{
		if(!is_numeric($id_product))
			return false;
		$db = Db::getInstance();
		$db->connect();

		$sql = "SELECT product_lang.product, product.id_product, stock_available.price, stock_available.stock_available,
						product.reference, stock_available.stock_available
				FROM 	product
				INNER JOIN product_lang ON product.id_product = product_lang.id_product
				LEFT JOIN stock_available ON product.id_product = stock_available.id_product
				WHERE product.id_product=".$id_product."
				AND stock_available.id_shop=".$_SESSION['id_shop']."
				AND product_lang.id_lang="._ID_LANG_;

		$res = $db->query($sql);

		$db->close();

		return $res;

	}*/


	/*public function getProductByTag()
	{
		$db = Db::getInstance();
		$db->connect();

		$sql="SELECT DISTINCT tags.id_tag, product_lang.product 
				FROM 	tags 
				INNER JOIN product_tag USING(id_tag)
				INNER JOIN product_lang USING(id_product)
				WHERE 	tags.tag LIKE '%toner%'
				AND 	product_lang.id_lang = 2

			UNION

			SELECT DISTINCT id_product, product 
				FROM product_lang
				WHERE product LIKE '%toner%'
				AND id_lang = 2";

		$res = $db->query($sql);

		$db->close();

		return $res;

	}*/


	/*public static function getManufacturers()
	{
		$db = Db::getInstance();
		$db->connect();

		$sql = "SELECT manufacturer, id_manufacturer
				FROM 	manufacturer
				WHERE is_active=1";

		$res = $db->query($sql);

		$db->close();

		return $res;
	}*/

	
	public function getManufacturerByCategoryID($id_category)
	{
		if(!is_numeric($id_category))
			return false;

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT DISTINCT manufacturer.manufacturer, manufacturer.id_manufacturer
			FROM 	manufacturer
			INNER JOIN product ON product.id_category = ?
			INNER JOIN stock_available ON product.id_product = stock_available.id_product
			WHERE manufacturer.id_manufacturer = product.id_manufacturer
			ORDER BY manufacturer ASC";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($id_category));

		$db->close();

		return $stmt;
	}


	public static function getProductPosition($id_session)
	{
		$db = PDOQuery::getInstance();
		$db->connect();
		$sql = "SELECT position 
				FROM sales 
					WHERE id_shop_session = ?
					ORDER BY position DESC";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($id_session));

		$row = PDOQuery::getInstance()->next_row($stmt);

		return $position = $row['position']+1;
	}
}

?>