<?php
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
 
    include ('./constant/connect.php');
    include ('test.php');
 
    // Get all the submitted data from the form
    $sql = "UPDATE pharmacy_details 
            SET cover = '$filename' where pharm_id = $pharm";
 
    // Execute query
    mysqli_query($connect, $sql);
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

