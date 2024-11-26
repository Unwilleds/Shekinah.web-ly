<?php 
session_start();
if (isset($_COOKIE["user_login"])) {
    // Unset the cookie by setting its expiration to a past time
    setcookie("user_login", "", time() - 3600, "/"); // "/" makes the cookie deletion site-wide

    // Optionally destroy the session if you are using sessions as well
    session_destroy();
}
header("location: /../Pages/homepage.php");
exit();