<?php
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
 
    include ('./constant/connect.php');
    include ('test.php');
 
    // Get all the submitted data from the form
    $sql = "CALL upload($pharm, '$filename')";
 
    // Execute query
    pg_query($dbconn, $sql);
    $upload = move_uploaded_file($tempname, $folder);
 
    // Now let's move the uploaded image into the folder: image
    if ($upload) {
        header('Location:pharm_prof.php');

    } else {
        $msg = "Failed to upload image";
        echo $msg; exit;
    }
}
?>

