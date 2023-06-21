<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php 
include('./constant/connect.php');
$sql = ("SELECT * from get_pharmacy()");
$result = pg_query($dbconn, $sql);

?>
<!DOCTYPE html>
<html>
  
<head>
<style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
<link href="css/jquery.datatables.css" rel="stylesheet">
</head>
<body>
       <div class="page-wrapper">   
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Pharmacy</h3>
                </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Pharmacy</li>
                        </ol>
                    </div>
            </div>
            
    
            <div class="card">
                <div class="card-body">
                    <a href="super-add-pharmacy.php"><button class="btn btn-primary">Add Pharmacy</button></a>
                    <div class="col col-md-12">
                        <hr class="col-md-12" style="padding: 0px; border-top: 5px solid  #ffff;">
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Pharmacy Name</th>
                                    <th>Address</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
                                    <th>Open</th>
                                    <th>Close</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                       
                            <tbody>
                                <?php
                                    $i = 0;
                                    while ($row = pg_fetch_array($result)) {
                                    $i++;
                                ?>
                                <tr style="color:black">
                                    <td class="text-center" style="color:black"><?=$i?></td>
                                    <td style="color:black"><?php echo $row['dtls_name'] ?></td>
                                    <td style="color:black"><?php echo $row['dtls_address'] ?></td>
                                    <td style="color:black"><?php echo $row['dtls_no'] ?></td>
                                    <td style="color:black"><?php echo $row['dtls_email'] ?></td>
                                    <td style="color:black"><?php echo $row['dtls_open'] ?></td>
                                    <td style="color:black"><?php echo $row['dtls_close'] ?></td>
                                    <td>
                        
                                        <!--<a href="editpharmacy.php?id=<?php echo $row['dtls_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>-->
                                        <a href="action/removePharmacy.php?id=<?php echo $row['dtls_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            
                            
                        </table>
                               
                    </div>
                </div>
            </div>

            <?php include('./constant/layout/footer.php');?>
            <script>
$(document).ready(function(){
    $('#table2').DataTable();
});</script>
                         
    </body>
</html>




