<?php //error_reporting(1); ?>
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php 
include('./constant/connect.php')?>



<?php 

$lowStockSql = "SELECT * FROM get_medpharm($pharm)";
$lowStockQuery = pg_query($dbconn, $lowStockSql);
$countLowStock = pg_num_rows($lowStockQuery);

$lowStockSql1 = "SELECT * from get_available($pharm)";
$lowStockQuery1 = pg_query($dbconn, $lowStockSql1);
$countLowStock1 = pg_num_rows($lowStockQuery1);

$lowStockSql2 = "SELECT * from get_stock($pharm)";
$lowStockQuery2= pg_query($dbconn, $lowStockSql2);
$countLowStock2 =pg_num_rows($lowStockQuery2);

$date=date('Y-m-d');
$lowStockSql3 = "SELECT * FROM get_expired($pharm)";
$lowStockQuery3 = pg_query($dbconn, $lowStockSql3);
$countLowStock3 = pg_num_rows($lowStockQuery3);


?>

<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="page-wrapper">
            <div class="container-fluid ">
                
            <div class="row">
                    <div class="col-md-6 dashboard">
                       <div class="card" style="background: #A02CFA; width: 1220px">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="ti-plus"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h2 class="color-white">ADD</h2>
                                   <a href="add-product.php"><p class="m-b-0">New Medicine</p></a>
                               </div>
                           </div>
                       </div>
                    </div> 
                </div>
                
                 <div class="row">
                    <div class="col-md-6 dashboard">
                       <div class="card" style="background: #25b4ab ">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="ti-heart-broken"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                   <h2 class="color-white"><?php echo $countLowStock; ?></h2>
                                   <a href="product.php"><p class="m-b-0">Total Stored Medicines</p></a>
                               </div>
                           </div>
                       </div>
                    </div> 

                    <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="col-md-6 dashboard">
                        <div class="card" style="    background-color: #FFBC11 ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-alert"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock3; ?></h2>
                                    <a href="expired.php"><p class="m-b-0">Total Expired Medicines</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>


                    <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="col-md-6 dashboard">
                        <div class="card " style="    background-color: #2BC155 ">
                            <div class="media widget-ten">
                              <div class="media-left meida media-middle">
                                    <span><i class="ti-check-box"></i></span>
                              </div>
                              <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock1; ?></h2>
                                    <a href="available.php"><p class="m-b-0">Total Available Medicines</p></a>
                              </div>
                             </div>
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="col-md-6 dashboard">
                        <div class="card" style="    background-color: #FF3333 ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-na"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock2; ?></h2>
                                    <a href="stock.php"><p class="m-b-0">Total Stockout Medicine</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                 </div>
                   
            




                
            </div>
        </div>
    </div>?>

            
            <?php include ('./constant/layout/footer.php');?>
        