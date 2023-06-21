<?php 	

include '../constant/connect.php';
include '../test.php';



$med_id = $_GET['id'];


if($_POST) {
    echo"yow";	

	$med_quan =$_POST['med_quan'];
    $med_quan++;
	
    $sql = "UPDATE medicine SET med_quan = '$med_quan'";
    $result = ($connect -> query($sql));
}