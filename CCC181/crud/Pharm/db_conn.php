<?php  

$db = mysqli_connect("localhost", "root", "", "app_gang");

if (!$db) {
	echo "Connection failed!";
}