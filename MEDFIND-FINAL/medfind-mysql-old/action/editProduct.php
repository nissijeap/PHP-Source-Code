<?php 	

include '../constant/connect.php';
include '../test.php';

$med_id = $_GET['id'];
if($_POST) {	

	$med_name =$_POST['med_name'];
	$med_quan =$_POST['med_quan'];
	$med_price=$_POST['med_price'];
	$med_pack =$_POST['med_pack'];
	$med_dosage =$_POST['med_dosage'];
	$med_desc = $POST['med_desc'];
	$med_class = $_POST['med_class'];
	$med_stat ="";
	$med_exp	=$_POST['med_exp'];
	$med_added=date('Y-m-d');

	if($med_quan == 0){
		$med_stat = "Not Available";
	} else {
		$med_stat = "Available";
	}

	if ($med_pack == "" && $med_class == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name', med_quan = '$med_quan', med_price = '$med_price', med_dosage = '$med_dosage',  med_desc = '$med_desc', med_stat = '$med_stat', med_exp = '$med_exp' where med_id = '$med_id' ";
	} else if ($med_pack == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name', med_quan = '$med_quan', med_price = '$med_price', med_dosage = '$med_dosage', med_desc = '$med_desc', med_class = '$med_class', med_stat = '$med_stat', med_exp = '$med_exp' where med_id = '$med_id' ";
	} else if ($med_class == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name', med_quan = '$med_quan', med_price = '$med_price', med_pack = '$med_pack', med_dosage = '$med_dosage', med_desc = '$med_desc', med_stat = '$med_stat', med_exp = '$med_exp' where med_id = '$med_id' ";
	} else {
	$sql = "UPDATE medicine SET med_name = '$med_name', med_quan = '$med_quan', med_price = '$med_price', med_pack = '$med_pack', med_dosage = '$med_dosage', med_desc = '$med_desc', med_class = '$med_class', med_stat = '$med_stat', med_exp = '$med_exp' where med_id = '$med_id' ";
	}
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
 
