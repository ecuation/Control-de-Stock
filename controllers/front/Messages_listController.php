<?php
class Messages_listController extends FrontController
{
	public $messagesCollection = array();


	public function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::getInstance()->requireLogin();
		AuthController::requireShopSession();
		$this->setSmarty();
	}

	public function setSmarty()
	{
		$this->getMessagesList();

		$this->context->smarty->assign("page_title","Messages");
		$this->context->smarty->display("messages_list.tpl");	
	}


	public function getMessagesList()
	{
		$messages = Messenger::getInstance();
		$res = $messages->getShopMessages();

		while($row = PDOQuery::getInstance()->next_row($res)){
			$this->messagesCollection[] = array('message' 	=> $row['message'], 'date' => $row['date'], 
												'viewed'	=> $row['viewed']);
		}
			
		$this->context->smarty->assign("messageCollection", $this->messagesCollection);
	}

}

?>