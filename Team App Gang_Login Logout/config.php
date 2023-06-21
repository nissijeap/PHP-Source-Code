<?php

$conn = mysqli_connect("127.0.0.1:3307", "root", "", "login");

if (!$conn) {
    echo "Connection Failed";
}