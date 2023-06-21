 <?php

include('./constant/connect.php');
session_start();


if(isset($_SESSION['userId'])){

  $sql="SELECT pharmacy from users where  id='".$_SESSION['userId']."'";
  $result=pg_query($dbconn, $sql); 
 $row = pg_fetch_array($result);
  $pharm = $row['pharmacy'];

}

    





?>