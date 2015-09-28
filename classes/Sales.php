<?php

/**
*updated to PDO 19/09/14
*/

class Sales
{
	
	/**
	*@var instance
	*/
	private static $instance;

	/**
	 *@var idLanguage
	*/
	public $idLanguage;

	public $pagination_render;

	public $currentShopSession;

	protected function __construct()
	{
		$this->idLanguage = _ID_LANG_;
		$this->currentShopSession = $_SESSION['shop_session_id'];
	}


	protected $orderList = array(	0	=>"shop_session.date",
									1	=>"sales.amount");

	/**
	 *@return singleton
	*/
	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Sales();

		return self::$instance;
	}



	public function getSessionSales($active = 0, $records_per_page, $id_shop_session = null)
	{
		$id_shop_session = ($id_shop_session == null) ? $_SESSION['shop_session_id'] : $id_shop_session;

		$pagination = new Zebra_Pagination();
        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $records_per_page = ($records_per_page == null) ? 15 : $records_per_page;

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT SQL_CALC_FOUND_ROWS
						sales.quantity, sales.invoice, sales.price, sales.amount, sales.note, sales.id_sale_type, sales.id_category, 
						related.product as related_product, related_reference.reference as related_reference, sales.id_sale,
						sales.date_sale, sales.id_payment_type, sales.position, product_lang.product, payment_type.payment,
						category_color.color, shop_session.date as session_date, product.reference, user.name as employee_name
			FROM sales
		INNER JOIN 
			shop_session 	ON sales.id_shop_session = shop_session.id_shop_session
		LEFT JOIN
			product_lang	AS related ON related.id_product = sales.id_product_related  AND id_lang = "._ID_LANG_."
		LEFT JOIN
			product			AS related_reference ON related_reference.id_product = sales.id_product_related
		INNER JOIN 
			product_lang 	ON product_lang.id_product = sales.id_product
		INNER JOIN
			product 		ON product.id_product = sales.id_product
		INNER JOIN
			payment_type 	ON payment_type.id_type = sales.id_payment_type
		INNER JOIN 
			user 			ON user.id_user = sales.id_employee
		INNER JOIN
			category_color 	ON category_color.id_category = sales.id_category
		WHERE shop_session.is_active = :active
		AND shop_session.id_shop = :id_shop
		AND shop_session.id_shop_session = :id_shop_session
		AND payment_type.id_lang ="._ID_LANG_."
		AND product_lang.id_lang="._ID_LANG_."
		ORDER BY sales.date_sale ASC
		LIMIT
   			" . (($pagination->get_page() - 1) * $records_per_page) . ", " . $records_per_page;
   

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':active', $active, PDO::PARAM_INT);
		$stmt->bindParam(':id_shop', $_SESSION['id_shop'], PDO::PARAM_INT);
		$stmt->bindParam(':id_shop_session', $id_shop_session, PDO::PARAM_INT);
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



	public function getSalesByCategory($active, $records_per_page = null, $id_shop_session = null)
	{

		$id_shop_session = ($id_shop_session == null) ? $_SESSION['shop_session_id'] : $id_shop_session;
		$pagination = new Zebra_Pagination();

        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $records_per_page = ($records_per_page == null) ? 15 : $records_per_page;

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT SQL_CALC_FOUND_ROWS DISTINCT  	
					GROUP_CONCAT(DISTINCT category_lang.category_name) 		AS category,
					GROUP_CONCAT(DISTINCT category_color.color) 			AS category_color,
					GROUP_CONCAT(sales.amount)								AS amount,
					GROUP_CONCAT(sales.id_payment_type) 					AS id_payment_type,
					GROUP_CONCAT(sales.invoice) 							AS invoice,
					SUM(sales.amount) 										AS total,
					COUNT(sales.quantity) 									AS quantity,
					shop_session.date 										AS session_date
					FROM	sales
				INNER JOIN	category_lang USING(id_category)
				INNER JOIN category_color USING(id_category)
				INNER JOIN 	shop_session ON sales.id_shop_session = shop_session.id_shop_session
				WHERE category_lang.id_lang="._ID_LANG_."
				AND shop_session.is_active = :active
				AND shop_session.id_shop = :id_shop
				AND shop_session.id_shop_session = :id_shop_session
				GROUP BY category_lang.category_name
				ORDER BY category_lang.category_name ASC
				LIMIT
   				" . (($pagination->get_page() - 1) * $records_per_page) . ", " . $records_per_page;

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':active', $active, PDO::PARAM_INT);
		$stmt->bindParam(':id_shop', $_SESSION['id_shop'], PDO::PARAM_INT);
		$stmt->bindParam(':id_shop_session', $id_shop_session, PDO::PARAM_INT);
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

	public function getTotalSaleList($id_order_by = null, $records_per_page = null)
	{
		$pagination = new Zebra_Pagination();

        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $records_per_page = ($records_per_page == null) ? 15 : $records_per_page;

		$db = PDOQuery::getInstance();
		$db->connect();

		$order_by = $this->orderBySwitcher($id_order_by);

		$asc = $this->getOrderDirection();

		$sql = "SELECT SQL_CALC_FOUND_ROWS DISTINCT  
					SUM(sales.amount) as total,
					sales.id_shop_session,
					shop_session.date
				FROM 	sales
					INNER JOIN shop_session ON shop_session.id_shop_session = sales.id_shop_session
				WHERE 	shop_session.id_shop = ".$_SESSION['id_shop']."
				AND 	shop_session.is_active = 0
				GROUP BY shop_session.id_shop_session
				ORDER BY $order_by $asc
				LIMIT
   				" . (($pagination->get_page() - 1) * $records_per_page) . ", " . $records_per_page;

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':id_shop', $_SESSION['id_shop'], PDO::PARAM_INT);
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

	public function getTotalMonthSales()
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT sales.amount, date_sale
			FROM sales
				WHERE id_shop =".$_SESSION['id_shop'];
		$stmt = $db->query($sql);

		return $stmt;
	}


	public function orderBySwitcher($id)
	{
		if(!isset($_GET['orderBy']))
			return  $this->orderList[0];

		SessionController::getInstance()->setSessionVar('orderBy', $id);

		if(!in_array($id, array_keys($this->orderList)))
			SessionController::getInstance()->setSessionVar('orderBy', 0);

		return $this->orderList[$_SESSION['orderBy']];
	}

	public function getOrderDirection()
	{

		if(!isset($_GET['orderBy']))
			return $_SESSION['asc'];

		if($_SESSION['order'] == true){
			SessionController::getInstance()->setSessionVar('order', false);
			SessionController::getInstance()->setSessionVar('asc', 'ASC');	
		}else{
			SessionController::getInstance()->setSessionVar('order', true);
			SessionController::getInstance()->setSessionVar('asc', 'DESC');	
		}

		return $_SESSION['asc'];
	}


}

?>