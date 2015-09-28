<?php
class SessionController
{

	/**
	 *@var object instance
	 */
	protected static $instance;
	/**
	 *@var session name
	*/
	public $sessionName;
	/**
	 *@var user
	*/
	//public $userCategory;


	/*
	 *@ set type user values
	*/
	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new SessionController();
		return self::$instance;
	}

	public function setSessionVar($sessionName,$value)
	{
		$_SESSION[$sessionName] = $value;
	}


	public function destroy_session()
	{
		session_destroy();
	}
}
?>