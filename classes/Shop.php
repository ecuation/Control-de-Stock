<?php

/**
** ACTUALIZADA A CONSULTAS CON PDO  17/09/14
*
*/

class Shop
{

	/**
	 *@array shopList
	*/
	public static $shopList = array();

	/**
	 *@singleton
	 */
	protected static $instance;


	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Shop;

		return self::$instance;
	}


	/**
   	 *@return shopList
   	*/
	public static function getShops()
	{

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT shop, id_shop 
					FROM 	shop
				ORDER BY shop ASC";

		$res = $db->query($sql);


		while($row = $db->next_row($res))
		{
			self::$shopList[] = array('id_shop' => $row['id_shop'], 'shop' => $row['shop']);
		}

		return self::$shopList;
	}

	public static function getCurrentShopSessionId()
	{
		if(isset($_SESSION['id_shop'])){

			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "SELECT id_shop_session
						FROM shop_session
					WHERE id_shop = ?
					AND is_active = 1";

			$stmt = $db->prepareQuery($sql);

			$stmt->execute(array($_SESSION['id_shop']));

			$row = $db->next_row($stmt);

			return $row['id_shop_session'];
		}

		return $_SESSION['shop_session_id'];
	}

	public static function setShopSession($id)
	{
		if(!is_numeric($id))
			return false;
		SessionController::setSessionVar('shop_session_id', self::getCurrentShopSessionId());
		return true;
	}


	/**
	 *@return shopName
	*/
	public static function getShopName($id_shop)
	{

		if(is_numeric($id_shop))
		{
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "SELECT shop
						FROM 	shop
					WHERE id_shop=?";

			$res = $db->prepareQuery($sql);
			$res->execute(array($id_shop));

			$row = $db->next_row($res);

			return $row['shop'];
		}

	}


	public function openShopSession()
	{

		if(isset($_POST['shop_action'])){
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "INSERT INTO shop_session
						(id_user, id_shop, date, is_active)
					VALUES
						(?, ?, ?, 1)";

			$res = $db->prepareQuery($sql);
			$res->execute( array($_SESSION['id_employee'], $_SESSION['id_shop'], time()) );

			SessionController::getInstance()->setSessionVar('shop_session_id', $db->insert_id());

			$db->close();
		}		
	}

	public function closeShopSession()
	{

		if(isset($_POST['shop_action'])){
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "UPDATE shop_session
					SET is_active = 0
					WHERE id_shop = ?";

			$res = $db->prepareQuery($sql);

			$res->execute(array($_SESSION['id_shop']));

			$db->close();
		}
			
	}

	/**
	 *@return true if shop session is started
	*/
	public function isOpenShop()
	{

		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT id_shop_session
				FROM shop_session
			WHERE 
				id_shop=?
			AND is_active=1";

		$res = $db->prepareQuery($sql);
		$res->execute(array($_SESSION['id_shop']));

		$db->close();

		if($db->numRows($res) > 0)
			return true;

		return false;
	}


	public function isShopUser()
	{


		$db = PDOQuery::getInstance();
		$db->connect();

		$id_shop = intval($_GET['id_shop']);

		$sql="SELECT id_user
				FROM shop_permissions
			WHERE 
				id_shop=?
			AND id_user = ?
			AND is_active=1";

		$res = $db->prepareQuery($sql);
		$res->execute(array($id_shop, $_SESSION['id_employee']));
		$db->close();

		if($db->numRows($res) > 0)
			return true;

		return false;
	}

	public function requireOpenShop()
	{
		if(!$this->isOpenShop())
		{
			header('Location: home.php?errorMessage=shop_is_not_open');
			exit();
		}
	}

	public function shopSessionSwitch()
	{
		if($_POST['shop_action'] == 'open')
		{
			if(!$this->isOpenShop())
			{
				$this->openShopSession();
				$this->openShop();
			}
				

		}elseif($_POST['shop_action'] == 'close')
		{
			$this->closeShopSession();
			$this->closeShop();
		}
	}


	public function closeShop()
	{
		if(isset($_POST["shop_action"]) && ($_POST["shop_action"] == 'close')){
			header('Location: home.php?successMessage=shopClosed');
			exit();
		}	
	}

	public function OpenShop()
	{
		if(isset($_POST["shop_action"]) && ($_POST["shop_action"] == 'open')){
			header('Location: home.php?successMessage=shopOpened');
			exit();
		}	
	}

}


