
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

  $pack_name =validate($_POST['pack_name']);
 
	
				$sql = "INSERT INTO packaging (pack_name) 
				VALUES ('$pack_name')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../brand.php');	
				} 
				if ($result) {
					$_SESSION['success'] = "Successfully Added";
					header('location: ../brand.php');
					}else {
					$_SESSION['error'] = "Something went wrong. Try again.";
					header('location: ../brand.php');
					}


} 
}