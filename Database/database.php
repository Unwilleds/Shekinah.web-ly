<?php

$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "Shekinah.web";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("Something went wrong!");
}

return $conn;
