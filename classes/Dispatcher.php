<?php
class Dispatcher
{
	
	/**
		*@var Instance
	*/
	protected static $instance;

	/**
		*@var currentPageName
	*/

	public $currentPageName;

	/**
		*@var default controller path
	*/
	protected $controller_path;

	/**
		*@var contains de current controller name
	*/
	public $controllerName;

	protected function __construct()
	{
		$this->currentPageName = basename($_SERVER['PHP_SELF']);
		$this->controllerName = $this->getCurrentPageController();
		
		if(defined('_ADMIN_DIR_'))
		{

			$this->controller_path = _ADMIN_CONTROLLER_DIR_;
			require_once(_CLASSES_DIR_.'controller/AdminController.php');
		}else{
			$this->controller_path = _FRONT_CONTROLLER_DIR_;
			require_once(_CLASSES_DIR_.'controller/FrontController.php');	

		}

	}
	
	/**
	 * Get current instance of dispatcher (singleton)
	 *
	 * @return Dispatcher
	 */
	public static function getInstance()
	{
		
		if(!isset(self::$instance))
			self::$instance = new Dispatcher;

		return self::$instance;
	}

	/**
		*Find the controller and initiate it
	*/
	public function dispatch()
	{
		$controllers = $this->getControllers($this->controller_path);	
		new $this->controllerName;	
	}


	/**
	 * Get list of all available FO controllers
	 *
	 * @var mixed $dirs
	 * @return array
	 */
	public static function getControllers($dirs)
	{
		if (!is_array($dirs))
			$dirs = array($dirs);

		$controllers = array();
		foreach ($dirs as $dir)
			$controllers = array_merge($controllers, Dispatcher::getControllersInDirectory($dir));
		return $controllers;
	}

	/**
	 * Get list of available controllers from the specified dir
	 *
	 * @param string dir directory to scan (recursively)
	 * @return array
	 */
	public static function getControllersInDirectory($dir)
	{
		if (!is_dir($dir))
			return array();

		$controllers = array();
		$controller_files = scandir($dir);
		foreach ($controller_files as $controller_filename)
		{
			if ($controller_filename[0] != '.')
			{
				if (!strpos($controller_filename, '.php') && is_dir($dir.$controller_filename))
					$controllers += Dispatcher::getControllersInDirectory($dir.$controller_filename.DIRECTORY_SEPARATOR);
				elseif ($controller_filename != 'index.php')
				{
					$key = str_replace(array('controller.php', '.php'), '', strtolower($controller_filename));
					$controllers[$key] = basename($controller_filename, '.php');
				}
			}
		}	
		self::includeControllers($controllers, $dir);
		return $controllers;
	}

	/**
		* Get the controller name of the current page without extension and returns it
	*/
	public function getCurrentPageController()
	{
		$pos = strpos($this->currentPageName,".");
		$controllerName = ucfirst(substr($this->currentPageName, 0, $pos))."Controller";	

		return $controllerName;
	}
	/**
	 *	include the controllers set in php file
	 */
	public function includeControllers($controllers, $path)
	{
		foreach($controllers as $controllerName)
		{
			require_once($path.$controllerName.'.php');
		}
	}



}

?>