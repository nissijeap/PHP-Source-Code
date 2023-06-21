
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

  $med_name =validate($_POST['med_name']);
  $med_pack =validate($_POST['med_pack']);
  $med_dosage =validate($_POST['med_dosage']);
  $med_class = validate($_POST['med_class']);
  $med_desc = validate($_POST['med_desc']);
	
		
  $sql = "INSERT INTO medicine (med_name, med_pack, med_dosage, med_class,med_desc) 
  VALUES ('$med_name', '$med_pack', '$med_dosage', '$med_class',  '$med_desc')";
  mysqli_query($connect, $sql);
/*$upload = move_uploaded_file($tempname, $folder);

  if($upload) {
      $valid['success'] = true;
      $valid['messages'] = "Successfully Added";
      header('location:../medicine.php');	
  } */
  if ($result) {
      $_SESSION['success'] = "Successfully Added";
      header('location: ../medicine.php');
      }else {
      $_SESSION['error'] = "Something went wrong. Try again.";
      header('location: ../medicine.php');
      }


} 
}