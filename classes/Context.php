<?php

class Context
{
	/**
		*@var Context
	*/
	private static $context;

	/**
	 *@array languageList
	*/

	public $languageList;

	/**
		*@var Language
	*/
	public $language;

	/**
	 *@var Language Id
	 */

	public $languageId;

	/**
		*@var Smarty
	*/
	public $smarty;

	/**
	 *@var session
	*/
	public $session;

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public static function getContext()
	{
		if(!isset(self::$context))
			self::$context = new Context;
		return self::$context;
	}


}

?>