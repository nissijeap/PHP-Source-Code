<?php //error_reporting(1); ?>
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php 
include('./constant/connect.php')?>



<?php 

$lowStockSql = "SELECT * FROM get_medicine()";
$lowStockQuery = pg_query($dbconn, $lowStockSql);
$countLowStock = pg_num_rows($lowStockQuery);

$lowStockSql1 = "SELECT * from get_packaging()";
$lowStockQuery1 = pg_query($dbconn, $lowStockSql1);
$countLowStock1 = pg_num_rows($lowStockQuery1);

$lowStockSql2 = "SELECT * from get_classification()";
$lowStockQuery2= pg_query($dbconn, $lowStockSql2);
$countLowStock2 =pg_num_rows($lowStockQuery2);

$lowStockSql3 = "SELECT * FROM get_pharmacy()";
$lowStockQuery3 = pg_query($dbconn, $lowStockSql3);
$countLowStock3 = pg_num_rows($lowStockQuery3);
$finalCount3 = $countLowStock3-1;

$lowStockSql4 = "SELECT * FROM get_users()";
$lowStockQuery4 = pg_query($dbconn, $lowStockSql4);
$countLowStock4 = pg_num_rows($lowStockQuery4);
$finalCount4 = $countLowStock4-1;


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
                       <div class="card" style="background: #2BC155; width: 1220px">
                           <div class="media widget-ten">
                               <div class="media-left meida media-middle">
                                   <span><i class="ti-plus"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <h2 class="color-white">ADD</h2>
                                   <a href="super-add-product.php"><p class="m-b-0">New Medicine</p></a>
                               </div>
                           </div>
                       </div>
                    </div> 
                </div>

                <div class="row">
                    <?php if(isset($_SESSION['userId'])){ ?>
                    <div class="col-md-6 dashboard">
                        <div class="card" style="background:#FFBC11 ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-map-alt"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $finalCount3; ?></h2>
                                    <a href="super-pharmacy.php"><p class="m-b-0">Total Pharmacy</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="col-md-6 dashboard">
                        <div class="card " style="    background-color: #25b4ab ">
                            <div class="media widget-ten">
                              <div class="media-left meida media-middle">
                                    <span><i class="ti-heart-broken"></i></span>
                              </div>
                              <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock; ?></h2>
                                    <a href="super-product.php"><p class="m-b-0">Total Stored Medicine</p></a>
                              </div>
                             </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                

                <div class="row">
                    <?php if(isset($_SESSION['userId'])){ ?>
                    <div class="col-md-6 dashboard">
                        <div class="card" style="background:#A02CFA ">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-package"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock1; ?></h2>
                                    <a href="super-brand.php"><p class="m-b-0">Total Packaging</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="col-md-6 dashboard">
                        <div class="card " style="    background-color: #F94687 ">
                            <div class="media widget-ten">
                              <div class="media-left meida media-middle">
                                    <span><i class="ti-harddrives"></i></span>
                              </div>
                              <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $countLowStock2; ?></h2>
                                    <a href="super-categories.php"><p class="m-b-0">Total Category</p></a>
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
        