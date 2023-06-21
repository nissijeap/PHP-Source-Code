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
    <title>Track Order</title>

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
                               <center><a class="btn">Track Your Order</a> <br></br><br></br>
                               <p style="color: white; font-size: 25px; width: 75%; margin-left: 30px; margin-right: 30px">Enter Tracking Number
                               </p>
                    <form method="POST" action="result.php" enctype="multipart/form-data">
                    <input type="search" id="order_id" name="tracking_num" class="form-control form-control-sm" style="padding: 15px; width: 800px;" placeholder="Type the tracking number here" value="<?php echo isset($tracking_number) ? $tracking_number :'' ?>" required autocomplete="off">
                    <br></br>
                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-sm btn-primary btn-sm col-sm-2 btn-block float-right" type="button" name="check "id="check">
                                            <label style="color: white; font-size: 15px">Check <i class="fa fa-search" style="color:white"></i></label>
                                        </button>
                                        </div>
                                        
                                    </div>
    </form>
                               </center>
                            

                               <br></br>
   
    <div class="horizontal_line"></div>
    <div class="line"></div>
    <br></br><br></br>
