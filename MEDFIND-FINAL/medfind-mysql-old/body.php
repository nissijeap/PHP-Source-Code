

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Medicines</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1" >
									
									<?php include ('./constant/connect.php');
                                    $sql = "SELECT medicine.med_id, medicine.med_name, medicine.med_price, packaging.pack_name, medicine.med_quan, medicine.images, pharmacy_details.direction 
									  from medicine 
									  inner join packaging
									  on medicine.med_pack = packaging.pack_id
									  inner join pharmacy_details
									  on medicine.pharmacy = pharmacy_details.pharm_id
									  where  pharmacy = 1";
									$run_query = mysqli_query($connect, $sql);
									foreach($run_query as $row){
										$med_id = $row['med_id'];
										$med_name = $row['med_name'];
			                            $med_price = $row['med_price'];
			                            $pack_name = $row['pack_name'];
			                            $med_quan = $row['med_quan'];
										$image = $row['images'];
	                                    $direction = $row['direction'];
                        
                                echo
								'<div class="product">
									<a href="pharm_details.php?id='.$med_id.'">
									<div class="product-img">
										<img src="./image/'.$image.'" style="max-height: 170px;" alt="">
									</div>
									<div class="product-body">
									<h4 class="product-price header-cart-item-info">'.$med_name.'<!--price-->
										<h3 class="product-name header-cart-item-name">PHP '.$med_price.'</h3>
										<p class="product-category" style="padding:0px; margin:0px;"><strong>Sold by: '.$pack_name.'</strong></p> <!--category here-->
										<p class="product-category"><strong>'.$med_quan.' pcs Available</strong></p>
										
									</div></a>
									<div class="add-to-cart">
									<a href="pharm_details.php?id='.$med_id.'"><button class="add-to-cart-btn block2-btn-towishlist"><i class="fa fa-map-marker"></i>Show in Map</button></a>
									</div>
								</div>
								';
									}
									;
								?>

										<!-- product -->
										
	
										<!-- /product -->
										
										
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php
										$sql = "SELECT medicine.med_id, medicine.med_name, medicine.med_price, packaging.pack_name, medicine.med_quan, medicine.images, pharmacy_details.direction 
									  from medicine 
									  inner join packaging
									  on medicine.med_pack = packaging.pack_id
									  inner join pharmacy_details
									  on medicine.pharmacy = pharmacy_details.pharm_id
									  where  pharmacy = 2";
									$run_query = mysqli_query($connect, $sql);
									foreach($run_query as $row){
										$med_id = $row['med_id'];
										$med_name = $row['med_name'];
			                            $med_price = $row['med_price'];
			                            $pack_name = $row['pack_name'];
			                            $med_quan = $row['med_quan'];
										$image = $row['images'];
	                                    $direction = $row['direction'];
                        
                                echo
								'<div class="product">
									<a href="pharm_details.php?id='.$med_id.'">
									<div class="product-img">
										<img src="./image/'.$image.'" style="max-height: 170px;" alt="">
									</div>
									<div class="product-body">
									<h4 class="product-price header-cart-item-info">'.$med_name.'<!--price-->
										<h3 class="product-name header-cart-item-name">PHP '.$med_price.'</h3>
										<p class="product-category" style="padding:0px; margin:0px;"><strong>Sold by: '.$pack_name.'</strong></p> <!--category here-->
										<p class="product-category"><strong>'.$med_quan.' pcs Available</strong></p>
										
									</div>
									</a>
									<div class="add-to-cart">
										<a href="pharm_details.php?id='.$med_id.'"><button class="add-to-cart-btn block2-btn-towishlist"><i class="fa fa-map-marker"></i>Show in Map</button></a>
									</div>
								</div>
								';
									}
									;
								?>
                               
							
                    
										
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</div>
<br></br>
		