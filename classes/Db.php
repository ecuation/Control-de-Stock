<?php

class Db
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
	

	protected function __construct($server, $user, $password, $db_name)
	{
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->db_name = $db_name;
	}

	public static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new Db(_DB_SERVER_NAME_, _DB_USER_NAME_, _DB_PASSWORD_, _DB_NAME_);
		}

		return self::$instance;
	}
	
	public function connect()
	{
		$this->link = @new mysqli($this->server, $this->user, $this->password);
		if(!$this->link)
			die('No ha sido posible conectar con la base datos, por favor, 
				verifica los parámetros de conexión a la base de datos.' );
		
		if(!$this->set_db($this->db_name))
			echo "Error al elegir base de datos. \"".$this->db_name."\" no existe!  <br/>";
	}

	public function set_db($db_name)
	{
		return mysqli_select_db($this->link, $db_name);
	}

	public function query($sql)
	{
		$this->result = @mysqli_query($this->link, $sql);
		$this->mysqliError = @mysqli_error($this->link);
		if(_DEBBUG_MODE_)
		{	
			if(!$this->result)
			{
				echo "Error en consulta SQL: \"".$sql."\"<br> SQL mensaje de error: ".mysqli_error($this->link);
				exit();
			}	
		}
		return $this->result;
	}

	public function found_rows($sql)
	{
		$res = @mysqli_query($this->link, $sql);
		
		return $res;

	}


	public function next_row($res = false)
	{
		if (!$result)
			$result = $this->result;
		return $result->fetch_assoc();
	}


	public function close(){
		mysqli_close($this->link);
	}

	public function insert_id()
	{
		return mysqli_insert_id($this->link);
	}

	public function affected_rows()
	{
		return mysqli_affected_rows($this->link);
	}

	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}

	public function escape($data){
		if(get_magic_quotes_gpc)
		{
			if(is_array($data)){
				foreach($data as $a => $b)
				{
					$data[$a] = mysqli_real_escape_string($this->link, $b);	
				}
				return $data;
			}
			else
			{
				return mysqli_real_escape_string($this->link, $data);
			}
			
		}else{
			return $data;	
		}	
	}

	public function _strip_string_slashes($string)
	{
		return stripslashes($string);
	}

}


?>