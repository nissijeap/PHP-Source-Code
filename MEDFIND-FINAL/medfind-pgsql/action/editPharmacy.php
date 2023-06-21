<?php 	

include '../constant/connect.php';
include '../test.php';

$pharm_id = $_GET['id'];
if($_POST) {	

	$pharm_name = $_POST['pharm_name'];
	$pharm_address = $_POST['pharm_address'];
	$pharm_no = $_POST['pharm_no'];
	$pharm_email = $_POST['pharm_email'];
	$pharm_open = $_POST['pharm_open'];
	$pharm_close = $_POST['pharm_close'];
    $cover = $_POST['cover'];
    $map = $POST['map'];
    $direction = $_POST['direction'];


	$sql = "CALL update_pharmacy('$pharm_id','$pharm_name', '$pharm_address', '$pharm_no', '$pharm_email', '$pharm_open', '$pharm_close', '$cover', '$map', '$direction')";
	
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
 
