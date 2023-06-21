<?php
 include 'php/update.php'; ?>
 <?php if(!isset($_SESSION['admin_name'])){
   header("Location:../Account/welcome.php", true, 301); exit;
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
    <link rel="stylesheet" href="css/style.css" type="">
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
		<form action="php/update.php" 
		      method="post">
            
		   <h4 class="display">Update</h4><hr><br>
		   <?php if (isset($_SESSION['error'])) { 
				echo "<div class='error'>";
				echo $_SESSION['error'];
				echo "</div>";

				unset($_SESSION['error']);
		   }
			?>
		   <div class="form-group">
		     <label for="med_name">Medicine Name</label><br>
		     <input type="med_name" 
		           class="form-control" 
		           id="med_name" 
		           name="med_name" 
		           value="<?=$row['med_name'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="med_brand">Brand</label><br>
		     <input type="med_brand" 
		           class="form-control" 
		           id="med_brand" 
		           name="med_brand" 
		           value="<?=$row['med_brand'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="med_type">Type</label><br>
		     <input type="med_type" 
		           class="form-control" 
		           id="med_type" 
		           name="med_type" 
		           value="<?=$row['med_type'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="med_count">Quantity</label><br>
		     <input type="med_count" 
		           class="form-control" 
		           id="med_count" 
		           name="med_count" 
		           value="<?=$row['med_count'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="med_price">Price</label><br>
		     <input type="med_price" 
		           class="form-control" 
		           id="med_price" 
		           name="med_price" 
		           value="<?=$row['med_price'] ?>" >
		   </div>

		   <input type="text" 
		          name="med_id"
		          value="<?=$row['med_id']?>"
		          hidden >

		   <button type="submit" 
		           class="btn btn-success"
		           name="update">Update</button>
		    <a href="read.php" class="btn">Cancel</a>
	    </form>
	</div>
</body>
</html>