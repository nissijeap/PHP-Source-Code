  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- styles -->
    <style type="text/css">
        .red {
    color: red;
}
    #results  {width: 990px; height: 500px }
    div#results #map_canvas   { width: 65%; height: 100%;  }
    div#results #directions_panel { width: 35%; height: 100%;   }
 </style>
 <?php
 if (isset($_GET['search'])) {
   # code...
     $search = $_GET['search'];  

     $sql = "SELECT * FROM `tblstore` s, `tblusers` u WHERE StoreID=UserID AND StoreID=" .$search;
      $mydb->setQuery($sql);

      $store = $mydb->loadSingleResult(); 
      $storename = $store->StoreName; 
 }else{
    $search = "";
 }
 

 ?>
     
 <section id="content">
  <div class="row content">
    <div class="col-md-12">
       <?php if ($search=="") { ?> 

        <div class="col-md-12">
          <div id="results" > 
            <div id="map_canvas" ></div> 
          </div> 
        </div>

       <?php }else{ ?>
       <div class="col-md-6">
          <div id="results" > 
            <div id="map_canvas" ></div> 
          </div> 
        </div>

         <div class="col-md-6"> 
          <h2><?php echo $storename;?></h2>
          <p style="font-weight: bolder;">List of Products</p>
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

              $sql = "SELECT *,sum(Remaining) as 'qty' FROM tblstockin st, `tblproduct` p, `tblcategory` c,`tblstore` s WHERE st.ProductID=p.ProductID AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID` AND s.StoreID=".$search." GROUP BY p.ProductID";

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
      <?php } ?>
    </div> 
  </div>
</section>

   <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>


  <script type="text/javascript">
  var map = null;
  var directionsDisplay = null;
  var directionsService = null;
  function initialize() {
      var myLatlng = new google.maps.LatLng(10.640739,122.968956);
      var myOptions = {
          zoom: 7,
          center: {lat:10.640739, lng:122.968956},
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();
    var input = document.getElementById('start');
    var searchBox = new google.maps.places.SearchBox(input);
    var input2 = document.getElementById('end');
    var searchBox2 = new google.maps.places.SearchBox(input2);
  }

  function getDirections(){
    var start = $('#start').val();
    var end = $('#end').val();
    if(!start || !end){
      alert("Origin and destination are required");
      return;
    }
    var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode[$('#travelMode').val()],
            unitSystem: google.maps.DirectionsUnitSystem[$('#unitSystem').val()],
            provideRouteAlternatives: true
      };
    directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setMap(map);
              directionsDisplay.setPanel($("#directions_panel").get(0));
              // console.log(response)
              directionsDisplay.setDirections(response);
              var summaryPanel = ($("#distance_panel").get(0));
        summaryPanel.innerHTML = '';
        var x = document.getElementById("rutaS");
        $('#rutaS option').remove();
              for (var j = 0; j < response.routes.length; j++){
        var option = document.createElement("option");
                var route = response.routes[j];
                // console.log(response.routes[j]);
                console.log(route)
          var routeSegment = j + 1;
          summaryPanel.innerHTML += '<b>Route ' + routeSegment + ': ';
          summaryPanel.innerHTML += route.legs[0].distance.text;
          option.text = route.legs[0].distance.text;
          option.value =route.legs[0].distance.text.substring(0,(route.legs[0].distance.text.length - 2));
          x.add(option);
          summaryPanel.innerHTML += ' (' + route.legs[0].distance.value + 'm)<br><br>';
              }
          } else {
              alert("Please place the origin and destine correctly");
          }
      });
  }
  function c(){
    var price = $('#type').val();
    var km = $('#rutaS').val();
    $('#costo').val('0');
    if (price != "" && km != "") {
          var nkm;
          if (parseFloat(km)>3) {
            nkm = parseInt(km);
            var neto = nkm * 1;
              document.getElementById('costo').value = Math.round(price) + Math.round(neto);
          }else{
            nkm = parseInt(km); // xd 3 km o menos
            document.getElementById('costo').value = price;  
          }
        }else{
          console.log("")
        }
  }
  $('#type').live('change',function(){
    c();
  });
  $('#rutaS').live('change',function(){
    c();
  });
  $('#search').live('click', function(){ getDirections(); });
  $('.routeOptions').live('change', function(){ getDirections(); });
  
  $(document).ready(function() {
      initialize();
  });

 
  </script> 
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
     center: {lat:10.640739, lng:122.968956},
          zoom: 2
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>

 