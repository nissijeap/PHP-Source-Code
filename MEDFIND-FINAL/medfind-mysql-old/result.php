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
						$sql = "SELECT medicine.med_id, medicine.med_name, medicine.med_price, packaging.pack_name, medicine.med_dosage, medicine.med_quan, medicine.images, pharmacy_details.pharm_name, pharmacy_details.pharm_address, pharmacy_details.pharm_no, pharmacy_details.pharm_email, pharmacy_details.pharm_open, pharmacy_details.pharm_close, pharmacy_details.direction 
  						from medicine 
  						inner join packaging
  						on medicine.med_pack = packaging.pack_id
  						inner join pharmacy_details
  						on medicine.pharmacy = pharmacy_details.pharm_id
  						where  med_name LIKE '%$search%' or med_desc LIKE '%$search%'
  						order by pack_name, med_price asc";

  						$result = $connect->query($sql);
  						$temp ='';
  
  						if(mysqli_num_rows($result) > 0){
							echo '<p style="font-weight:bold"><i class="fa fa-list"></i> LOWEST TO HIGHEST PRICE</p>';
							while ($row = mysqli_fetch_array($result)) {
								$med_name = $row['med_name'];
								$med_price = $row['med_price'];
								$pack_name = $row['pack_name'];
								$med_dosage = $row['med_dosage'];
								$med_quan = $row['med_quan'];
								$med_id = $row['med_id'];
								$image = $row['images'];
								$pharm_name = $row['pharm_name'];
								$pharm_add = $row['pharm_address'];
								$pharm_no = $row['pharm_no'];
								$pharm_email = $row['pharm_email'];
								$pharm_open = $row['pharm_open'];
								$pharm_close = $row['pharm_close'];
								$direction = $row['direction'];

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