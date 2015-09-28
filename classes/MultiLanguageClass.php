<?php
class MultilanguageClass{

	private $defaultLan;
	private $defaultLanguages;
	private $lan;
	public 	$id_lang;


	function __construct($languages)
	{
		$this->defaultLanguages = $languages;
		$this->lan = "";
		$this->defaultLan = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);	//verificamos el idioma por defecto del navegador del cliente

		$this->getLanguage();
	}
	
	public function getLanguage(){


		if(!isset($_SESSION['userKey']))
		{
			if(isset($_GET['lan']))
			{
				$this->lan = $_GET['lan'];
			}
			elseif(isset($_SESSION["lang"]))
			{
				//firefox has a bug and obtains the css path, this line deletes the unnecessary characters of the string and it only returns the 2 first characters with the language information			$this->lan = substr($_SESSION["lang"], 0, 2);
				$this->lan = substr($_SESSION["lang"], 0, 2);

			}
			elseif(!isset($_SESSION["lang"]) && !isset($_GET["lan"]))
			{
				if(!in_array($this->defaultLan, $this->defaultLanguages))
				{
					$this->lan = "en";
				}else
				{
					$this->lan = $this->defaultLan;
				}
				
			}

			return $_SESSION["lang"] = $this->lan;

		}else{
			return $_SESSION["lang"] = $this->defaultLanguages[$_SESSION['id_lang']];
 		}

		
	}


	public function getLanguageId()
	{
		if(!isset($_SESSION['userKey']))
		{
			return $_SESSION['id_lang'] = array_search($this->lan, $this->defaultLanguages);	
		}else{
			return $_SESSION['id_lang'];
		}
		
	}
}

?>