<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>


<?php include('./constant/connect.php');

$sql = ("SELECT * from edit_medicine('".$_GET['id']."')");
$result = pg_query($dbconn, $sql);
$row = pg_fetch_assoc($result);
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

                                    <td><a href='med_upload.php?id=<?php echo $row['edm_id']?>'><img src="./image/<?php echo $row['edm_images']; ?>" style="margin-left: 280px; width: 400px; height: 400px; object-fit:cover; padding-top: 30px; padding-bottom: 70px;"></a></td>
                                    

                                   <input type="hidden" name="currnt_date" class="form-control">
                                <div class="row">
                                <div class="form-group col-md-6">
                                                <label class="control-label">Medicine Name</label>
                                                  <input type="text" class="form-control" id="med_name" value="<?php echo $row['edm_name']?>" name="med_name" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Dosage</label>
                                                   <input type="text" class="form-control" id="med_dosage" placeholder="Dosage" name="med_dosage" value="<?php echo $row['edm_dosage']?>" autocomplete="off" />
                                        <br></br>
                                                </div>


                                        <div class="form-group col-md-6">
                                                <label class="control-label">Packaging</label>
                                                     <select  id="med_pack" name="med_pack" class="form-control">

                                                     <option value=""><?php echo $row['edm_pack']?></option>
                                                    <?php 
                                                    $sql = "SELECT*from get_packaging()";
                                                            $result1 = pg_query($dbconn, $sql);

                                                            while($row1 = pg_fetch_array($result1)) {
                                                                echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
                                                            } // while
                                                            
                                                    ?>
                                                    </select>
                                        </div>
                                    
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Classification</label>
                                                     <select  id="med_class" name="med_class" class="form-control">

                                                     <option value=""><?php echo $row['edm_class']?></option>
                                                        <?php 
                                                        $sql = "SELECT*from get_classification()";
                                                                $result2 = pg_query($dbconn, $sql);

                                                                while($row2 = pg_fetch_array($result2)) {
                                                                    echo "<option value='".$row2[0]."'>".$row2[1]."</option>";
                                                                } // while
                                                                
                                                        ?>
                                                        </select>
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
