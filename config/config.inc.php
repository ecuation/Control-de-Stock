<?php
session_start();
require_once(dirname(__FILE__).'/settings.inc.php');
require_once(dirname(__FILE__).'/functions.php');
require_once(dirname(__FILE__).'/defines.inc.php');
require_once(dirname(__FILE__).'/defines.uri.inc.php');
require_once(dirname(__FILE__).'/smarty.config.inc.php');
require_once(_CONFIG_DIR_.'autoload.php');
/* Get Context */
$context = Context::getContext();
/* instantiate language class */
$context->languageList = array(1 =>'en', 2 => 'es', 3 => 'de', 4 => 'nl');
$context->language = new MultiLanguageClass($context->languageList );

define(_ID_LANG_, $context->language->getLanguageId());

//contains session object 
$context->session = SessionController::getInstance();
/* Get Smarty */
$context->smarty = $smarty;


?>