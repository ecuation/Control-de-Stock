<?php

//autoloader
function autoload($class)
{
	include (_CLASSES_DIR_.$class.'.php');
}

spl_autoload_register('autoload');