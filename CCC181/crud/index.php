<?php session_start(); ?>
<?php if(!isset($_SESSION['admin_name'])){
   header("Location:../Account/welcome.php", true, 301); exit;
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	
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
		<form action="php/create.php" 
		      method="post">
            
		   <h4 class="display">New Medicine</h4><hr><br>
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
		           value="<?php if(isset($_GET['med_name']))
		                           echo($_GET['med_name']); ?>" 
		           placeholder="Enter medicine name">
		   </div>

		   <div class="form-group">
		     <label for="med_brand">Brand</label><br>
		     <input type="med_brand" 
		           class="form-control" 
		           id="med_brand" 
		           name="med_brand" 
		           value="<?php if(isset($_GET['med_brand']))
		                           echo($_GET['med_brand']); ?>"
		           placeholder="Enter Medicine Brand">
		   </div>

		   <div class="form-group">
		     <label for="med_type">Type</label><br>
		     <input type="med_type" 
		           class="form-control" 
		           id="med_type" 
		           name="med_type" 
		           value="<?php if(isset($_GET['med_type']))
		                           echo($_GET['med_type']); ?>"
		           placeholder="Enter Medicine Type">
		   </div>

		   <div class="form-group">
		     <label for="med_count">Quantity</label><br>
		     <input type="med_count" 
		           class="form-control" 
		           id="med_count" 
		           name="med_count" 
		           value="<?php if(isset($_GET['med_count']))
		                           echo($_GET['med_count']); ?>"
		           placeholder="Enter Quantity">
		   </div>

		   <div class="form-group">
		     <label for="med_price">Price</label><br>
		     <input type="med_price" 
		           class="form-control" 
		           id="med_price" 
		           name="med_price" 
		           value="<?php if(isset($_GET['med_price']))
		                           echo($_GET['med_price']); ?>"
		           placeholder="Enter Medicine Price">
		   </div>

		   <button type="submit" 
		          class="btn btn-success"
		          name="create">Add New Medicine</button>
		    <a href="read.php"   class="btn btn-cancel">Cancel</a>
	    </form>
	</div>
</body>
</html>