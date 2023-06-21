<?php 	

include '../constant/connect.php';
include '../test.php';


$valid['success'] = array('success' => false, 'messages' => array());

$med_id = $_GET['id'];
if($med_id) { 

 $sql = "DELETE From med_pharm
 		WHERE med_pharm_id = $med_id";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../product.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST