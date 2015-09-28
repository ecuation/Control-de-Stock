<?php
class PDOQuery
{

	//class instance
	private static $instance;

	//string server
	protected $server;
	
	// string user
	protected $user;
	
	//string password
	protected $password;

	//string db_name
	protected $db_name;

	//link con el resultado de la conexion
	protected $link;

	//query 
	protected $sql;

	//query result
	protected $result;

	//get mysql error
	protected $mysqlError;

	private function __construct($server, $user, $password, $db_name)
	{
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->db_name = $db_name;
	}
	

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new PDOQuery(_DB_SERVER_NAME_, _DB_USER_NAME_, _DB_PASSWORD_, _DB_NAME_);

		return self::$instance;
	}

	public function connect()
	{
		try {
			$this->link = new PDO('mysql:host='.$this->server.';dbname='.$this->db_name, $this->user, $this->password);
			$this->link->exec("set names utf8");
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (PDOException $e) {
			die ($e->getMessage());
		}

		//$this->checkInstance();
	}


	public function checkInstance()
	{
		return var_dump($this->link);
	}

	public function query($sql)
	{
		$res = $this->link->query($sql);
		return $res;
	}

	public function prepareQuery($sql)
	{
		try
		{
			$res = $this->link->prepare($sql);
		}catch(Exception $e){
			die($e->getMessage().' IN QUERY: '.$sql.' in file: '.$e->getFile().' in line: '.$e->getLine());
		}
		return $res;
	}


	public function escapeQuote($str)
	{
		return $this->link->quote($str);
	}


	public function insert_id()
	{
		return $this->link->lastInsertId();
	}


	public function close()
	{
		unset($this->link);
	}


	public function next_row($result = false)
	{
		if (!is_object($result))
			return false;

		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function getMsgError($query = false)
	{
		$error = $this->link->errorInfo();
		return ($error[0] == '00000') ? '' : $error[2];
	}

	public static function numRows($result)
	{
		return $result->rowCount();
	}

	public function escape($str)
	{
		$search = array("\\", "\0", "\n", "\r", "\x1a", "'", '"');
		$replace = array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"');		
		return str_replace($search, $replace, $str);
	}
}

?>