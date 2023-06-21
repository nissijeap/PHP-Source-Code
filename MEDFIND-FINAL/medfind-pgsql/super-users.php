<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>

<?php include('./constant/connect.php');
$sql = "SELECT*from get_users()";
$result = pg_query($dbconn, $sql);
//echo $sql;exit;

?>
 </style>
<link href="css/jquery.datatables.css" rel="stylesheet">
</head>
<body>
       <div class="page-wrapper">   
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Users</h3>
                </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Users</li>
                        </ol>
                    </div>
            </div>
            
    
            <div class="card">
                <div class="card-body">
                    <a href="super-add-users.php"><button class="btn btn-primary">Add User</button></a>
                    <div class="col col-md-12">
                        <hr class="col-md-12" style="padding: 0px; border-top: 5px solid  #ffff;">
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>User Name</th>
                                    <th>Pharmacy</th>
                                    <th>Email</th>
                                    <th>Password</th>
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
                                    <td style="color:black"><?php echo $row['usrs_name'] ?></td>
                                    <td style="color:black"><?php echo $row['usrs_pharmacy'] ?></td>
                                    <td style="color:black"><?php echo $row['usrs_email'] ?></td>
                                    <td style="color:black"><?php echo $row['usrs_password'] ?></td>
                                    <td>
                        
                                        <a href="edituser.php?id=<?php echo $row['usrs_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                        <a href="action/removeUser.php?id=<?php echo $row['usrs_id']?>" ><button type="button" class="btn btn-xs btn-danger" 
                                        onclick="return confirm('Pharmacy Active! Are you sure to delete this user?')"><i class="fa fa-trash"></i></button></a>
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

