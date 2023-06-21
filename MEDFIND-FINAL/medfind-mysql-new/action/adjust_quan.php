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
 $sql = "UPDATE med_pharm
		SET med_quan = '$med_quan', med_stat = '$med_stat'
 		WHERE med_pharm_id = '$med_id'";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";
	header('location:../product.php');		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while updating";
 }
 
 $connect->close();

 echo json_encode($valid);
 
}
}
?>
 // /if $_POST