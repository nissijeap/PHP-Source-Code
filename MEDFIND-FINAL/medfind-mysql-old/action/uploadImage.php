<?php
 
// If upload button is clicked ...
if (isset($_POST['create'])) {
 
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $filename;
 
    include ('../constant/connect.php');
 
    // Get all the submitted data from the form
    $sql = "UPDATE medicine
            SET images = '$filename' where med_id = '".$_GET['id']."'";
 
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

