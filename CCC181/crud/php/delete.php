<?php  session_start(); ?>

<?php

if(isset($_GET['med_id'])){
   include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$med_id = validate($_GET['med_id']);

	$sql = "DELETE FROM medicine
	        WHERE med_id=$med_id";
   $result = mysqli_query($db, $sql);

   if ($result) {
      $_SESSION['success'] = "Successfully Deleted";
      header('location: ../read.php');
      }else {
      $_SESSION['error'] = "Something went wrong. Try again.";
      header('location: ../read.php');
      }

}else {
	header("Location: ../read.php");
}