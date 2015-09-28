<?php
class List_viewController extends FrontController
{
	public $summary_products = array();

	function __construct()
	{
		parent::__construct();
	}

	public function init()
	{
		parent::init();
		AuthController::requireLogin();
		AuthController::requireShopSession();
		Shop::getInstance()->requireOpenShop();
		$this->setSmarty();
	}

	public function addMedia()
	{
		parent::addMedia();
		$this->addJS('InputEditor.js');
	}

	public function getSalesInfo()
	{
		$records = $this->getRecordsToShow();
		$res = Sales::getInstance()->getSessionSales(intval($_GET['active']), $records, intval($_GET['id_shop_session']));

		while($row = PDOQuery::getInstance()->next_row($res)){
			$this->summary_products[] = array(	'amount' 			=> $row['amount'],
												'employee_name'		=> $row['employee_name'],
												'reference'			=> $row['reference'],
												'price'				=> $row['price'], 
												'quantity' 			=> $row['quantity'], 
												'product' 			=> $row['product'],
												'related_product'	=> $row['related_product'],
												'related_reference' => $row['related_reference'],
												'date_sale' 		=> date('H:i ', $row['date_sale']),
												'session_date'		=> date('d/m/Y',$row['session_date']),
												'note'				=> htmlspecialchars($row['note']),
												'payment_type'		=> $row['payment'],
												'invoice'			=> $row['invoice'],
												'color'				=> $row['color'],
												'sale_type'			=> $row['id_sale_type'],
												'id_payment_type'	=> $row['id_payment_type'],
												'id_sale'			=> $row['id_sale'],
												'position'			=> $row['position']
											 );
		}


		
		$this->context->smarty->assign("summary_products", $this->summary_products);
		$this->context->smarty->assign("pagination", Sales::getInstance()->pagination_render);

	}

	public function setSmarty()
	{
		$statistics = Statistics::getInstance();
		$month_info = $statistics->getCurrentMonthSalesInformation();
		$this->context->smarty->assign("operations", $month_info['operations']);
		$this->context->smarty->assign("month_sales", $month_info['total']);

		$this->getSalesInfo();
		$this->context->smarty->assign("page_title","List view");
		$this->context->smarty->display('list_view.tpl');
	}

	public function getRecordsToShow()
	{
		if(!isset($_GET['records']) || !intval($_GET['records']))
			return $records = 10;
		return $_GET['records'];
	}
}

?>