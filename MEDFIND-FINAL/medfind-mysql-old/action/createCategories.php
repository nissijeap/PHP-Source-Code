<?php 	

include '../constant/connect.php';
include '../test.php';


$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$class_name = $_POST['class_name'];

	$sql = "INSERT INTO classification (class_name) 
	VALUES ('$class_name')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
		header('location:../categories.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST