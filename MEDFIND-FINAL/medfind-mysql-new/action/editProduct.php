<?php 	

include '../constant/connect.php';
include '../test.php';

$med_id = $_GET['id'];
if($_POST) {	

	$med_quan =$_POST['med_quan'];
	$med_price=$_POST['med_price'];
	$med_stat ="";
	$med_exp	=$_POST['med_exp'];
	$med_added=date('Y-m-d');


	if($med_quan == 0){
		$med_stat = "Not Available";
	} else {
		$med_stat = "Available";
	}

	
	$sql = "UPDATE med_pharm SET med_quan = '$med_quan', med_price = '$med_price', med_stat = '$med_stat', med_exp = '$med_exp' where med_pharm_id = '$med_id' ";
	
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
		header('location:../product.php');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
