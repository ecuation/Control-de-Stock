<?php
class History_listController extends FrontController
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

	public function getSalesHistory()
	{
		$res = Sales::getInstance()->getTotalSaleList(intval($_GET['orderBy']), intval($_GET['records']));

		$odd = true;
		while($row = PDOQuery::getInstance()->next_row($res))
		{
			$odd = ($odd == true) ? false : true;
			$this->sale_info[] = array(
										'total'				=> $row['total'],
										'id_shop_session'	=> $row['id_shop_session'],
										'date'				=> date('d/m/Y - H:i',$row['date']),
										'odd'				=> $odd);								
		}
		
		$this->context->smarty->assign("sale_info", $this->sale_info);
		$this->context->smarty->assign("pagination", Sales::getInstance()->pagination_render);
	}

	public function setSmarty()
	{
		$this->context->smarty->assign("page_title","History list");
		$this->getSalesHistory();
		$this->context->smarty->display('history_list.tpl');
	}
}

?>