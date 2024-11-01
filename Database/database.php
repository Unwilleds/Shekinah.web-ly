<?php

$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login-register";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("Something went wrong!");
}

return $conn;
?>