<?php 

include ('./test.php');

//echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location:./login.php');	
} 



?>