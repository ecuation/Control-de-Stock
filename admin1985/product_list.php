<?php
if (!defined('_ADMIN_DIR_'))
	define('_ADMIN_DIR_', getcwd());
require(_ADMIN_DIR_.'/../config/config.inc.php');
Dispatcher::getInstance()->dispatch();

?>