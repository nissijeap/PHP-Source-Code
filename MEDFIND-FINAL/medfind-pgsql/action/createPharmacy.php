
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

    $pharm_name = $_POST['pharm_name'];
	$pharm_address = $_POST['pharm_address'];
	$pharm_no = $_POST['pharm_no'];
	$pharm_email = $_POST['pharm_email'];
	$pharm_open = $_POST['pharm_open'];
	$pharm_close = $_POST['pharm_close'];
    $cover = $_POST['cover'];
    $map = $POST['map'];
    $direction = $_POST['direction'];


				$sql = "CALL add_pharmacy('$pharm_name', '$pharm_address', '$pharm_no', '$pharm_email', '$pharm_open', '$pharm_close', '$cover', '$map', '$direction')";

				if(pg_query($dbconn, $sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../super-pharmacy.php');	
				} 
				if ($result) {
					$_SESSION['success'] = "Successfully Added";
					header('location: ../super-pharmacy.php');
					}else {
					$_SESSION['error'] = "Something went wrong. Try again.";
					header('location: ../super-pharmacy.php');
					}


} 
}