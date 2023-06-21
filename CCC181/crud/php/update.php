<?php session_start(); ?>
<?php

if (isset($_GET['med_id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$med_id = validate($_GET['med_id']);

	$sql = "SELECT * FROM medicine WHERE med_id=$med_id";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$med_name = validate($_POST['med_name']);
	$med_brand = validate($_POST['med_brand']);
        $med_type = validate($_POST['med_type']);
	$med_count = validate($_POST['med_count']);
        $med_price = validate($_POST['med_price']);
	$med_id = validate($_POST['med_id']);

	if (empty($med_name)) {
		$_SESSION['error'] = "Medicine Name is required";
        header('location: ../index.php');
	}else if (empty($med_brand)) {
		$_SESSION['error'] = "Brand is required";
        header('location: ../index.php');
	}else if (empty($med_type)) {
		$_SESSION['error'] = "Typeis required";
        header('location: ../index.php');
	}else if (empty($med_count)) {
		$_SESSION['error'] = "Quantity is required";
        header('location: ../index.php');
	}else if (empty($med_price)) {
		$_SESSION['error'] = "Price is required";
        header('location: ../index.php');
        } else {

       $sql = "UPDATE medicine
               SET med_name='$med_name', med_brand='$med_brand', med_type='$med_type', med_count='$med_count', med_price='$med_price'
               WHERE med_id=$med_id ";
       $result = mysqli_query($db, $sql);

       if ($result) {
        $_SESSION['success'] = "Successfully Updated";
        header('location: ../read.php');
        }else {
        $_SESSION['error'] = "Something went wrong. Try again.";
        header('location: ../update.php');
        }
	}
}else {
	header("Location: ../read.php");
}