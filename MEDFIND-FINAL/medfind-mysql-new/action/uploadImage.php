<?php
 
// If upload button is clicked ...
if (isset($_POST['create'])) {
 
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $filename;
 
    include ('../constant/connect.php');
 
    // Get all the submitted data from the form

    $select = "SELECT med_name from med_pharm where med_pharm_id = '".$_GET['id']."'";
    $result = $connect->query($select);
    $row = mysqli_fetch_array($result);
    $sql = "UPDATE med_pharm
            SET images = '$filename' where med_name = '".$row['med_name']."'";
 
    // Execute query
    mysqli_query($connect, $sql);
    $upload = move_uploaded_file($tempname, $folder);
 
    // Now let's move the uploaded image into the folder: image
    if ($upload) {
        header('Location:../product.php');

    } else {
        $msg = "Failed to upload image";
        echo $msg; exit;
    }
}
?>

