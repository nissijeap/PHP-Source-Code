<?php
require_once('function.php');
dbconnect();
session_start();

if (!is_user()) {
	redirect('index-superuser.php');
}

?>


<?php

$user = $_SESSION['username'];
$usid = $pdo->query("SELECT id FROM users WHERE username='".$user."'");
$usid = $usid->fetch(PDO::FETCH_ASSOC);
$uid = $usid['id'];
 
$customerr = $pdo->query("SELECT COUNT(*) as sum FROM customer"); 
$orderr = $pdo->query("SELECT COUNT(*) as sum FROM `orders`");
$stafff = $pdo->query("SELECT COUNT(*) as sum FROM staff");
$partt = $pdo->query("SELECT COUNT(*) as sum FROM part"); 

$customer = $customerr->fetch(PDO::FETCH_ASSOC); 
$order = $orderr->fetch(PDO::FETCH_ASSOC);
$staff = $stafff->fetch(PDO::FETCH_ASSOC);
$part = $partt->fetch(PDO::FETCH_ASSOC);

include ('header.php');
?>


    

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $customer['sum'] ?></div>
                                    <div>Total Customers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="customerview.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $order['sum'] ?></div>
                                    <div>Total Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="orderlist.php">
                            <div class="panel-footer">
                            	<span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $staff['sum'] ?></div>
                                    <div>Total Staffs!</div>
                                </div>
                            </div>
                        </div>
                        <a href="staffview.php">
                            <div class="panel-footer">
                            	<span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $part['sum'] ?></div>
                                    <div>Total Measurement Parts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="partview.php">
                            <div class="panel-footer">
                            	<span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
        
        <!-- /#page-wrapper -->
<?php
 include ('footer.php');
 ?>