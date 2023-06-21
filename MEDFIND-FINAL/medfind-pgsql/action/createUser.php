
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

    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_pharmacy = $_POST['pharmacy'];


				$sql = "CALL add_users('$user_name', '$user_email', '$user_password', '$user_pharmacy')";

				if(pg_query($dbconn, $sql)) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
					header('location:../super-users.php');	
				} 
				if ($result) {
					$_SESSION['success'] = "Successfully Added";
					header('location: ../super-users.php');
					}else {
					$_SESSION['error'] = "Something went wrong. Try again.";
					header('location: ../super-users.php');
					}


} 
}