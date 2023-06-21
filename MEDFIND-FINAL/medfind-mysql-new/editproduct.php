<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>


<?php include('./constant/connect.php');

$sql = ("SELECT med_pharm.med_pharm_id, med_pharm.images, medicine.med_name, med_pharm.med_quan, med_pharm.med_price, packaging.pack_name, medicine.med_dosage, classification.class_name, med_pharm.med_stat, med_pharm.med_added, med_pharm.med_exp
from med_pharm
inner join medicine
on med_pharm.med_name = medicine.med_id
inner join packaging
on medicine.med_pack = packaging.pack_id
inner join classification 
on medicine.med_class = classification.class_id
where  med_pharm_id='".$_GET['id']."'");
$result = $connect -> query($sql)->fetch_assoc();
  ?> 


  
 <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Medicine Management</h3> </div>
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
                                    <form class="form-horizontal" method="POST"  id="submitProductForm" action="action/editProduct.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control">
                                   <div>
                                                <center><label style="font-weight:bold; font-size:20px;"><?php echo $result['med_name']?></label><center>
                                                  </div>
                                <div class="row">
                                
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Quantity</label>
                                                  <input type="text" class="form-control" id="med_quan" value="<?php echo $result['med_quan']?>" name="med_quan" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Price</label>
                                                   <input type="text" class="form-control" id="med_price" value="<?php echo $result['med_price']?>" name="med_price" autocomplete="off">
                                        </div>

                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Expiration Date</label>
                                                   <input type="date" class="form-control" id="med_exp" placeholder="Expiration Date" name="med_exp" value="<?php echo $result['med_exp']?>" autocomplete="off" required="" pattern="^[0-9]+$"/>
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
