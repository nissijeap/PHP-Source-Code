<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');?>

 
<div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Medicine</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Medicine</li>
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
                                    <form class="row" method="POST"  id="submitPharmacyForm" action="action/createPharmacy.php" method="POST" enctype="multipart/form-data">

                                                <!--<input type="hidden" name="currnt_date" class="form-control">
                                                <div class="form-group col-md-6">
                                                <label class="ontrol-label">Cover Image</label>
                                                <input class="form-control" type="file" name="cover" value="" />
                                                </div>-->

                                            <div class="form-group col-md-6">
                                                <label class="ontrol-label">Pharmacy Name</label>
                                                  <input type="text" class="form-control" id="pharm_name" placeholder="Pharmacy Name" name="pharm_name" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Address</label>
                                                  <input type="text" class="form-control" id="pharm_address" placeholder="Address" name="pharm_address" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Contact Number</label>
                                                  <input type="text" class="form-control" id="pharm_no" placeholder="Contact Number" name="pharm_no" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                  <input type="text" class="form-control" id="pharm_email" placeholder="Email" name="pharm_email" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Open Hour</label>
                                                  <input type="text" class="form-control" id="pharm_open" placeholder="Open Hour" name="pharm_open" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Close Hour</label>
                                                  <input type="text" class="form-control" id="pharm_close" placeholder="Close Hour" name="pharm_close" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Map</label>
                                                  <input type="text" class="form-control" id="map" placeholder="Map" name="map" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Direction</label>
                                                  <input type="text" class="form-control" id="direction" placeholder="Direction" name="direction" autocomplete="off"/>
                                            </div>

                                    
                                            </div>
                                    
                      

                                        <div class="col-md-1 mx-auto">
                                        <button type="submit" name="create" id="createPharmacyBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>