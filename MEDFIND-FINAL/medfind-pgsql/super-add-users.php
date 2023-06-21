<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');?>

 
<div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                                    <form class="row" method="POST"  id="submitUserForm" action="action/createUser.php" method="POST" enctype="multipart/form-data">


                                            <div class="form-group col-md-6">
                                                <label class="ontrol-label">User Name</label>
                                                  <input type="text" class="form-control" id="name" placeholder="User Name" name="name" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Pharmacy</label>
                                                  <select type="text" class="form-control" id="pharmacy"  name="pharmacy" >
                                                <option value="">SELECT</option>
                                                <?php 
                                                $sql = "SELECT*from get_pharmacy()";
                                                        $result = pg_query($dbconn, $sql);

                                                        while($row = pg_fetch_array($result)) {
                                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                        } // while
                                                        
                                                ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label">Password</label>
                                                  <input type="text" class="form-control" id="password" placeholder="Password" name="password" autocomplete="off"/>
                                            </div>
                                    
                      

                                        <div class="col-md-1 mx-auto">
                                        <button type="submit" name="create" id="createUserBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
<?php include('./constant/layout/footer.php');?>