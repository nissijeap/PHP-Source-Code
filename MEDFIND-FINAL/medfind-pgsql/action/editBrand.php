<?php 	

include '../constant/connect.php';
include '../test.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$pack_id = $_GET['id'];
//echo $brandId;exit;
if($_POST) {	
//echo "123";exit;
	$pack_name = $_POST['pack_name'];
  
//echo $brandId;exit;
	$sql = "CALL update_packaging($pack_id, '$pack_name')";
//echo $sql;exit;
	if(pg_query($dbconn, $sql)) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../super-brand.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
		 header('location:editbrand.php');	
	}
	 

	echo json_encode($valid);
 
} // /if $_POST