<?php 	

include '../constant/connect.php';
include '../test.php';

//$valid['success'] = array('success' => false, 'messages' => array());
$user_id = $_GET['id'];
//echo $brandId;exit;
if($_POST) {	
//echo "123";exit;
$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$user_pharmacy = $_POST['pharmacy'];


            $sql = "CALL update_users('$user_id', '$user_name', '$user_email', '$user_password', '$user_pharmacy')";

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
	 

	echo json_encode($valid);
 
} // /if $_POST