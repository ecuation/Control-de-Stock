<?php
/**
*@class optimized 02/09/14
*updated to PDO 19/09/14
*/

class FormProductProcess 
{

	public $id_sale_type;

	public $id_product;

	public $id_category;

	public $quantity;

	public $price;

	public $amount;

	public $id_payment_type;

	public $invoice;

	public $id_employee;

	public $id_shop;

	public $shop_session_id;

	public $note;


	public function __construct(){
		//parent::__construct();
		$this->setPostVars();
		$this->startFormProcess();
	}

	public function setPostVars()
	{
		$db = Db::getInstance();
		$db->connect();
		$_POST = $db->escape($_POST);

		$this->id_sale_type 	= 	$_POST['id_sale_type'];
		$this->price 			= 	str_replace(',', '.', $_POST['price']);
		$this->id_product 		= 	$_POST['id_product'];
		$this->id_product_related=	$_POST['id_product_related'];
		$this->id_category 		= 	$_POST['id_category'];
		$this->quantity 		= 	$_POST['quantity'];
		$this->subProductStock	= 	$_POST['sub_product_stock'];
		$this->id_payment_type 	= 	$_POST['id_payment_type'];
		$this->invoice 			= 	$this->setDefaultInvoiceValue($_POST['invoice']);
		$this->note 			= 	$_POST['note'];
		//get session vars
		$this->id_employee 		= 	$_SESSION['id_employee'];
		$this->id_shop 			= 	$_SESSION['id_shop'];
		$this->amount 			= 	$this->getAmountType();
		$this->shop_session_id 	= 	$_SESSION['shop_session_id'];
	}

	/**
	*@return number positive or negative of amount sale type
	*/
	public function getAmountType()
	{
		if(($_POST['id_payment_type'] == 5) || ($_POST['id_payment_type'] == 6) || ($_POST['id_payment_type'] == 8))
		{	
			$number = -($this->price * $this->quantity);
		}else{
			$number =  ($this->price * $this->quantity);
		}

		if(($_POST['id_payment_type'] == 7))
		{
			$number = 0 ;
		}

		return $number;
	}

	/**
	*@return the default invoice value to 0
	*/
	public function setDefaultInvoiceValue($value)
	{
		return ($value > 0) ? $value : 0;
	}


	public function startFormProcess()
	{
		if(isset($_POST['confirm']))
		{
			$form = FormAccessValidator::getInstance();
			$form->addValidation('quantity','number');
			$form->addValidation('price','stringNumber');

			if($form->init()){
				$this->switchActionType();
				return true;
			}
			
			return false;
		}
	}

	public function switchActionType()
	{
		switch($this->id_sale_type)
		{
			//sale 
			case 1:
				$this->processSale();
				break;
			// can
			case 0:
				$this->processcancellation();
				break;
			default:
				return false;
		}
	}
	/**
	* if the parent product qty is mayor to the children the form submition sale will be stopped
	*/
	public function verifyStockWithRelatedProduct()
	{
		if($this->id_product_related > 0)
		{
			if($this->subProductStock < $this->quantity){
				header('Location: sale.php?erroMessage=stockDoes');
				exit();	
			}
		}

	}

	public function processSale()
	{
		$this->verifyStockWithRelatedProduct();

		$db = PDOQuery::getInstance();
		$db->connect();

		$sqlIN = "INSERT INTO sales 	
				(id_product, id_product_related, id_category, id_employee, id_payment_type, id_sale_type, id_shop_session, id_shop, quantity, 
				 price ,amount, invoice, date_sale, note, position)
			VALUES
				(:id_product, :id_product_related, :id_category, :id_employee, :id_payment_type, 
					:id_sale_type, :id_shop_session, :id_shop, 
					:quantity, :price , :amount,
					:invoice, ".time().", :note, :product_position)";

		$stmt1 = $db->prepareQuery($sqlIN);

		$stmt1->execute(array(	':id_product'  			=> 	$this->id_product,
								':id_product_related'	=>	$this->id_product_related,
								':id_category' 			=>	$this->id_category,
								':id_employee'			=>	$this->id_employee,
								':id_payment_type'		=>	$this->id_payment_type,
								':id_sale_type'			=>	$this->id_sale_type,
								':id_shop_session'		=> 	$this->shop_session_id,
								':id_shop'				=> 	$_SESSION['id_shop'],
								':quantity'				=> 	$this->quantity,
								':price'				=>	$this->price,
								':amount'				=>	$this->amount,
								':invoice'				=> 	$this->invoice,
								':note'					=>	$this->note,
								':product_position'		=> 	Product::getProductPosition($this->shop_session_id)));
		
		$sqlUP = "UPDATE stock_available
					SET stock_available = stock_available - :quantity,
					price = :price
					WHERE id_shop =  :id_shop
					AND id_product IN (:id_product, :id_product_related)";
		$stmt2 = $db->prepareQuery($sqlUP);

		$stmt2->execute(array(	':id_shop'				=> 	$this->id_shop,
								':quantity'				=> 	$this->quantity,
								':price'				=>	$this->price,
								':id_product'			=>	$this->id_product,
								':id_product_related'	=>	$this->id_product_related));
		$db->close();
		if($stmt1 && $stmt2){
			
			header('Location: sale.php?success=true');
			exit();
		}	

		return false;
	}


	public function processcancellation ()
	{

		$db = PDOQuery::getInstance();
		$db->connect();

		$query = $this->getcancellationType();		

		$sqlIN = "INSERT INTO sales 	
						(id_product, id_product_related, id_category, id_employee, id_payment_type, id_sale_type, id_shop_session, id_shop, quantity, 
						 price ,amount, invoice, date_sale, note, position)
					VALUES
						(:id_product, :id_product_related, :id_category, :id_employee, :id_payment_type, 
							:id_sale_type, :id_shop_session, :id_shop,
							:quantity, :price , :amount,
							:invoice, ".time().", :note, :product_position)";

		$stmt1 = $db->prepareQuery($sqlIN);

		$stmt1->execute(array(	':id_product'  			=> 	$this->id_product,
								':id_product_related'	=>	$this->id_product_related,
								':id_category' 			=>	$this->id_category,
								':id_employee'			=>	$this->id_employee,
								':id_payment_type'		=>	$this->id_payment_type,
								':id_sale_type'			=>	$this->id_sale_type,
								':id_shop_session'		=> 	$this->shop_session_id,
								':id_shop'				=>	$_SESSION['id_shop'],
								':quantity'				=> 	$this->quantity,
								':price'				=>	$this->price,
								':amount'				=>	$this->amount,
								':invoice'				=> 	$this->invoice,
								':note'					=>	$this->note,
								':product_position'		=> 	Product::getProductPosition($this->shop_session_id)));
		
		$sqlUP = "UPDATE stock_available
					".$query."
					WHERE id_shop =  :id_shop
					AND id_product IN (:id_product, :id_product_related)";

		$stmt2 = $db->prepareQuery($sqlUP);

		$stmt2->execute(array(	':id_shop'				=> 	$this->id_shop,
								':id_product'			=>	$this->id_product,
								':id_product_related'	=>	$this->id_product_related));

		

		$db->close();
		if($stmt1 && $stmt2){
			
			header('Location: cancel.php?success=true');
			exit();
		}

		return false;		

	}

	public function getcancellationType()
	{
		switch($this->id_payment_type)
		{
			//affects stock
			case 6:
			case 7: 
				$query = "SET stock_available = stock_available +".$this->quantity.",
					price = ".$this->price;
				break;
			default: 
				$query = "SET price = ".$this->price;	
				break;
		}
		return $query;
	}

}

?>