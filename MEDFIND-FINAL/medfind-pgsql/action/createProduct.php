
<?php 	

if (isset($_POST['create'])) {
	include "../constant/connect.php";
	include '../test.php';
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}


if($_POST) {	

  $med_name =validate($_POST['med_name']);
  $med_pack =validate($_POST['med_pack']);
  $med_dosage =validate($_POST['med_dosage']);
  $med_class = validate($_POST['med_class']);
  $med_desc = validate($_POST['med_desc']);
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "../image/" . $filename;


				$sql = "CALL add_medicine('$med_name', '$med_pack', '$med_dosage', '$med_class', '$filename', '$med_desc')";
				pg_query($dbconn, $sql);
				$upload = move_uploaded_file($tempname, $folder);

				if($upload) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../super-product.php');	
				} 
				if ($result) {
					$_SESSION['success'] = "Successfully Added";
					header('location: ../super-product.php');
					}else {
					$_SESSION['error'] = "Something went wrong. Try again.";
					header('location: ../super-product.php');
					}


} 
}