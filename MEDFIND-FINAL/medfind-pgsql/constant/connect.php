<?php 

$host = "localhost";
$port = "5432";
$dbname = "medfind6";
$user = "postgres";
$password = "538810"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$pharm = "";
if(isset($_SESSION['userId'])){

  $sql="SELECT pharmacy from users where  id='".$_SESSION['userId']."'";
  $result=pg_query($dbconn, $sql); 
 $row = pg_fetch_array($result);
  $pharm = $row['pharmacy'];

}
?>





