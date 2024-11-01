<?php 
session_start();
session_destroy();
header("location: /Shekinah.web/Pages/homepage.php");
?>