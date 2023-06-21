<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>


<?php include('./constant/connect.php');

$sql = ("SELECT * from edit_med('".$_GET['id']."')");
$result = pg_query($dbconn, $sql);
$row = pg_fetch_assoc($result);
  ?> 


  
 <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Medicine</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Medicine</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                
                

                
                
                
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                            <div class="input-states">
                                    <form class="form-horizontal" method="POST"  id="submitProductForm" action="action/editMed.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control">
                                  <center> <div class="form-group col-md-6">
                                                <label class="control-label" style="font-weight: bold; font-size:20px;"><?php echo $row['edm_name']?></label>
                                                  </div></center>
                                                  
                                <div class="row">
                                
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Quantity</label>
                                                  <input type="text" class="form-control" id="med_quan" value="<?php echo $row['edm_quan']?>" name="med_quan" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Price</label>
                                                   <input type="text" class="form-control" id="med_price" value="<?php echo $row['edm_price']?>" name="med_price" autocomplete="off">
                                        </div>


                                        <div class="form-group col-md-6">
                                                <label class="control-label">Expiration Date</label>
                                                   <input type="date" class="form-control" id="med_exp" placeholder="Expiration Date" name="med_exp" value="<?php echo $row['edm_exp']?>" autocomplete="off" required="" pattern="^[0-9]+$"/>
                                        </div>

                                        <div class="col-md-12 mx-auto text-center">
                                             <button type="submit" name="create" id="createProductBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                        </div>
                                       
                                        </fieldset>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>
<script src="custom/js/product.js"></script>
