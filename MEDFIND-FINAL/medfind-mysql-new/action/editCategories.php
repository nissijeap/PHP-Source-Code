<?php 	

include '../constant/connect.php';
include '../test.php';

$class_id = $_GET['id'];
if($_POST) {	

	$class_name = $_POST['class_name'];
  //$categoriesId = $_POST['editCategoriesId'];

	$sql = "UPDATE classification SET class_name = '$class_name' WHERE class_id = '$class_id'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../categories.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} 