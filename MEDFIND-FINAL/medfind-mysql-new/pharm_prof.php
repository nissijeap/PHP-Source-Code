<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php 
include('./constant/connect.php');
    $sql = ("SELECT * from pharmacy_details where pharm_id = $pharm");
    $result = $connect->query($sql);

?>
<!DOCTYPE html>
<html>
    <head>
    <link href="./constant/table.css"  rel="stylesheet">
    </head>

       <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Profile</li>
                    </ol>
                </div>
            </div>
            <div class="container container-body">
            <div class="container container-image">
            <?php
        foreach ($result as $row) {
        ?> 
        <?php if($row['cover'] == null) { ?>
            <div id="content">
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div>
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="up-btn">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>


<?php } else { ?>
        
            <img src="./image/<?php echo $row['cover']; ?>" style="width: 100%; height: 100%; object-fit:cover;">
 
        <?php
        }
        ?>
        <?php } ?>
        
    </div>
    <div class="container container-table">
                            <a href="editprofile.php?id=<?php echo $row['pharm_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"> Edit Profile</i></button></a>

                                <div>
                                    <table>
                                    <thead>
                                            <tr>
                                            
                            <th colspan="2" style="color:black; text-align:left;" ><strong>Pharmacy Details</strong></th>                       
</tr></thead>
                                        
                                        
                                       
                                       
                                       <tbody>
                                       
                                       <?php
foreach ($result as $row) {
    ?>
                                        <tr>     
                                        <tr><td style="color:black; background-color: rgba(33,182,168,0.3);"><strong>Pharmacy Name</strong></td>
                                        <td style="text-align:left;"><?php echo $row['pharm_name'] ?></td> </tr>
                                        <tr><td style="color:black; background-color: rgba(33,182,168,0.3);"><strong>Address</strong></td>
                                        <td style="text-align:left;"><?php echo $row['pharm_address'] ?></td></tr>
                                        <tr><td style="color:black; background-color: rgba(33,182,168,0.3);"><strong>Number</strong></td>
                                        <td style="text-align:left;"><?php echo $row['pharm_no'] ?></td></tr>
                                        <tr><td style="color:black; background-color: rgba(33,182,168,0.3);"><strong>Email</strong> </td>
                                        <td style="text-align:left;"><?php echo $row['pharm_email'] ?></td></tr>
                                        <tr><td style="color:black; background-color: rgba(33,182,168,0.3);"><strong>Business Hours</strong></td>
                                        <td style="text-align:left;"><?php echo $row['pharm_open'] ?> - <?php echo $row['pharm_close']?></td></tr>
                                        </tr>
                               
                                                
                                            
                                        
                                    </tbody>
                                   <?php    
}
?>
                               </table>
</div>
                                </div>

 
<?php include('./constant/layout/footer.php');?>


