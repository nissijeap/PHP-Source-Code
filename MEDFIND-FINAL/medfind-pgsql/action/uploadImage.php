<?php
 
// If upload button is clicked ...
if (isset($_POST['create'])) {
 
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $filename;
 
    include ('../constant/connect.php');
    $med_id = $_GET['id'];
 
    // Get all the submitted data from the form
    $sql = "CALL upload_image($med_id, '$filename')";
 
    // Execute query
    pg_query($dbconn, $sql);
    $upload = move_uploaded_file($tempname, $folder);
 
    // Now let's move the uploaded image into the folder: image
    if ($upload) {
        header('Location:../super-product.php');

    } else {
        $msg = "Failed to upload image";
        echo $msg; exit;
    }
}
?>

