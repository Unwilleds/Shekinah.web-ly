<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION["full_name"] : null;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shekinah | About Us</title>

    <?php
    require_once __DIR__ . '/../Assets/Html_head.php';
    require_once __DIR__ . '/../Assets/Gsap_cdn.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../CSS/aboutpage.css" />

</head>

<body>
    <?php
    include '../Assets/Loading_page.php';
    showLoader();
    ?>

    <navbar-element data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
        data-username="<?= htmlspecialchars($username) ?>">
    </navbar-element>



    <?php
    require_once __DIR__ . '/../Assets/footer.php';
    require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>

</html>