<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');

$sql="SELECT medicine.med_name from med_pharm
inner join medicine
on medicine.med_id=med_pharm.med_name
where med_pharm_id = '".$_GET['id']."'";
  $result=$connect->query($sql)->fetch_assoc();  ?>    
 
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Medicine Image</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Update Image</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                
                
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  id="submitBrandForm" action="action/uploadImage.php?id=<?php echo $_GET['id'];?>"enctype="multipart/form-data">

                                   
                                    <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Update <?php echo $result['med_name']?> Image</label>
                                                <div class="">
                                                <input class="form-control" type="file" name="image" value="" />
                                                </div>
                                            </div>
                                        </div>



                                        <button type="submit" name="create" id="createCategoriesBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>


