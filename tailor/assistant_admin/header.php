<?php
$_POST = array_map('strip_tags', $_POST);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/PINK_BLUSH.png" type="image/png">

  <title>Pink Blush Fashion and Merchandise</title>

  <link href="css/style.default.css" rel="stylesheet">


 <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="css/jquery.tagsinput.css" />
  <link rel="stylesheet" href="css/colorpicker.css" />
  <link rel="stylesheet" href="css/dropzone.css" />
  <script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>
<!------------------------Chat JS Files ------------------------------------------------------>
<script type="text/javascript" src="js/Chart.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>

    

 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

 <script>
$(function() {
$( "#datepicker1" ).datepicker();
});
</script>

 <script>
$(function() {
$( "#datepicker2" ).datepicker();
});
</script>
<style>
.page-header {
    border-bottom: 0px solid #FFF;
	color: #1D2939;
	
}
h1 {
  text-transform: uppercase;
}
</style>

 
</head>

<body>



<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php   
		$pdo->exec("set names utf8");
		$dd = $pdo->query("SELECT currency, sitename FROM general_setting WHERE id='1'");
		$dd = $dd->fetch(PDO::FETCH_ASSOC);
		$currency = $dd['currency'];
 ?>
<section>

  <div class="leftpanel">

    <div class="logopanel">
        <h1>PINK BLUSH FASHION AND MERCHANDISE</h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="signout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
	  
	  
	   
	  
        <li><a href="home.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
		
        <li><a href="customerview.php"><i class="fa fa-user"></i><span>Customers</span></a></li>
      
        <li><a href="orderlist.php"><i class="fa fa-shopping-cart"></i><span>Orders</span></a></li>
        

        <li><a href="staffview.php"><i class="fa fa-users"></i>Staffs and Designations</a></li>
        </li>
          <li class="nav-parent"><a href="#"><i class="fa fa-credit-card"></i> <span>Expense Management</span></a>
          <ul class="children">
            <li><a href="expcatview.php"><i class="fa fa-caret-right"></i>Expense Category</a></li>
            <li><a href="expview.php"><i class="fa fa-caret-right"></i>Expenses</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href="#"><i class="fa fa-money"></i> <span>Income Management</span></a>
          <ul class="children">
            <li><a href="inccatview.php"><i class="fa fa-caret-right"></i>Income Category</a></li>
            <li><a href="incview.php"><i class="fa fa-caret-right"></i>Incomes</a></li>
          </ul>
        </li>
        
        <li class="nav-parent"><a href="#"><i class="fa fa-child"></i> <span>Measurement Settings</span></a>
          <ul class="children">
            <li><a href="typeview.php"><i class="fa fa-caret-right"></i>Cloth Type</a></li>
            <li><a href="partview.php"><i class="fa fa-caret-right"></i>Mesurement Parts</a></li>

          </ul>
      </ul>

      

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>

        
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

<?php
echo "<img src='images/pinkuser-prof.png' alt='' />";
echo " $user";
?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
              <li><a href="signout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->


    <div class="contentpanel">