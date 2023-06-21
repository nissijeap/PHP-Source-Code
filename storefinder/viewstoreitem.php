  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- styles -->
    <style type="text/css">
      #map {
    height: 600px;
    width: 100%;
    background-color: grey;
  }
 </style>
 <?php
 if (isset($_GET['store'])) {
   # code...
     $search = $_GET['store'];  

     $sql = "SELECT * FROM `tblstore` s, `tblusers` u WHERE StoreID=UserID AND StoreID = '" .$search ."'";
      $mydb->setQuery($sql);
      $store = $mydb->loadSingleResult(); 
      $storeID = $store->StoreID; 
      $storename = $store->StoreName;
 }else{
    $search = "";
 }
 
if (isset($_GET['product'])) {
  # code...
  $product = $_GET['product'];
}else{
  $product ='';
}
 ?>
     
 <section id="content">
  <div class="row content">
    <div class="col-md-12">
       
       <div class="col-md-6">
            <input type="hidden" id="address" value="<?php echo $store->StoreAddress;?>">
            <div id="map" ></div> 
        </div>

         <div class="col-md-6"> 
          <h2><?php echo $storename;?></h2>
          <!-- <p style="font-weight: bolder;">List of Products</p> -->
          <div class="table-responsive">
           <table id="dash-table" class="table table-bordered"> 
            <thead>
              <th>Product</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
            </thead>
            <tbody> 
          <?php

              $sql = "SELECT *,sum(Remaining) as 'qty' FROM tblstockin st, `tblproduct` p, `tblcategory` c,`tblstore` s WHERE st.ProductID=p.ProductID AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID` AND s.StoreID = '".$storeID."' AND (ProductName Like '%{$product}%' OR Categories Like '%{$product}%') GROUP BY p.ProductID";

              // $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
              // WHERE i.ProductID=p.ProductID AND s.StoreID=p.StoreID AND p.CategoryID=c.CategoryID AND Remaining > 0 AND s.StoreID=".$search ;
              $mydb->setQuery($sql);
              $cur = $mydb->loadResultList(); 
              foreach ($cur as $result) {  
                echo '<tr>';
                echo  '<td><a title="Order Now!"  href="index.php?q=products&id='.$result->ProductID.'">'.$result->ProductName.'</a></td>';
                echo  '<td>'.$result->Description.'</td>';
                echo  '<td>'.$result->Categories.'</td>';
                echo  '<td>'.$result->Price.'</td>';
                echo  '<td>'.$result->qty.'</td>';
                echo  '</tr>'; 
              } 
          ?> 
           </tbody>
          </table>
          </div>
        </div>
    </div> 
  </div>
</section>



  <script type="text/javascript">
    var geocoder;
    var map;
    var address = document.getElementById("address").value;

function initMap() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var myOptions = {
    zoom: 18,
    center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);
  if (geocoder) {
    geocoder.geocode({
      'address': address
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

          var infowindow = new google.maps.InfoWindow({
            content: '<b>' + address + '</b>',
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title: address
          });
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
} 

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&callback=initMap">
</script>    

 