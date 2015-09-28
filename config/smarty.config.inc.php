<?php
require_once(_SMARTY_DIR_."Smarty.class.php");

global $smarty;
$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->caching = false;

$smarty->setCompileDir(_CACHE_DIR_."smarty/compile/");
$smarty->setCacheDir(_CACHE_DIR_."smarty/cache/");

?>