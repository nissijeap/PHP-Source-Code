<?php session_start();
include "php/read.php"; ?>
<?php if(!isset($_SESSION['admin_name'])){
   header("Location:../Account/welcome.php", true, 301); exit;
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Read</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<style type="text/css">
        body {
            background-image: url('../pictures/inventory1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
</style>

<body>

	<div class="container">
		<div class="box">
			<h4 class="display">Medicine List</h4><br>
			<?php 
			if (isset($_SESSION['success'])) { 
				
				echo "<div class='success'>";
				echo $_SESSION['success']; 
				echo "</div>";

				unset($_SESSION['success']);
			}
			?>
			
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Medicine Name</th>
			      <th scope="col">Brand</th>
				  <th scope="col">Type</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Price</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <td scope="row"><?=$i?></td>
			      <td><?=$rows['med_name']?></td>
			      <td><?php echo $rows['med_brand']; ?></td>
				  <td><?php echo $rows['med_type']; ?></td>
				  <td><?php echo $rows['med_count']; ?></td>
				  <td><?php echo $rows['med_price']; ?></td>
			      <td><a href="update.php?med_id=<?=$rows['med_id']?>" 
			      		 class="btn btn-success">Update</a>

			      	  <a href="php/delete.php?med_id=<?=$rows['med_id']?>" 
			      	     class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div>
				<a href="../Account/admin-page.php" class="link-left">Back</a>
				<a href="index.php" class="link-right">Add New Medicine</a>
			</div>
		</div>
	</div>
</body>
</html>