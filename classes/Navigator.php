<?php

class Navigator
{

	private static $instance;

	private $crumb_list = array();

	private $current_page;

	private $path_info;

	public $page_list = array();


	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Navigator();
		return self::$instance;
	}

	private function __construct()
	{
		$this->crumb_list = ($_SESSION['crumb_list'] == null) ? array() : $_SESSION['crumb_list'];
		$this->path_info = pathinfo($_SERVER['REQUEST_URI']);
	   	$this->current_page = $this->path_info['filename'];
	}

	public function start() 
	{
		$session = SessionController::getInstance();
		$session->setSessionVar('crumb_list', $this->setCrumbQueue());	
		$this->deleteEndCrumbUnMatches();
	}

	public function deleteEndCrumbUnMatches()
	{
		if(end($_SESSION['crumb_list']) != $this->current_page)
			array_pop($_SESSION['crumb_list']);	
	}

	public function clearPastCrumbs()
	{
		$current_index_page = array_search($this->current_page, $this->crumb_list);
		for($i = $current_index_page+1; $i < count($this->crumb_list); $i++)
			unset($this->crumb_list[$i]);

		return  array_unique(array_values($this->crumb_list));
	}

	public function setCrumbQueue()
	{
		array_push($this->crumb_list, $this->current_page);
		return $this->clearPastCrumbs();
	}


	public function getCrumbQueue()
	{
		$crumbs = $_SESSION['crumb_list'];
		$array_intersect = array_values(array_intersect($crumbs, $this->page_list));
		array_pop($array_intersect);

		return $array_intersect;
	}


	public function getCurrentPage()
	{
		return $this->current_page;
	}
}


?>