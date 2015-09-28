<?php
class OverviewController extends FrontController
{

	public $sale_info = array();

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

	public function setSmarty()
	{
		$statistics = Statistics::getInstance();
		$month_info = $statistics->getCurrentMonthSalesInformation();
		$this->context->smarty->assign("operations", $month_info['operations']);
		$this->context->smarty->assign("month_sales", $month_info['total']);

		$this->context->smarty->assign("page_title","Overview");
		$this->getSalesInfo();
		$this->context->smarty->display('overview.tpl');
	}


	public function getSalesInfo()
	{
		$res = Sales::getInstance()->getSalesByCategory(intval($_GET['active']), intval($_GET['records']), intval($_GET['id_shop_session']));

		while($row = PDOQuery::getInstance()->next_row($res)){
			$this->sale_info[] = array(	'quantity' 				=> $row['quantity'],
										'total'					=> $row['total'],
										'category'				=> explode(',',$row['category']),
										'category_color'		=> explode(',',$row['category_color']),
										'session_date'			=> date('d/m/Y',$row['session_date']),
										'total_cash'			=> $this->getTotalBySaleType	(1, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'cash_movements'		=> $this->getOperationsQty		(1, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_credit'			=> $this->getTotalBySaleType	(2, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'credit_movements'		=> $this->getOperationsQty		(2, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_check'			=> $this->getTotalBySaleType	(3, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'check_movements'		=> $this->getOperationsQty		(3, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_other'			=> $this->getTotalBySaleType	(4, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'other_movements'		=> $this->getOperationsQty		(4, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_refund'			=> $this->getTotalBySaleType	(5, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'refund_movements'		=> $this->getOperationsQty		(5, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_cancellation'	=> $this->getTotalBySaleType	(6, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'cancellation_movements'=> $this->getOperationsQty		(6, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_replacement'		=> $this->getTotalBySaleType	(7, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'replacement_movements'	=> $this->getOperationsQty		(7, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_otherC'			=> $this->getTotalBySaleType	(8, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'otherC_movements'		=> $this->getOperationsQty		(8, explode(',',$row['id_payment_type']), explode(',',$row['amount'])),
										'total_invoice'			=> $this->getTotalBySaleType	(1, explode(',',$row['invoice']), explode(',',$row['amount'])),
										'invoice_movements'		=> $this->getOperationsQty		(1, explode(',',$row['invoice']), explode(',',$row['amount'])),
										'total_ticket'			=> $this->getTotalBySaleType	(0, explode(',',$row['invoice']), explode(',',$row['amount'])),
										'ticket_movements'		=> $this->getOperationsQty		(0, explode(',',$row['invoice']), explode(',',$row['amount']))
										);
		}
		
		$this->context->smarty->assign("sale_info", $this->sale_info);
		$this->context->smarty->assign("pagination", Sales::getInstance()->pagination_render);
	}


	public function getTotalBySaleType($type, $typeCollection, $pricesCollection)
	{
		for($i=0; $i<count($typeCollection); $i++){
			if($typeCollection[$i] == $type)
				$res += $pricesCollection[$i];
		}
		return $res;
	}


	public function getOperationsQty($type, $typeCollection, $pricesCollection)
	{
		$count = 0;
		foreach($typeCollection as $id_payment_type)
		{
			if($id_payment_type == $type)
				$count++;	
		}
		return $count;
	}
}

?>