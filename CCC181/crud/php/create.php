<?php session_start(); ?>

<?php

if (isset($_POST['create'])) {
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

	$medicine = 'med_name='.$med_name. '&med_brand='.$med_brand. '&med_type='.$med_type. '&med_count='.$med_count. '&med_price='.$med_price;

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

       $sql = "INSERT INTO medicine(med_name, med_brand, med_type, med_count, med_price ) 
               VALUES('$med_name', '$med_brand', '$med_type', '$med_count', '$med_price')";
       $result = mysqli_query($db, $sql);

	   if ($result) {
        $_SESSION['success'] = "Successfully Added";
        header('location: ../read.php');
        }else {
        $_SESSION['error'] = "Something went wrong. Try again.";
        header('location: ../index.php');
        }
	}

}