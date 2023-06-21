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

  $sql = ("SELECT * from result_select($id)");

  $result = pg_query($dbconn, $sql);

                    while ($row = pg_fetch_array($result)) {
	                    $med_id = $row['sq_id'];
								$med_name = $row['sq_name'];
								$med_quan = $row['sq_quan'];
								$med_price = $row['sq_price'];
								$pack_name = $row['sq_pack'];
								$med_dosage = $row['sq_dosage'];
								$image = $row['sq_images'];
								$pharm_id = $row['sq_pharid'];
								$pharm_name = $row['sq_pharmname'];
								$pharm_add = $row['sq_pharmaddress'];
								$pharm_no = $row['sq_pharmno'];
								$pharm_email = $row['sq_pharmemail'];
								$pharm_open = $row['sq_pharmopen'];
								$pharm_close = $row['sq_pharmclose'];
								$map = $row['sq_pharmmap'];
								$direction = $row['sq_pharmdirection'];
                    

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