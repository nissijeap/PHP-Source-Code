<?php 	

include '../constant/connect.php';
include '../test.php';


//$valid['success'] = array('success' => false, 'messages' => array());

$pack_id = $_GET['id'];

$sql = "DELETE From packaging
WHERE pack_id = $pack_id";
 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../Brand.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 	header('location:../removeBrand.php');
 }
 
 $connect->close();

 echo json_encode($valid);