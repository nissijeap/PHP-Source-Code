<?php   
    $validate = new Validate();
?> 
<?php 
              $sql ="SELECT * FROM `tblstockout` s, `tblproduct` p WHERE s.`ProductID`=p.`ProductID` AND `StoreID`='".$_SESSION['ADMIN_USERID']."' AND `Status`='Pending'";
              $mydb->setQuery($sql);
             @$res_pends = $mydb->executeQuery($res_pends);
              $orderPendings = $mydb->num_rows($res_pends);

              if ($orderPendings > 0) {
                # code...
                $pending_orders = $orderPendings;
              }else{
                $pending_orders = $orderPendings;
              }


            ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
          <?php
               // $query = "SELECT * FROM `tbltitle` WHERE TItleID=1";
               //  $res = $mydb->setQuery($query);
               //  $viewTitle =$mydb->loadSingleResult();
               //  echo $viewTitle->Title;
          ?>
        </title>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/dataTables.bootstrap.css">  -->
        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css">  -->

        <!-- Ionicons -->
        <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css">  

        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/select2/select2.css">
        <!-- Daterange picker -->
        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/daterangepicker/daterangepicker-bs3.css"> -->
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.css" rel="stylesheet">
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.theme.default.css" rel="stylesheet">

 
    </head>

 <body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo web_root;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Store</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Store Finder</b></span>
      <!-- A web based medical store locator with android application -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
 
          <?php
           $number_notif = 0;
              $user = New User();
              $singleuser = $user->single_user($_SESSION['ADMIN_USERID']);

              $sql ="SELECT *, Sum(Remaining) as NUM FROM `tblproduct` p,`tblstockin` i, `tblcategory` c,`tblstore` s WHERE p.`ProductID`=i.`ProductID` AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID`  AND p.`StoreID`=".$_SESSION['ADMIN_USERID']."  GROUP BY p.ProductID";
                  // }
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();

                  foreach ($cur as $result) { 

                    if ($result->NUM < 10) {
                         $number_notif +=1;
                    } 
                  }

            

          ?>
           <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $number_notif; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?php echo $number_notif; ?> Product(s) that is Running Out of Stock</li>
              <li> 
                <ul class="menu">

                  <?php
                   $sql ="SELECT *, Sum(Remaining) as NUM FROM `tblproduct` p,`tblstockin` i, `tblcategory` c,`tblstore` s WHERE p.`ProductID`=i.`ProductID` AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID`  AND p.`StoreID`=".$_SESSION['ADMIN_USERID']."  GROUP BY p.ProductID";
                  // }
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();

                  foreach ($cur as $result) { 

                    if ($result->NUM < 10) {
                      echo '<li>
                        <a href="#">
                          <i class="fa fa-barcode text-aqua"></i> '.$result->ProductName.'| ' .$result->NUM  . ' Remaining
                        </a>
                      </li>';
                    } 
                  }
                    ?>
                  
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">View all</a></li> -->
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="padding-right: 15px;"  >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo web_root.'admin/user/'. $singleuser->PicLoc;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $singleuser->FullName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> 
                <img data-target="#menuModal"  data-toggle="modal"  src="<?php echo web_root.'admin/user/'. $singleuser->PicLoc;?>" class="img-circle" alt="User Image" />  
              </li> 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo web_root.'admin/user/index.php?view=view&id='.$_SESSION['ADMIN_USERID'] ;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo web_root ;?>admin/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>



 <div class="modal fade" id="menuModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="photo" name="photo" type="file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content-->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->  



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"> 
        <li  class="<?php echo (currentpage() == 'index.php') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>admin/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>  
          </a> 
        </li> 
        <?php if($singleuser->Role=="Administrator"){ ?>
        <li class="<?php echo (currentpage() == 'store') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>admin/store/">
            <i class="fa fa-building"></i> <span>Store</span> 
          </a>
        </li>
      <?php } ?>
        <li class="<?php echo (currentpage() == 'products') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>admin/products/">
            <i class="fa fa-suitcase"></i> <span>Products</span> 
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'stockin') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/stockin/">
            <i class="fa fa-th"></i> <span>Stock-in</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'orders') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/orders/">
            <i class="fa fa-th-list"></i> <span>Orders </span>  <label class="label label-danger pull-right"><?php echo $pending_orders;?></label>
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'inventory') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>admin/inventory/">
            <i class="fa fa-list-alt"></i> <span>Inventory</span> </a>
        </li>
        <li class="<?php echo (currentpage() == 'category') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/category/">
            <i class="fa fa-list"></i> <span>Category</span>  
          </a>
        </li> 
         <li class="treeview <?php echo (currentpage() == 'inventoryreport' || currentpage() == 'salesreport') ? "active" : false;?>">
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span>Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (currentpage() == 'inventoryreport') ? "active" : false;?>"><a href="<?php echo web_root ;?>admin/inventoryreport/"><i class="fa fa-circle-o"></i> Inventory</a></li>
            <li class="<?php echo (currentpage() == 'salesreport') ? "active" : false;?>"><a href="<?php echo web_root ;?>admin/salesreport/"><i class="fa fa-circle-o"></i> Sales</a></li> 
          </ul>
        </li> 
       <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo web_root ;?>pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> --> 
        <?php if ($_SESSION['ADMIN_ROLE']=='Administrator') { ?> 
    <!--         <li class="<?php echo (currentpage() == 'autonumber') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>admin/autonumber/">
            <i class="fa fa-suitcase"></i> <span>Autonumber</span> 
          </a>
        </li>  -->
          <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>admin/user/">
            <i class="fa fa-user"></i> <span>Manage Users</span> </a>
        </li> 
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        
        <?php echo isset($title) ? $title : ''; ?>
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <?php

          if ($title!='Home') {
            # code... 
            $active_title = '';
            if (isset($_GET['view'])) {
              # code...
              $active_title = '<li class='.$active_title.'><a href="index.php">'.$title.'</a></li>';
            }else{
              $active_title = '<li class='.$active_title.'>'.$title.'</li>';
            }
            echo '<li><a href='.web_root.'admin/><i class="fa fa-dashboard"></i> Home</a></li>';
            echo  $active_title;
            echo  isset($_GET['view']) ? '<li class="active">'.$_GET['view'].'</li>' : '';
          } 


        ?>
      </ol>
    </section>
         <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">

              <?php 
               check_message();
               require_once $content; 
               ?> 
             </div>
             </div>
           </div>
         </div>
         </section>
 </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Janno Palacios</a>.</strong> All rights
    reserved.
  </footer>

  

    </body>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>
      <script type="text/javascript" src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js" ></script>
      <script src="<?php echo web_root;?>dist/js/app.min.js"></script> 

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" ></script> 
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js" ></script> 
      <script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

      <script src="<?php echo web_root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/select2/select2.full.min.js"></script> 
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="<?php echo web_root; ?>dist/js/jquery.treetable.js" type="text/javascript"></script>



   <!--      <script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo web_root; ?>js/jquery-1.10.2.js"></script>       
        <script type="text/javascript" src="<?php echo web_root; ?>js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="<?php echo web_root; ?>js/main.js" ></script> 
        <script type="text/javascript" src="<?php echo web_root; ?>js/janobe.js" ></script> 
        <script src="<?php echo web_root; ?>admin/js/ekko-lightbox.js"></script>
        <script src="<?php echo web_root; ?>admin/js/lightboxfunction.js"></script> 
  -->
<!-- jQuery 2.1.4 --> 

<script> 
  $(".mytbl").treetable({ expandable: true });

// $("#expandAllTasks").on("click", function(){
//   // alert("yes")
//   // e.preventDefault();
//   $('.mytbl').treetable('expandAll');
// });
    

// $("#expandable").on("click", function(){ 
//   // e.preventDefault(); 
//  $(".mytbl").treetable('collapseAll');
// });

var $rows = $('#tree_table tbody tr').treetable({expandable: true});
$('.search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    $(".mytbl").treetable({ expandable: true });
});


  $("#findProduct").on("change",function(){
    var productID = $(this).val();
    // alert(productID)
    $.ajax({
      type:"POST",  
      url: "loaddata.php",    
      dataType: "text",  //expect html to be returned  
      data:{ProductID:productID},               
      success: function(data){    
       $('#loaddata').hide();   
       $('#loaddata').fadeIn(); 
       $('#loaddata').html(data);   
      } 
    })
  });

  $(function(){
    $(".btn-danger").click(function(){
       if (confirm("Are you sure you want to delete this?")) {
        return true;
       }else{
        return false;
       }
    })
  });

    $(function(){
    $(".btn-trans").click(function(){
       if (confirm("Are you sure you want to cancel this?")) {
        return true;
       }else{
        return false;
       }
    })
  });
   $(function(){
     var productID = $("#findProduct").val();
    // alert(productID)
      $.ajax({
        type:"POST",  
        url: "loaddata.php",    
        dataType: "text",  //expect html to be returned  
        data:{ProductID:productID},               
        success: function(data){    
         $('#loaddata').hide();   
         $('#loaddata').fadeIn(); 
         $('#loaddata').html(data);   
        } 
      });
  });

  $(function(){
     $('.select2').select2();
  });
  $(function () {
    $("#dash-table").DataTable();
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
       });
  });

$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});


$('#datemask2').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});
$('#HIREDDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});


</script>
  <script type="text/javascript">
      var ctx = document.getElementById("chartjs_pie").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($qty); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>
 