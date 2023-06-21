<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?> 
<?php include('./constant/connect.php');
$sql = "SELECT*from classification order by class_name asc";
$result = $connect->query($sql);

?>

<link href="css/jquery.datatables.css" rel="stylesheet">
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Classifications</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Classifications</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-8" style="margin: auto;">
                <div class="card card-body">
                    <h3 class="text-primary">Add Classification</h3>
                    <form class="form-horizontal" method="POST"  id="submitBrandForm" action="action/createCategories.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label">Classification</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control"id="class_name" placeholder="Medicine Type" name="class_name"  required=""/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="create" id="createCategoriesBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-primary">List of Medicine Classifications</h3>
                        <div class="table-responsive m-t-40">
                            <table id="table2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Classification Name</th>
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
                                        <td style="color:black"><?php echo $row['class_name'] ?></td>
                                        <td>
                                            <a href="editcategory.php?id=<?php echo $row['class_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                            <a href="action/removeCategories.php?id=<?php echo $row['class_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./constant/layout/footer.php');?>
<script>
    $(document).ready(function(){
        $('#table2').DataTable();
    });
</script>


