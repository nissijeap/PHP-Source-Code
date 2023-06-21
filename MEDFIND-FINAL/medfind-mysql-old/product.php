<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php 
include('./constant/connect.php');
$sql = ("SELECT medicine.med_id, medicine.images, medicine.med_name, medicine.med_quan, medicine.med_price, packaging.pack_name, medicine.med_dosage, classification.class_name, medicine.med_stat, medicine.med_added, medicine.med_exp
from medicine
inner join packaging
on medicine.med_pack = packaging.pack_id
inner join classification 
on medicine.med_class = classification.class_id
where medicine.pharmacy = $pharm
order by med_name asc");
$result = $connect->query($sql);

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
                    <h3 class="text-primary"> View Medicine</h3>
                </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Medicine</li>
                        </ol>
                    </div>
            </div>
                
            <div class="card">
                <div class="card-body">
                    <a href="add-product.php"><button class="btn btn-primary">Add Medicine</button></a>
                    <div class="col col-md-12">
                        <hr class="col-md-12" style="padding: 0px; border-top: 5px solid  #ffff;">
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Image</th>
                                    <th>Medicine Name</th>                       
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Packaging</th>
                                    <th>Dosage</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Expiration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                       
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach ($result as $row) {
                                    $i++;
                                ?>
                                <tr style="color:black">
                                    <td class="text-center" style="color:black"><?=$i?></td>
                                    <td><a href='med_upload.php?id=<?php echo $row['med_id']?>'><img src="./image/<?php echo $row['images']; ?>" style="width: 50px; height: 50px; object-fit:cover;"></a></td>
                                    <td style="color:black"><?php echo $row['med_name'] ?></td>
                                    <td style="width:500px">
                                        <form method="POST" action="action/adjust_quan.php?id=<?php echo $row['med_id']?>">
                                        <div style="height:50px; width:100%; display:flex; align-items: center; justify-content:center; background-color: #f7f8fd; border-radius: 12px;">
                                        <input type="number" min="0" name="cur_quan" style="width: 100%" value="<?php echo $row['med_quan'] ?>"> 
                                        <button type="button" class="minus-button btn btn-primary" style="border: 0px; padding:5px; background-color: #f44336; margin:2px;">-</button>
                                        <button type="button" class="plus-button btn btn-primary" style="border: 0px; padding:5px; background-color: #EED202; margin-right:2px;">+</button>
                                        <button type="submit" class="btn btn-primary" style="padding:2px; background-color:#4caf50;" name="update" onclick="return confirm('Update record?')"><i class="fa fa-check"></i></button></a>
                                        </div></form>
                                    </td>
                                    <td style="color:black"><?php echo $row['med_price'] ?></td>
                                    <td style="color:black"><?php echo $row['pack_name'] ?></td>
                                    <td style="color:black"><?php echo $row['med_dosage'] ?></td>
                                    <td style="color:black"><?php echo $row['class_name'] ?></td>
                                    <td style="text-align:center"><?php  
                                        if($row['med_stat']=="Available"){
                                            $availability = "<label class='label label-success' ><h4>Available</h4></label>";
                                            echo $availability;
                                        } else{
                                            $availability = "<label class='label label-danger'><h4>Not Available</h4></label>";
                                            echo $availability;
                                        }?></td>
                                    <td style="color:black"><?php echo $row['med_added'] ?></td>
                                    <td style="color:black"><?php echo $row['med_exp'] ?></td> 
                                    <td>
                                        <a href="editproduct.php?id=<?php echo $row['med_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                        <a href="action/removeProduct.php?id=<?php echo $row['med_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
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




