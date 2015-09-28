<?php
class Statistics
{
	private static $instace;

	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(self::$instace))
			self::$instace = new Statistics();

		return self::$instace;
	}


	public function getCurrentMonthSalesInformation()
	{
		$month_info = array();
		$sales =  Sales::getInstance();
		$res = $sales->getTotalMonthSales();

		$operations = 0;
		while($row = PDOQuery::getInstance()->next_row($res)){

			if(_CURRENT_MONTH_ == date('n', $row['date_sale']))
			{
				$operations++;
				$total += $row['amount'];
			}
		}
		
		$month_info['operations'] = ($operations > 0) ? $operations : 0;
		$month_info['total'] = ($operations > 0) ? $total : 0;
		
		return $month_info;
	}

}

?>