<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>


<?php include('./constant/connect.php');

$sql = ("SELECT * from edit_user('".$_GET['id']."')");
$result = pg_query($dbconn, $sql);
$row = pg_fetch_assoc($result);
  ?> 


  
 <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                                    <form class="form-horizontal" method="POST"  id="submitUserForm" action="action/editUser.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control">
                                   
                                <div class="row">
                                <div class="form-group col-md-6">
                                                <label class="control-label">User Name</label>
                                                  <input type="text" class="form-control" id="name" value="<?php echo $row['usrs_name']?>" name="name" autocomplete="off">
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Pharmacy</label>
                                                     <select  id="pharmacy" name="pharmacy" class="form-control">

                                                     <option value="<?php echo $row['usrs_pharmacy']?>"><?php echo $row['usrs_pharmacy']?></option>
                                                <?php 
                                                $sql = "SELECT*from get_pharmacy()";
                                                        $result1 = pg_query($dbconn, $sql);

                                                        while($row1 = pg_fetch_array($result1)) {
                                                            echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
                                                        } // while
                                                        
                                                ?>
                                                    </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                  <input type="text" class="form-control" id="email" value="<?php echo $row['usrs_email']?>" name="email" autocomplete="off">
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Password</label>
                                                  <input type="text" class="form-control" id="password" value="<?php echo $row['usrs_password']?>" name="pharmacy" autocomplete="off">
                                        </div>

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
