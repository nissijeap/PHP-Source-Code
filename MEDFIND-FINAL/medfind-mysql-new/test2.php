<?php

include('./constant/connect.php');


$med_name = 'Semithine';

$med1 = '';
  $sql="SELECT med_name from medicine where  med_name = '".$med_name."'";
 
  $result=$db3->query($sql); 

if(!$result){
  echo "Med not available";
} else {
 $row = mysqli_fetch_array($result);
 $med = $row['med_name'];
  echo $row['med_name'];
}
  

  if($med == null) {
    echo "No medicine";
  } else {
    $sql1="SELECT pharm_name from pharmacy_details";
    $result1=$db3->query($sql1);
    $row1 = mysqli_fetch_array($result1);
    echo $row1['pharm_name'];

  }

 
  $result=$db2->query($sql); 

if(!$result){
  echo "Med not available";
} else {
 $row = mysqli_fetch_array($result);
 $med = $row['med_name'];
  echo $row['med_name'];
}
  

  if($med == null) {
    echo "No medicine";
  } else {
    $sql1="SELECT pharm_name from pharmacy_details";
    $result1=$db2->query($sql1);
    $row1 = mysqli_fetch_array($result1);
    echo $row1['pharm_name'];

  }
    





?>