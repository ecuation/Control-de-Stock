<?php
class FormAccessValidator extends FrontController
{
	/**
	 *@ object instance
	*/
	protected static $instance;

	/**
	 *@array validationList contains the input listValidation
	*/
	public  $validationList;

	/**
	 *@var contains error collection
	*/

	public $errorCollection = array();


	public function __construct()
	{
		parent::__construct();
		$this->validationList = array();
	}
	/**
	 *@return singleton instance
	*/
	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new FormAccessValidator;
		return self::$instance;
	}

	/**
	 *@ init validation
	*/
	public function init()
	{
		for($i=0; $i<count($this->validationList); $i++)
		{
			$this->validate($this->validationList[$i]['inputName'],$this->validationList[$i]['type'],$this->validationList[$i]['rules']);
		}	
		 return $this->checkErrors();
	}
	/**
	 *@return final validation check
	 */
	public function checkErrors()
	{
		if(!count($this->errorCollection) > 0)
			return true;

		return false;			
	}

	/** 
	 *@return error collection
	*/
	public function getErrors()
	{
		return $this->errorCollection;
	}

	/**
	 *@method add new input to validation object
	*/
	public function addValidation($inputName, $type, $rules = array())
	{	 
		array_push($this->validationList,array('inputName'=>$inputName, 'type' => $type, 'rules' => $rules));
	}

	/**
	 *@method control validation type
	*/
	private function validate($input, $type, $rules)
	{
		$value = trim($_POST[$input]);
		switch($type)
		{
			case 'email':
				$this->testEmail($value);
				break;
			case 'password': 
				$this->testString($value, $rules);
				break;
			case 'number':
				$this->testNumber($value, $rules);
				break;
			case 'stringNumber':
				$this->testStringNumber($value, $rules);
				break;
			default:
				return false;
		}
	}

	public function testEmail($email)
	{
		if(!Validate::email($email))
		{
			array_push($this->errorCollection, 'email_error');
			$this->context->smarty->assign('emailError','error');
			return false;
		}

		return true;
	}

	public function testString($value, $rules)
	{
		if(!Validate::string($value, $rules))
		{
			array_push($this->errorCollection,'password_error');
			$this->context->smarty->assign('passwordError','error');
			return false;
		}
		return true;
	}

	public function testNumber($value, $rules)
	{
		if(!Validate::number($value, $rules))
		{
			array_push($this->errorCollection,'quantity_error');
			$this->context->smarty->assign('quantity_error','quantity_error');
			return false;
		}
		return true;
	}

	public function testStringNumber($value, $rules)
	{
		if(!Validate::stringNumber($value, $rules))
		{
			array_push($this->errorCollection,'price_error');
			$this->context->smarty->assign('price_error','price_error');
			return false;
		}
		return true;
	}

	public function testisMinorTo($num, $limit)
	{
		if($num < $limit)
			return true;
		
		return false;
	}

}

?>