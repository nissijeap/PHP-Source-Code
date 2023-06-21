<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');

$sql="SELECT * from pharmacy_details where  pharm_id=$pharm";
  $result=$connect->query($sql)->fetch_assoc();  ?>    
 
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div>

</div>
                
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  id="submitProfileForm" action="action/editProfile.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">


                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Header</label>
                                                <?php if ($result['cover']) { ?>
                                                <img src="./image/<?php echo $result['cover']; ?>" style="width: 820px; height: 312px; object-fit:cover; padding-bottom: 20px;">
                                                
                                                <div class="col-sm-9">
                                                <input class="form-control" type="file" name="updatefile" value="" />
                                                </div>
                                                <?php } else {?>
                                                    <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="updatefile" value="" />
                                                    </div>

                                                <?php } ?>
                                            </div>
                                        </div>

                                   
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Pharmacy Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_name" placeholder="Pharmacy Name" name="pharm_name"  value="<?php echo $result['pharm_name']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_address" placeholder="Address" name="pharm_address"  value="<?php echo $result['pharm_address']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_no" placeholder="Phone Number" name="pharm_no"  value="<?php echo $result['pharm_no']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Pharmacy Email</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_email" placeholder="Pharmacy Email" name="pharm_email"  value="<?php echo $result['pharm_email']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Store opens</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_open" placeholder="Store opens" name="pharm_open"  value="<?php echo $result['pharm_open']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Store closes</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="pharm_close" placeholder="Store closes" name="pharm_close"  value="<?php echo $result['pharm_close']?>"/>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="update" id="submitProfileForm" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>


