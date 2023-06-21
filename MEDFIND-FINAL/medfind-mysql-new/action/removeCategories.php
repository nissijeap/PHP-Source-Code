<?php 	

include '../constant/connect.php';

$class_id = $_GET['id'];
$sql = "DELETE From classification
WHERE class_id = $class_id";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../categories.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
 // /if $_POST