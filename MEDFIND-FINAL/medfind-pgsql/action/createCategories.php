
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

  $class_name =validate($_POST['class_name']);
 


	
				$sql = "CALL add_classification('$class_name')";

				if(pg_query($dbconn, $sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../super-categories.php');	
				} 
				if ($result) {
					$_SESSION['success'] = "Successfully Added";
					header('location: ../super-categories.php');
					}else {
					$_SESSION['error'] = "Something went wrong. Try again.";
					header('location: ../super-categories.php');
					}


} 
}