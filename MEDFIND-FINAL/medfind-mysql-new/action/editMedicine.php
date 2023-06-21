<?php 	

include '../constant/connect.php';
include '../test.php';

$med_id = $_GET['id'];
if($_POST) {	

	$med_name =$_POST['med_name'];
	$med_pack =$_POST['med_pack'];
	$med_dosage =$_POST['med_dosage'];
	$med_desc = $POST['med_desc'];
	$med_class = $_POST['med_class'];


	if ($med_pack == "" && $med_class == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name',  med_dosage = '$med_dosage',  med_desc = '$med_desc' where med_id = '$med_id' ";
	} else if ($med_pack == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name',  med_dosage = '$med_dosage', med_desc = '$med_desc' where med_id = '$med_id' ";
	} else if ($med_class == ""){
		$sql = "UPDATE medicine SET med_name = '$med_name',  med_pack = '$med_pack', med_dosage = '$med_dosage', med_desc = '$med_desc' where med_id = '$med_id' ";
	} else {
	$sql = "UPDATE medicine SET med_name = '$med_name', med_pack = '$med_pack', med_dosage = '$med_dosage', med_desc = '$med_desc', med_class = '$med_class' where med_id = '$med_id' ";
	}
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
		header('location:../medicine.php');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
