<?php 	

include '../constant/connect.php';
include '../test.php';


$valid['success'] = array('success' => false, 'messages' => array());

$med_id = $_GET['id'];
if($med_id) { 

 $sql = "CALL remove_medpharm($med_id)";

 if(pg_query($dbconn, $sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../product.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
	header('location:../product.php');	
 }
 

 echo json_encode($valid);
 
} // /if $_POST