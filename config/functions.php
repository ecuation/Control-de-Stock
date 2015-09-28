<?php
/*
obtiene el path de la ruta del fichero que se pasa como parametro sin incluir el nombre del fichero en 
cuestion o bien si el parametro esta a null obtendra la ruta del fichero donde se está ejecutando la funcion. 
*/
function getParentDirectoryURL($uri_string = NULL)
{
	if(!$uri_string)
		$uri_string = $_SERVER["SCRIPT_NAME"];

	$slash_position = get_last_slash_position($uri_string, -1);
	$result_path = substr($uri_string, 0, $slash_position)."/";
	return $result_path;
}

function get_last_slash_position($string, $delimiter)
{
	if(preg_match('/\\\\/', $string))
	{
		$slash_position = strripos ($string,'\\',$delimiter);
	}else{
		$slash_position = strripos ($string,'/',$delimiter);
	}

	return $slash_position;
}

function getMainURL()
{
	$root = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
	$root .= getParentDirectoryURL(substr(__DIR__, strlen($_SERVER[ 'DOCUMENT_ROOT' ])));
	return str_replace('\\','/',$root);
}


