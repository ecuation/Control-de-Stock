<?php

//set debug mode to show php errors
define('_DEBBUG_MODE_', true);

if (_DEBBUG_MODE_)
{
	@ini_set('display_errors', 'on');
	//@error_reporting(E_ALL | E_STRICT);
}
else
{
	@ini_set('display_errors', 'off');
}
$time = time(); 
$gdate=getdate($time);
$currentDir = dirname(__FILE__);

define('_ROOT_DIR_', 				realpath($currentDir.'/..'));
define('_CONFIG_DIR_',				_ROOT_DIR_.'/config/');
define('_TOOLS_DIR_',				_ROOT_DIR_.'/tools/');
define('_CLASSES_DIR_',				_ROOT_DIR_.'/classes/');
define('_CACHE_DIR_',				_ROOT_DIR_.'/cache/');
define('_SMARTY_DIR_',				_TOOLS_DIR_.'/smarty/');
define('_CSV_DIR_',					_ROOT_DIR_.'/csv/');
define('_LANG_DIR_',				_ROOT_DIR_.'/lang/');



define('_CONTROLLERS_DIR_',			_ROOT_DIR_.'/controllers/');
define('_ADMIN_CONTROLLER_DIR_',  	_ROOT_DIR_.'/controllers/admin/');
define('_FRONT_CONTROLLER_DIR_',  	_ROOT_DIR_.'/controllers/front/');

//current time 
define('_CURRENT_MONTH_',			$gdate['mon']);





