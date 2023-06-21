<?php  

include "db_conn.php";

$sql = "SELECT * FROM medicine ORDER BY med_id";
$result = mysqli_query($db, $sql);

