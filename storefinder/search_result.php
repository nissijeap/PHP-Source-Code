<?php 
	$searchfor = (isset($_GET['searchfor']) && $_GET['searchfor'] != '') ? $_GET['searchfor'] : '';
	
?>

 <style type="text/css">
  #map {
    height: 500px;
    width: 100%;
    background-color: grey;
  }
</style>
<style type="text/css">
	/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
</style>
<div class="container">
	<div class="row">

		<section class="content">
			<div >
				<div class="btn-group">
					<?php 


					 $search = isset($_POST['SEARCH']) ? ($_POST['SEARCH']!='') ? $_POST['SEARCH'] : 'All' : 'All';
					 $company = isset($_POST['Store']) ? ($_POST['Store']!='') ? $_POST['Store'] : 'All' : 'All';
					 $category = isset($_POST['Category']) ? ($_POST['Category']!='') ? $_POST['Category'] : 'All' : 'All';

					$sql = "SELECT * FROM tblstore WHERE StoreID='$company'";
					$mydb->setQuery($sql);
					$cur = $mydb->executeQuery();
					$maxrow = $mydb->num_rows($cur);

					if ($maxrow > 0) {
						# code...
						$str = $mydb->loadSingleResult();
						$store = $str->StoreName;
					}else{
						$store = "All";
					}
					


					// switch ($searchfor) {
					// 	case 'bystore':
					// 		# code...
					// 	$result_search =  'Result : '  . $search . ' | Store : ' . $store;
					// 		break;
					// 	case 'advancesearch':
					// 		# code... 
					// 	$result_search =  'Result : '  . $search . ' | Store : ' . $store . ' | category : ' . $category; 
					// 	    break;
					// 	case 'byfunction':
					// 		# code... 
					// 	$result_search =  'Result : '  . $search . ' | category : ' . $category; 
					// 	    break; 
						
					// 	default:
					// 		# code...
					// 		break;
					// }
            $result_search =  'Result : '  . $search ;

					?>
				</div>
			</div>
			 
			<div class="col-md-12 ">   

						    <?php  
						    $n=0;
									 $search = isset($_POST['SEARCH']) ? $_POST['SEARCH'] : '';
									 $store = isset($_POST['Store']) ? stripslashes($_POST['Store']) : '';
									 $category = isset($_POST['Category']) ? $_POST['Category'] : '';


   								 // $sql = "SELECT *  FROM `tblproduct` p, `tblcategory` c,`tblstore` s WHERE  p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID`AND Categories LIKE '%$category%' AND ProductName LIKE '%$search%' AND s.StoreID LIKE '%$store' GROUP BY p.StoreID" ; 

                    $sql = "SELECT *  FROM `tblproduct` p, `tblcategory` c,`tblstore` s WHERE  p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID`AND (Categories LIKE '%$search%' OR ProductName LIKE '%$search%' ) GROUP BY p.StoreID" ; 
							    $mydb->setQuery($sql);
							    $cur = $mydb->loadResultList();


							    foreach ($cur as $result) {  
							    	   $lat = $result->lat;
							    	   $lng = $result->lng;  

							    	   $data[] =array( $result->StoreName,$result->StoreAddress,"index.php?q=item&store=".$result->StoreID."&product=".$search);
										 
							    }

								 // echo json_encode($data);
							  ?>  
  <div style="border-bottom: 1px solid #ddd;padding: 5px 0px;"><?php echo $result_search;?></div>
 <div id="map"></div>
<script type="text/javascript" >   
	var markers = <?php echo json_encode($data)?>;
    var geocoder;
    var map;
    var LatLng;
    var url;
    console.log(markers);

    function initMap() {
        // LatLng = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
        LatLng = {lat:14.0940, lng: 120.6890};
        map = new google.maps.Map(document.getElementById('map'), {zoom: 10, center: LatLng});
        geocoder = new google.maps.Geocoder();

        for (i = 0; i < markers.length; i++) { 
       		 setMarkers(markers,i);
 		 }
    }


function setMarkers(locations, i) {
  var title = locations[i][0];
  var address = locations[i][1];
  var url = locations[i][2];
  geocoder.geocode({
      'address': locations[i][1]
    },

    function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        var marker = new google.maps.Marker({ 
          map: map,
          position: results[0].geometry.location,
          title: title,
          animation: google.maps.Animation.DROP,
          address: address,
          url: url
        })
        infoWindow(marker, map, title, address, url);
        bounds.extend(marker.getPosition());
        map.fitBounds(bounds);
      } else {
        alert("geocode of " + address + " failed:" + status);
      }
    });
}



function infoWindow(marker, map, title, address, url) {
  google.maps.event.addListener(marker, 'click', function() {
    var html = "<div><h4>" + title + "</h4><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
    iw = new google.maps.InfoWindow({
      content: html,
      maxWidth: 350
    });
    iw.open(map, marker);
  });
}

function createMarker(results) {
  var marker = new google.maps.Marker({ 
    map: map,
    position: results[0].geometry.location,
    title: title,
    animation: google.maps.Animation.DROP,
    address: address,
    url: url
  })
  bounds.extend(marker.getPosition());
  map.fitBounds(bounds);
  infoWindow(marker, map, title, address, url);
  return marker;
}

    // function setMarkers() {
    //     var marker, i, url,store_Name;
		
    //     for( i = 0; i < markers.length; i++ ) { 
    //     	// alert(markers[i].store);
    //          // url = 'index.php?q=item&store=' + markers[i].store;
    //          // store_Name = markers[i].store;
    //         // alert(url);
    //         geocoder.geocode({'address': markers[i][0]}, function(results, status) {
    //         if (status === 'OK') {

    //         	 var infowindow = new google.maps.InfoWindow({
		  //           content: '<b>' + results[0].address_components[0].long_name + '</b>',
		  //           size: new google.maps.Size(150, 50)
		  //         });

    //             marker = new google.maps.Marker({
    //                 map: map,
    //                 position: results[0].geometry.location, 
    //                 title: results[0].address_components[0].long_name, 
    //             });
    //             google.maps.event.addListener(marker, "click", function() { 
    //                 // window.location.href =url;
    //                  infowindow.open(map, marker);
    //             });
    //         } else {
    //         console.log('Geocode was not successful for the following reason: ' + status);
    //         }});
    //     }
    // }
   
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&callback=initMap">
</script>    

<script type="text/javascript">





	
// function initMap(){	

// var locationsb = <?php echo json_encode($z);?>;
// var map = new google.maps.Map(document.getElementById('map'), {
//  zoom: 15,
//  center: new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lng;?>),
//  mapTypeId: google.maps.MapTypeId.ROADMAP
//  });

//  var infowindow = new google.maps.InfoWindow();
//  // var image = 'plugins/marker/marker.png';
//  // var image2 = '/marker/Map1.png';

// var marker1, n;
// for (n = 0; n < locationsb.length; n++) {  
// marker1 = new google.maps.Marker({
// position: new google.maps.LatLng(locationsb[n][1], locationsb[n][2]),
// offset: '0',
//  // icon: image,
// title: locationsb[n][4],
// map: map       
// });
// google.maps.event.addListener(marker1, 'click', (function(marker1, n)
// {
// return function() {
// infowindow.setContent(locationsb[n][0]);
// infowindow.open(map, marker1);
// }
// })(marker1, n));
// }
// }
</script>

			</div>   
		</section>
		
	</div>
</div>
