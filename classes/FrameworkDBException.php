<?php
class FrameworkDBException extends FrameworkException
{
	
	public function displayDBErrorMessage($sql)
	{

		$message .= "SQL error query en linea ".$this->getLine()." en ".$this->getFile()."<br>";
		$message .= "Error en consulta: ".$sql."<br>";
		return $message;
	}
}

?>