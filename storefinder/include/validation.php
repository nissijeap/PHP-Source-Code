<?php 
require_once(LIB_PATH.DS.'database.php');
/**
 * 
 */
class Validate
{
	
	function __construct()
	{ 
		 $this->pending_products();
		 $this->confirmed_products();
		 $this->expired_products();
	}

	function pending_products(){
		global $mydb;

		$sql = "SELECT * FROM `tblstockout` WHERE Status='Pending' AND DATE_ADD(DateSold, INTERVAL 1 DAY) =CURDATE()";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow > 0) { 
			$res = $mydb->loadResultList();

			foreach ($res as $result) {

				echo $stockoutID = $result->StockoutID . '<br/>';
				echo $productID = $result->ProductID . '<br/>';
				echo $qty = $result->Quantity;

				$sql = "UPDATE `tblstockout`  SET Status  = 'Cancelled',Remarks='Your order has been cancelled' WHERE StockoutID='{$stockoutID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				$sql = "UPDATE `tblstockin` SET Sold=0,Remaining=1 WHERE ProductID='{$productID}' AND `Remaining`=0 AND `ExpiredQty`=0 ORDER BY `DateExpire` DESC LIMIT {$qty}";
				$mydb->setQuery($sql);
				$mydb->executeQuery();  
			}
			
		} 
	}

	function confirmed_products(){
		global $mydb;

		$sql = "SELECT * FROM `tblstockout` WHERE Status='Confirmed' AND DATE_ADD(DateSold, INTERVAL 2 DAY) =CURDATE()";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow > 0) { 
			$res = $mydb->loadResultList();

			foreach ($res as $result) {

				 $stockoutID = $result->StockoutID;
				 $productID = $result->ProductID;
				 $qty = $result->Quantity;

				$sql = "UPDATE `tblstockout`  SET Status  = 'Cancelled',Remarks='Your order has been cancelled' WHERE StockoutID='{$stockoutID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				$sql = "UPDATE `tblstockin` SET Sold=0,Remaining=1 WHERE ProductID='{$productID}' AND `Remaining`=0 AND `ExpiredQty`=0 ORDER BY `DateExpire` DESC LIMIT {$qty}";
				$mydb->setQuery($sql);
				$mydb->executeQuery();  
			}
			
		} 

	}

	function expired_products(){
		global $mydb;
		$sql = "UPDATE `tblstockin` SET ExpiredQty=1,Remaining=0 WHERE `Sold`=0 AND  datediff(date(DateExpire),date(Now())) <= 0 ";
	    $mydb->setQuery($sql);
	    $mydb->executeQuery(); 

	}


}
?>