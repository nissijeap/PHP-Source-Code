<?php 	

include '../constant/connect.php';
include '../test.php'; ?>

<?php

$pharm_id = $_GET['id'];
if($_POST) {	

	$pharm_name = $_POST['pharm_name'];
	$pharm_address = $_POST['pharm_address'];
	$pharm_no = $_POST['pharm_no'];
	$pharm_email = $_POST['pharm_email'];
	$pharm_open = $_POST['pharm_open'];
	$pharm_close = $_POST['pharm_close'];

	if (isset($_FILES['updatefile']['name']) && ($_FILES['updatefile']['name'] =="")){
		

		$sql = "UPDATE pharmacy_details SET pharm_name = '$pharm_name', 
			pharm_address = '$pharm_address',
			pharm_no = '$pharm_no',
			pharm_email = '$pharm_email',
			pharm_open = '$pharm_open',
			pharm_close = '$pharm_close'
			WHERE pharm_id = '$pharm_id'";
			
	} else {
		$filename = $_FILES["updatefile"]["name"];
    	$tempname = $_FILES["updatefile"]["tmp_name"];
		$folder = "../image/" . $filename;
		
	$sql = "UPDATE pharmacy_details set cover = null where pharm_id = 1";
	$sql = "UPDATE pharmacy_details SET pharm_name = '$pharm_name', 
			pharm_address = '$pharm_address',
			pharm_no = '$pharm_no',
			pharm_email = '$pharm_email',
			pharm_open = '$pharm_open',
			pharm_close = '$pharm_close',
			cover = '$filename'
			WHERE pharm_id = '$pharm_id'";

mysqli_query($connect, $sql);
$upload = move_uploaded_file($tempname, $folder);
			
	}
	


	if($connect->query($sql) ===  TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location:../pharm_prof.php');	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} 