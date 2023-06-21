<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');


$sql = ("SELECT medicine.med_id, medicine.med_name, packaging.pack_name, medicine.med_dosage, medicine.med_desc, classification.class_name
from medicine
 inner join packaging
on medicine.med_pack = packaging.pack_id
inner join classification 
on medicine.med_class = classification.class_id
where  med_id='".$_GET['id']."'");
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
                                    <form class="form-horizontal" method="POST"  id="submitProductForm" action="action/editMedicine.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control">
                                   
                                <div class="row">
                                <div class="form-group col-md-6">
                                                <label class="control-label">Medicine Name</label>
                                                  <input type="text" class="form-control" id="med_name" value="<?php echo $result['med_name']?>" name="med_name" autocomplete="off">
                                        </div>
                                    
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Dosage</label>
                                                  <input type="text" class="form-control" id="med_dosage" value="<?php echo $result['med_dosage']?>" name="med_dosage" autocomplete="off">
                                        </div>
                               
                                            
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Packaging</label>
                                                     <select  id="med_pack" name="med_pack" class="form-control">

                                                     <option value=""><?php echo $result['pack_name']?></option>
                                                                <?php 
                                                                $sql = "SELECT*from packaging";
                                                                        $result1 = $connect->query($sql);

                                                                        while($row = $result1->fetch_array()) {
                                                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                                        } // while
                                                                        
                                                                ?>
                                        </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Classification</label>
                                                     <select  id="med_class" name="med_class" class="form-control">

                                                        <option value=""><?php echo $result['class_name']?></option>
                                                                        <?php 
                                                                        $sql = "SELECT*from classification";
                                                                                $result1 = $connect->query($sql);

                                                                                while($row = $result1->fetch_array()) {
                                                                                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                                                } // while
                                                                                
                                                                        ?>
                                                </select>
                                        </div> 

                                        <!--<div class="form-group col-md-6">
                                                <label class="control-label">Description</label>
                                                  <input type="text" class="form-control" id="med_desc" value="<?php echo $result['med_desc']?>" name="med_desc" autocomplete="off">
                                        </div>-->

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
