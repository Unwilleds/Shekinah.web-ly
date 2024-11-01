
<?php
session_start();

    $isLoggedIn = isset($_SESSION['user']);
    $username = $isLoggedIn ? $_SESSION["full_name"]: null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once __DIR__ . '/../Assets/Html_head.php';
        require_once __DIR__ . '/../Assets/Gsap_cdn.php';
    ?>
</head>
<body class="scroll-container">
    <navbar-element 
    data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
    data-username="<?= htmlspecialchars($username) ?>">
    </navbar-element>



    <section class="scroll-item">
        <h1>Welcome to My Parallax Website</h1>
        <p>This is a simple example of a horizontal scrolling effect.</p>
    </section>
    <section class="scroll-item">
        <h1>Another Section</h1>
        <p>More content goes here.</p>
    </section>
    <!-- Add more sections as needed -->


    <a href="/Shekinah.web/User-auth/user_logout.php">Logout</a>

    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>
</html>
