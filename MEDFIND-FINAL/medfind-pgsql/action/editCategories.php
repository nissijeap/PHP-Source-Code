<?php 	

include '../constant/connect.php';
include '../test.php';

$class_id = $_GET['id'];
if($_POST) {	

	$class_name = $_POST['class_name'];
  //$categoriesId = $_POST['editCategoriesId'];

	$sql = "CALL update_classification($class_id, '$class_name')";

	if(pg_query($dbconn, $sql)) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../super-categories.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 

	echo json_encode($valid);
 
} 