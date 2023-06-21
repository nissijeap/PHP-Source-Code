
<?php 
include('./constant/connect.php');

$pharm_id = $_GET['id'];
$sql = 'SELECT direction from pharmacy_details where pharm_id = ' . $pharm_id . '';
$result = $connect->query($sql);
foreach($result as $row){
    $direction = $row['direction'];
}

if (isset($_POST["submit"])) {

    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    echo $latitude;
    echo $longitude;
    header("location: https://www.google.com/maps/dir/$latitude,$longitude$direction");

    }


?>

</head>

<body onload = "getLocation();">



<form class="myForm" action="" method="post" autocomplete="off">

<label for="">Name</label>
<input type="text" name="latitude" value=""> 
<input type="text" name="longitude" value=""> <br>
<button type="submit" name="submit">Get Direction</button>
</form>

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


</body>
</html>