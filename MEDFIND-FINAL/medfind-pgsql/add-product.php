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
                                    <form class="row" method="POST"  id="submitProductForm" action="action/addProduct.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Medicine Name</label>
                                                  <select type="text" class="form-control" id="med_name"  name="med_name" >
                                        <option value="">SELECT</option>
                                        <?php 
                                        $sql = "SELECT*from get_medicine()";
                                                $result = pg_query($dbconn, $sql);

                                                while($row = pg_fetch_array($result)) {
                                                    echo "<option value='".$row[0]."'>"."$row[1]"." "."$row[3]"." "."$row[2]"." "."$row[4]"."</option>";
                                                } // while
                                                
                                        ?>
                                        </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Quantity</label>
                                                  <input type="text" class="form-control" id="med_quan" placeholder="Quantity" name="med_quan" autocomplete="off"  required="" pattern="^[0-9]+$"/>
                                        <br></br> <br></br>
                                                </div>

                                         
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Price</label>
                                                  <input type="text" class="form-control" id="med_price" placeholder="Price" name="med_price" autocomplete="off"/>
                                        </div>

                                       
                                        
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Expiry Date</label>
                                                   <input type="date" class="form-control" id="med_exp" placeholder="Expiry Date" name="med_exp" autocomplete="off" required="" pattern="^[0-9]+$"/>
                                                   <br></br>
                                                </div>
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