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
	$sql = "UPDATE packaging SET pack_name = '$pack_name' WHERE pack_id = '$pack_id'";
//echo $sql;exit;
	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../Brand.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
		 header('location:editbrand.php');	
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST