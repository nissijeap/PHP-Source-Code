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
                                    <form class="row" method="POST"  id="submitProductForm" action="action/createProduct.php" method="POST" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control">
                                   <div class="form-group col-md-6">
                                                <label class="ontrol-label">Image</label>
                                                <input class="form-control" type="file" name="image" value="" />
                                                </div>

    
                                            <div class="form-group col-md-6">
                                                <label class="ontrol-label">Medicine Name</label>
                                                  <input type="text" class="form-control" id="med_name" placeholder="Medicine Name" name="med_name" autocomplete="off"/>
                                                </div>
                                       
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Packaging</label>
                                                  <select type="text" class="form-control" id="med_pack"  name="med_pack" >
                        <option value="">SELECT</option>
                        <?php 
                        $sql = "SELECT*from get_packaging()";
                                $result = pg_query($dbconn, $sql);

                                while($row = pg_fetch_array($result)) {
                                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                } // while
                                
                        ?>
                        </select>
                                    </div>
                                        
                                        
                                    
                                    <div class="form-group col-md-6">
                                                <label class="control-label">Classification</label>
                                                  <select type="text" class="form-control" id="med_class"  name="med_class" >
                        <option value="">SELECT</option>
                        <?php 
                        $sql = "SELECT*from get_classification()";
                                $result = pg_query($dbconn, $sql);

                                while($row = pg_fetch_array($result)) {
                                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                } // while
                                
                        ?>
                        </select>
                                    </div>
                                        
                                        
                           
                            <div class="form-group col-md-6">
                                                <label class="control-label">Dosage</label>
                                                  <input type="text" class="form-control" id="med_dosage" placeholder="Dosage" name="med_dosage" autocomplete="off"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Description</label>
                                                  <input type="text" class="form-control" id="med_desc" placeholder="Description" name="med_desc" autocomplete="off"/>
                                        </div>
                                        
                        
                      

                                        <div class="col-md-1 mx-auto">
                                        <button type="submit" name="create" id="createProductBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>