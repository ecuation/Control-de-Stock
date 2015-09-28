<?php
require_once(dirname(__FILE__).'/../../config/config.inc.php');

class MessagesController
{
	private $id;
	private $message;

	public function __construct()
	{
		$this->id = $_GET['id_sale'];
		$this->message = $_GET['message'];

		$this->setMessage();

	}


	private function setMessage()
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "UPDATE sales 
			SET note = :message
			WHERE id_sale= :id";

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':message', $this->message, PDO::PARAM_STR);
		$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

		$stmt->execute();

		var_dump($stmt->errorInfo());

	}
}

$messages = new MessagesController();

?>