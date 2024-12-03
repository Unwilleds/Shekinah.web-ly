<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION["full_name"] : null;
$imageCount = 24; // Total number of images


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shekinah | Gallery</title>

    <?php
    require_once __DIR__ . '/../Assets/Html_head.php';
    require_once __DIR__ . '/../Assets/Gsap_cdn.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../CSS/gallery.css" />

</head>

<body>
    <?php
    include '../Assets/Loading_page.php';
    showLoader();
    ?>

    <navbar-element data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
        data-username="<?= htmlspecialchars($username) ?>">
    </navbar-element>

    <main id="container">
        <div class="main">
            <section class="dissolve">
                <img class="ukiyo img1" src="../../Images/bg.png" decoding="async" />
            </section>
            <div class="contents-body">
                <p class="company-name stagger" style="--delay: 1s;"><img src="../../Images/shekinahLogo.svg"
                        alt="SHEKINAH"></p>
                <h1 class="contents-title stagger" style="--delay: 1.5s;">SHEKINAH GALLERY</h1>
              
            </div>
            <!-- <img class="ukiyo" src="../../Images/bg4.jpg" alt=""> -->
        </div>

        <div class="gallery-container">
        <div class="gallery">
            <?php
            for ($i = 1; $i <= $imageCount; $i++) {
                echo '<div class="gallery-item">';
                echo '<img src="../../Images/img' . $i . '.jpg" alt="Shekinah Gallery Image ' . $i . '">';
                echo '</div>';
            }
            ?>
        </div>
        </div>
    </div>
    </main>
    
    <?php
    require_once __DIR__ . '/../Assets/footer.php';
    require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
    <script src="../JS/gallery.js" defer></script>
</body>

</html>