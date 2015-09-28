<?php
class AdminController extends ControllerCore
{
	function __construct()
	{

		parent::__construct();
		AuthController::getInstance()->requireAdmin();

		$this->init();
		
		/*$db = DB::getInstance();
		$db->connect();

		$this->init();


		$CSVdata = File_CSV::getCVSArrayList('category.csv');

		//products_lang query
		$sql = "INSERT INTO category
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->query($sql);*/


		//categories query
		/*
		$CSVdata = File_CSV::getCVSArrayList('category.csv');


		/*$sql = "REPLACE INTO product
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->query($sql);*/

		//categories query
		/*
		$CSVdata = File_CSV::getCVSArrayList('category.csv');

		$sql = "INSERT INTO product
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];*/

		/*$sql = "REPLACE INTO product
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->query($sql);*/

		

		/*$CSVdata = File_CSV::getCVSArrayList('products.csv');

		//products query
		$sql = "INSERT INTO products
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->_query($sql);

		$CSVdata = File_CSV::getCVSArrayList('products_lang.csv');

		//products_lang query
		$sql = "INSERT INTO products_lang
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->_query($sql);

		$CSVdata = File_CSV::getCVSArrayList('manufacturer.csv');

		//manufacturer query
		$sql = "INSERT INTO manufacturer
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->_query($sql);

		$CSVdata = File_CSV::getCVSArrayList('categories.csv');

		//categories query
		$sql = "INSERT INTO category
			".$CSVdata['index'].
			"VALUES ".$CSVdata['values'];

		$db->_query($sql);*/
	}


	public function addMedia()
	{
		parent::addMedia();
	}

	public function init()
	{
		$this->addMedia();

	}

	public function setSmarty(){}

}

?>