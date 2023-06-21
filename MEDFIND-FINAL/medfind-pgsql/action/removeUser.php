
<?php 	

include '../constant/connect.php';
include '../test.php';


$valid['success'] = array('success' => false, 'messages' => array());

$user_id = $_GET['id'];
if($user_id) { 

 $sql = "CALL remove_user($user_id)";

 if(pg_query($dbconn, $sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
	header('location:../super-users.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
	header('location:../super-users.php');	
 }
 

 echo json_encode($valid);
 
} // /if $_POST