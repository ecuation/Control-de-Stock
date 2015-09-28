<?php


/**
*@class optimized 02/09/14
*/
abstract class ControllerCore
{
	/**
	 *@var context
	 */
	public $context;
	/**
	 *@var array list of css files
	*/
	public $css_files = array();
	/**
	 *@var array list of js files
	*/
	public $js_files = array();

	/**
	 *@var sesion
	*/
	public $session;

	//set the list of pages for the navigation mode
	public $page_list = array(  
								/*"shop_selection", "home", */"shop", 
								"sale", "product_sale", "cancel", 
								"product_cancellation","overview", 
								"history_list", "list_view", "admin1985", 
								"product_list", "messages_list"
							);

	function __construct()
	{
		$this->context = Context::getContext();
		$this->setDefaultSmartyVars();
		$this->getLanguageInterface();
		$this->getNavigationLinks();
	}


	public function setDefaultSmartyVars()
	{
		$this->context->smarty->assign(array(
												"_MAIN_URL_"			=>	_MAIN_URL_,
												"_ROOT_DIR_"			=>	_ROOT_DIR_,
												"_BASE_ADMIN_URI_"		=>	_BASE_ADMIN_URI_,
												"_IMG_DIR_"				=>	_IMG_DIR_,
												"_USER_KEY_"			=>	$_SESSION['userKey'],
												"_IS_ADMIN_"			=>	$_SESSION['is_admin'],
												"_USER_NAME_"			=>	AuthController::getUserName(),
												"shop_name"				=>  Shop::getInstance()->getShopName($_SESSION['id_shop']),
												"time"					=>  date('l F j, Y'),
												"languageId"			=>  _ID_LANG_,
												"lang"					=>  $this->context->language->getLanguage(),
												'file_name'				=>  basename($_SERVER['PHP_SELF'])
											)
		);
	}

	//add css and js
	public function addMedia()
	{
		$this->addCSS(array('normalize.css','styles.css', 'font-icons.css'));
		$this->addJS(array('clock.js','init.js','SessionControl.js','jquery.js','jquery-ui.js'));
	}

	/**
	*	@param array/string
	*	@param string specify the css folder path
	*/
	function addCSS($css_files, $path = _CSS_DIR_)
	{	
		if(is_array($css_files))
		{
			foreach($css_files as $value)
				array_push($this->css_files, $path.$value);
		}
		else
		{
			array_push($this->css_files, $path.$css_files);
		}
		$this->context->smarty->assign("css_files", $this->css_files);
	}
	/**
	*	@param array/string
	*	@param string specify the js folder path
	*/
	function addJS($js_array_files, $path = _JS_DIR_)
	{
		if(is_array($js_array_files))
		{
			foreach($js_array_files as $value)
				array_push($this->js_files, $path.$value);
		}
		else
		{
			array_push($this->js_files, $path.$js_array_files);	
		}
	
		$this->context->smarty->assign("js_files", $this->js_files);
	}

	function getLanguageInterface()
	{
		$fileName = _LANG_DIR_.$this->context->language->getLanguage().'.php';
		if(file_exists($fileName))
			include($fileName);

		foreach($languageInterface as $index => $value)
			$this->context->smarty->assign($index, $value);	
	}

	/**
	* return the user interface error or succes messages 
	*/
	public function get_hint_messages()
	{
		$error_hints = ErrorHandler::getInstance();
		$error_hints->show_hint_messages();
	}

	public function getNavigationLinks() 
	{
	   	$navigation = Navigator::getInstance();
	   	$navigation->page_list = $this->page_list;
	   	$navigation->start();

	   	$this->context->smarty->assign('navigator', $navigation->getCrumbQueue());
	   	$this->context->smarty->assign('current_page', $navigation->getCurrentPage());
	}

	abstract public function init();

	abstract public function setSmarty();

	
}

?>