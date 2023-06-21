<?php
include "header.php";
?>
<body onload="getLocation()">
<br></br>

		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img --> 
					<?php
					$id = $_GET['id'];

  $sql = ("SELECT medicine.med_name, med_pharm.med_price, packaging.pack_name, med_pharm.med_quan, med_pharm.images, pharmacy_details.pharm_id, pharmacy_details.pharm_name, pharmacy_details.pharm_address, pharmacy_details.pharm_no, pharmacy_details.pharm_email, pharmacy_details.pharm_open, pharmacy_details.pharm_close, pharmacy_details.map,  pharmacy_details.direction
  from med_pharm
  inner join medicine
						on med_pharm.med_name = medicine.med_id
  						inner join packaging
  						on medicine.med_pack = packaging.pack_id
  						inner join pharmacy_details
  						on med_pharm.pharmacy = pharmacy_details.pharm_id
  where  med_pharm.med_pharm_id = $id");

  $result = $connect->query($sql);

                    foreach ($result as $row) {
	                    $med_name = $row['med_name'];
	                    $med_price = $row['med_price'];
	                    $pack_name = $row['pack_name'];
	                    $med_quan = $row['med_quan'];
	                    $image = $row['images'];
						$pharm_id = $row['pharm_id'];
	                    $pharm_name = $row['pharm_name'];
	                    $pharm_add = $row['pharm_address'];
	                    $pharm_no = $row['pharm_no'];
	                    $pharm_email = $row['pharm_email'];
	                    $pharm_open = $row['pharm_open'];
	                    $pharm_close = $row['pharm_close'];
						$map = $row['map'];
	                    $direction = $row['direction'];
                    

	                    echo '
									
                                    
                                
                                <div class="col-md-5 col-md-push-2">
								<center>
                                <div id="product-main-img">
                                    <div class="">
									<iframe src="https://maps.google.it/maps?q='.$map.'&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									 </div>
                                </div>
                            </div>
                                
                                <div class="col-md-2  col-md-pull-5">
                                <div id="product-imgs">
                                    
                                </div>
								</center>
                            </div>
							';
                    }?>
									<!-- FlexSlider -->
									
									
								<?php echo '	
                                    
                                   
                    <div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name" style="margin:0px; padding:0px;">'.$pharm_name.'</h2>
							<p style="margin:0px; padding:0px;"><strong>'.$pharm_add.' </strong></p>
							<p style="margin:0px; padding:0px;"><strong>Business Hours: </strong>'.$pharm_open.' - '.$pharm_close. '</p>
							<p><strong>Contact Details: </strong>'.$pharm_no.' || '.$pharm_email. '</p>
							<hr>
							<div>

							</div>
							<div>
								<h3 class="product-price" style="margin:0px; padding:0px;">'.$med_name.'</h3>
							</div>
							<p style="font-size: 20px; margin:0px; padding:0px;"><strong>PHP '.$med_price.' </strong></p>
							<p style="margin:0px; padding:0px;"><strong>Sold by: </strong>'.$pack_name.'</p>
							<p><strong>Availability: </strong>'.$med_quan.'pcs Available</p>
							<div class="add-to-cart">
								<div class="btn-group" style="margin-top: 40px">
								<form class="myForm" action="maps.php?id='.$pharm_id.'" method="POST" autocomplete="off">
								<input type="hidden" name="latitude" value=""> 
								<input type="hidden" name="longitude" value=""> <br>
								<button type="submit" name="submit" class="add-to-cart-btn" ><i class="fa fa-map-marker"></i> Get Directions</button>
								</form>
								</div>
							</div>
						</div>
					</div>
					
									
					
					<!-- /Product main img -->

					<!-- Product thumb imgs -->

					<!-- /Product thumb imgs -->

				

									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
                   '  ?> 
					
				</div>
				<!-- /row -->
                
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- FOOTER -->
<br></br>
</body>
<script type="text/javascript">
    function getLocation(){
    if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition);
    
    }
    
    }
    
    function showPosition (position){ 
    document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude; 
    document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
    }
</script>
	
<?php
include "footer.php";
?>