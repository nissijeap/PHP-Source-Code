<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location: welcome.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<style type="text/css">
        body {
            background-color: white;
            background-image: url('../pictures/dashboard.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
</style>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="welcome.css">

</head>
<body>

<div class="container">

   <div class="content">
      <h3>Hello, <span>ADMIN</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?><span>!</span></h1>
      <p>This is an Admin Page</p>
      <!--<a href="login.php" class="btn">login</a>
      <a href="register.php" class="btn">register</a>-->
      <a href="../crud/Pharm/Profile.php" class="btn">Edit Pharmacy Details</a>
      <a href="../crud/read.php" class="btn">Medicine Inventory</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>