<?php

class Searcher
{

	protected $fields = array(	'id_product' 		=> 	array(	'clause'  	=> 	'AND',
																'operator'	=> 	'=',
																'alias'		=>	'id_product',
																'table'		=>	'product'),

								'product'			=>	array(	'clause'	=> 	'AND',
																'operator'	=> 	'LIKE',
																'alias'		=>	'name',
																'table'		=>	'product_lang'),

								'reference'			=>	array(	'clause'	=>	'AND',
																'operator'	=> 	'=',
																'alias'		=>	'reference',
																'table'		=>	'product'),
																

								'stock_available'	=>	array(	'clause'	=> 	'AND',
																'operator'	=>	'=',
																'alias'		=>	'stock_available',
																'table'		=>	'stock_available'
																),

								'price'				=>	array(	'clause'	=> 	'AND',
																'operator'	=>	'=',
																'alias'		=>	'price',
																'table'		=>	'stock_available'
																)
							);

	protected $queryString;

	protected $_post;


	protected static $instance;

	private function __construct($_post)
	{
		$this->_post = $_post;
	}

	public static function getInstance(array $_post)
	{
		if(!isset(self::$instance))
			self::$instance = new Searcher($_post);

		return self::$instance;
	}


	public function setQuery()
	{
		foreach ($this->fields as $db_field => $array) 
		{	
			$this->getAndClauses($array, $db_field);
		}
	}


	public function getAndClauses(array $definitions, $db_field)
	{ 
		if(($definitions['operator'] == "LIKE") && (strlen($this->_post[$definitions['alias']]) > 0))
		{
			$this->queryString .= ' '.$definitions['clause'].' '.$definitions['table'].'.'.$db_field.' '.$definitions['operator'].
			' "%'.$this->_post[$definitions['alias']].'%" ';
		}
		elseif(($definitions['operator'] != "LIKE") && (strlen($this->_post[$definitions['alias']]) > 0))
		{
			$this->queryString .= ' '.$definitions['clause'].' '.$definitions['table'].'.'.$db_field.' '.$definitions['operator'].' "'.trim($this->_post[$definitions['alias']]).'" ';
		}	

		$querySession = SessionController::getInstance();
		$querySession->setSessionVar('adminQuery',$this->queryString);
		$querySession->setSessionVar('tagQuery', $this->_post['name']);
	}


	public function getQuery()
	{
		return $this->queryString;
	}
}


?>