<?php 	

include '../constant/connect.php';
include '../test.php';


if(isset($_POST['update'])){
$med_id = $_GET['id'];
if($_POST) {
	
$med_quan = $_POST['cur_quan'];
$med_stat = "";
if($med_quan < 1){
	$med_stat = "Not Available";
} else {
	$med_stat = "Available";
}

echo $med_quan;
 $sql = "CALL adjust_quan($med_id, '$med_stat', $med_quan)";

 if(pg_query($dbconn, $sql)) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";
	header('location:../product.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while updating";
 }


 echo json_encode($valid);
 
}
}
?>
 // /if $_POST