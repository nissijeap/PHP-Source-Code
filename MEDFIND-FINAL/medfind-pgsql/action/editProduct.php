<?php 	

include '../constant/connect.php';
include '../test.php';

$med_id = $_GET['id'];
if($_POST) {	

	$med_name =$_POST['med_name'];
	$med_pack =$_POST['med_pack'];
	$med_dosage =$_POST['med_dosage'];
	$med_class = $_POST['med_class'];

	if ($med_pack == '' && $med_class == ''){
		$sql = "CALL update_null($med_id, '$med_name', '$med_dosage')";
	} else if ($med_pack == '') {
		$sql = "CALL update_medicine($med_id, '$med_name', null, '$med_dosage', $med_class)";
	} else if ($med_class == ''){
		$sql = "CALL update_medicine($med_id, '$med_name', $med_pack, '$med_dosage', null)";
	} else {
		$sql = "CALL update_medicine($med_id, '$med_name', $med_pack, '$med_dosage', null)";
	}


	

	if(pg_query($dbconn, $sql)) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../super-product.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the Medicine";
	}

} // /$_POST


echo json_encode($valid);
 
