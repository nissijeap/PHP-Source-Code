<?php include "db_conn.php";

$sql = "SELECT * FROM pharmacy_details ORDER BY pharm_id";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Read</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Profile</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr><th scope="row">Pharmacy Name</th></tr>
			    <tr><th scope="row">Address</th></tr>
				<tr><th scope="row">Land Mark</th></tr>
				<tr><th scope="row">Contact Number</th></tr>
				<tr><th scope="row">Website</th></tr>
			  </thead>
			  <tbody>

			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr><td><?=$rows['pharm_name']?></td></tr>
			    <tr><td><?php echo $rows['pharm_address']; ?></td></tr>
				<tr><td><?php echo $rows['pharm_landmark']; ?></td></tr>
				<tr><td><?php echo $rows['pharm_no']; ?></td></tr>
				<tr><td><?php echo $rows['pharm_website']; ?></td></tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="update.php" class="link-primary">Update Information</a>
			</div>
            <div class="link-left">
				<a href="../../Account/admin-page.php" class="link-primary">Home</a>
			</div>
		</div>
	</div>
</body>
</html>