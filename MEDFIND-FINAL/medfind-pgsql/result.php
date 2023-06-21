<?php
include 'header.php';
?>
</br></br>
<div class="main main-raised"> 
    <div class="section">
		<div class="container">
			<div class="row">
				<div>
					<?php
						if ($_POST) {
  						$search = $_POST['search'];
						$sql = "SELECT * from result_view('$search%')";

  						$result = pg_query($dbconn, $sql);
						$rows = pg_num_rows($result);
  						$temp ='';
  
  						if($rows > 0){
							echo '<p style="font-weight:bold"><i class="fa fa-list"></i> LOWEST TO HIGHEST PRICE</p>';
							while ($row = pg_fetch_array($result)) {
								$med_id = $row['sq_id'];
								$med_name = $row['sq_name'];
								$med_quan = $row['sq_quan'];
								$med_price = $row['sq_price'];
								$pack_name = $row['sq_pack'];
								$med_dosage = $row['sq_dosage'];
								$image = $row['sq_images'];
								$pharm_name = $row['sq_pharmname'];
								$pharm_add = $row['sq_pharmaddress'];
								$pharm_no = $row['sq_pharmno'];
								$pharm_email = $row['sq_pharmemail'];
								$pharm_open = $row['sq_pharmopen'];
								$pharm_close = $row['sq_pharmclose'];
								$direction = $row['sq_pharmdirection'];

								if ($temp != $pack_name) {
									
									echo "<pre style='text-transform:uppercase; font-weight: bold; font-size:15px; width:100%;'>$pack_name</pre>";
									$temp = $pack_name;
								}

								if ($temp == $pack_name) {
									echo "
    								<div class='col-md-4 col-xs-6' style=''>
										<a href='pharm_details.php?id=$med_id'>
											<div class='product'>
												<div class='product-img'>
													<img src='./image/$image' style='max-height: 150px;'>
												</div>
												<div class='product-body'>
													<h3 class='product-name header-cart-item-name' style='margin:0px; padding:0px;'>$pharm_name</h3>
													<p class='product-category'>$pharm_add</p>
													<h4 class='product-price header-cart-item-info'>$med_name</h4>
													<p class='product-category'style='margin:0px; padding:0px;'><strong>Price:</strong> $med_price</p>
													<p class='product-category'style='margin:0px; padding:0px;'><strong>Sold by:</strong> $pack_name</p>
													<p class='product-category'style='margin:0px; padding:0px;'><strong>Dosage:</strong> $med_dosage</p>";
									if ($med_quan == 0) {
										echo "<p class='product-category'style='margin:0px; padding:0px; color:red;'><strong>NOT AVAILABLE</strong></p>";
									} else {
										echo "<p class='product-category'style='margin:0px; padding:0px; color:green;'><strong> $med_quan pcs Available</strong></p>";
									} ?>
												</div>
											
										</a>
										<div class='add-to-cart'>
											<a href='pharm_details.php?id=<?php echo $med_id?>'><button class='add-to-cart-btn'><i class='fa fa-map-marker'></i>Show Map</button></a>
										</div>
											</div>
									</div>
								<?php }
							}
	                    } else {
		                    echo '<br><center><h4 style="font-size:30px;">Medicine is not Available in any Pharmacy in the Area</h4></center>';
						}
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<br></br>

<?php
include "footer.php";
?>