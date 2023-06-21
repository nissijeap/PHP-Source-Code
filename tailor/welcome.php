<?php
require_once('function.php');
dbconnect();
session_start();
?>
   
   <!DOCTYPE html>
<html lang="en">

<head>

<style>
        .horizontal_line {
            width: auto;
            height: 5px;
            border-top: 5px dotted white;
            line-height: 80%;
        }
  
        .line {
            border-bottom: 5px solid white;
            margin-top: 5px;
            width: auto;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a style="color: #b90e75">Pink Blush Fashion and Merchandise</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i> 
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="welcome.php">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<style type="text/css">
        body {
            background-color: white;
            background-image: url('./assets/pink.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
</style>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pink Blush Fashion and Merchandise</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="welcome.css">


<body>
   
   
<div class="container">

<div class="content" style="margin-top: 60px">
                        <strong style="font-size: 40px; color: white;">Garments Maker with Finest Quality for Men and Women</strong><br></br><br></br>
                            <center><a class="btn">About Us</a> <br></br>
                            <p style="color: white; font-size: 25px; width: 75%; margin-left: 30px; margin-right: 30px">A tailoring shop located in Badelles Street, Barangay Poblacion, Iligan City.
                            It is owned and managed by Mrs. Daylinda Navaja, the founder of the said firm.
                            The business is centered on tailoring or sewing garments, developing recent designs
                            as requested by clients, and inventing fashionable styles for people.
                            </p><br></br>

                           <a class="btn">Staff Overview</a> <br></br>
                            <p style="color: white; font-size: 25px; width: 75%; margin-left: 30px; margin-right: 30px">Our staffs are responsible for sewing, altering, repairing, or modifying garments for customers based on their specifications, needs, and preferences. Currently, the shop is composed of more or less twenty workers including the owner and staffs,
                            having one single admin who does all the data management. 
                          </p>
                           <p style="color: white; font-size: 25px; width: 75%; margin-left: 30px; margin-right: 30px"
                           </center>
                            <br></br>
   
    <div class="horizontal_line"></div>
    <div class="line"></div>
    <br></br><br></br>
   

                            <div class="content">
<b style="color: white; font-size: 30px;">Sign In Now</b><br></br>
      <a href="superadmin/index.php" class="btn">Super User</a>
      <a href="assistant_admin/index.php" class="btn">Assistant Admin</a>
      <a href="staff/index.php" class="btn">Staff</a>
<br></br>
<br></br>
<b style="color: white; font-size: 30px">Track Your Order?</b><br></br>
      <a href="track.php" class="btn">Track It!</a><br></br>
      <!--<href="logout.php" class="btn">logout</a>-->
   </div>

</div>

</body>
</html>

