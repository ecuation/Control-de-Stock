<?php
/**
*@class optimized 02/09/14
*/
class ErrorHandler{

	private static $instance;

	public $context;

	protected function __construct(){

		$this->context = Context::getContext();
	}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new ErrorHandler;

		return self::$instance;
	}

	public function getUrlErrorMessage()
	{
		if(isset($_GET['errorMessage']))
			$this->setErrorMessageInSmarty($_GET['errorMessage'],'true');
	}

	public function getUrlSuccessMessage()
	{
		if(isset($_GET['successMessage']))
			$this->setSuccessMessageInSmarty($_GET['successMessage'],'true');
	}


	public function setErrorMessageInSmarty($urlValue)
	{
		if($_GET['errorMessage'] == $urlValue)
		{
			$this->context->smarty->assign($urlValue,"true");
			return false;
		}
		return true;
	}


	public function setSuccessMessageInSmarty($urlValue)
	{
		if($_GET['successMessage'] == $urlValue)
		{
			$this->context->smarty->assign($urlValue,"true");
			return false;
		}
		return true;
	}

	public function show_hint_messages()
	{
		$this->getUrlErrorMessage();
		$this->getUrlSuccessMessage();
	}

}

?>