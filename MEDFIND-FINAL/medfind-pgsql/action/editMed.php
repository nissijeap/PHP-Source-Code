<?php 	

include '../constant/connect.php';
include '../test.php';

$med_id = $_GET['id'];
if($_POST) {	
	$med_quan =$_POST['med_quan'];
	$med_price=$_POST['med_price'];
	$med_stat ="";
	$med_exp	=$_POST['med_exp'];

	if($med_quan == 0){
		$med_stat = "Not Available";
	} else {
		$med_stat = "Available";
	}

	$sql = "CALL update_med($med_id, $med_quan, $med_price, '$med_stat', '$med_exp')";
	if(pg_query($dbconn, $sql)) {
		$valid['success'] = true;
	   $valid['messages'] = "Successfully Updated";
	   header('location:../product.php');	
   } else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating the Medicine";
   }

} // /$_POST
	 

echo json_encode($valid);
 
