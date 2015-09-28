<?php
class Messenger
{

	private static $instance;

	private function __construct(){}


	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Messenger();
		return self::$instance;
	}

	public function getShopMessages()
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT 
				message, date, viewed
			FROM 	shop_messages
			WHERE id_shop =?";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($_SESSION['id_shop']));

		$db->close();

		return $stmt;
	}
	
}

?>