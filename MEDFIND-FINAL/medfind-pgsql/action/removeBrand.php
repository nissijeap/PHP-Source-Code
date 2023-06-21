<?php 	

include '../constant/connect.php';
include '../test.php';


//$valid['success'] = array('success' => false, 'messages' => array());

$pack_id = $_GET['id'];

$sql = "CALL remove_packaging($pack_id)";

 if(pg_query($dbconn, $sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../super-brand.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 	header('location:../super-brand.php');
 }


 echo json_encode($valid);