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

    <main id="container">
        <div class="main">
            <section class="dissolve">
                <img class="ukiyo img1" src="../../Images/bg.png" decoding="async" />
            </section>
            <div class="contents-body">
                <p class="company-name stagger" style="--delay: 1s;"><img src="../../Images/shekinahLogo.svg"
                        alt="SHEKINAH"></p>
                <h1 class="contents-title stagger" style="--delay: 1.5s;">ABOUT US</h1>
                <span class="contents-p stagger" style="--delay: 2s;">A good place for making unforgettable,
                    joyful
                    moments.</span>
              
            </div>
            <!-- <img class="ukiyo" src="../../Images/bg4.jpg" alt=""> -->
        </div>


        <div class="about-sec">
            <center>
                <h1 class="abt-title">ABOUT US</h1>
            </center>
            <img class="ukiyo" src="../../Images/abt.jpg" alt="SHEKINAH">
            <div class="about-cont">

                <span class="f-heading">
                    <h1>
                        Ideal destination for your intimate gathering of any occassion.
                    </h1>
                    <br>
                    <p>
                        Elevate your special occasion at Shekinah Private Resort,
                        featuring luxurious amenities, impeccable service, and exciting activities,
                        including photoshoots and poolside fun, tailored for unforgettable memories.
                        <br>
                        <br>
                        Make memories at Shekinah Private Resort! High-end features, stunning decor and elegant charm &
                        exceptional service.
                        Perfect for life's special moments!
                        #CelebrateLife #ResortLife"
                    </p>
                </span>

            </div>
        </div>

        <section class="main-box">

            <div class="par4">
                <h1 class="main-title">Our Location</h1>
                <p class="main-body">Shekinah events place is located at number 49 san Ignacio st.
                    Poblacion, San Jose Del Monte City, Bulacan, near the Bulacan Standard Academy(BSA) Muzon campus.
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3857.2022048624594!2d121.04269661170288!3d14.813905371757011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397af21a45740f7%3A0x9e74e2a793a415bf!2sShekinah%20Events%20Place!5e0!3m2!1sen!2sph!4v1730966315918!5m2!1sen!2sph"
                width="700" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section class="abt-mission">
            <div class="img">
                <img class="ukiyo" src="../../Images/bg7.jpg" alt="SHEKINAH">
            </div>
            <div class="abt-div">
                <h1>Our Mission</h1>
                <p>
                    Our mission at Shekinah is to provide a memorable, seamless, and personalized experience for every
                    client.
                    We
                    take pride in transforming your vision into a reality, creating moments that you and your guests
                    will
                    cherish
                    for years to come.
                </p>
                <hr>
                <h1> Our Values</h1>
                <span class="abt-p">
                    <p>
                        <i>Excellence:</i>
                    </p>
                    <p>We strive for the highest standards in event planning and execution.</p>
                    <p><i>Creativity:</i></p>
                    <p>We encourage creativity and customization to make each event one of a kind.</p>
                    <p><i>Satisfaction:</i></p>
                    <p>Our clients’ happiness is our top priority, and we work hard to exceed their
                        expectations.</p>
                    <p><i>Community:</i></p>
                    <p>Shekinah is proud to be a part of the local community, contributing to celebrations and
                        memories
                        for families, friends, and organizations.</p>
                </span>
                <hr>

                <h1>Contact Us</h1>
                <p>
                    If you’re ready to bring your event vision to life, reach out to us today! Whether you’re planning a
                    wedding, a corporate event, or a special celebration, Shekinah has everything you need to make it
                    unforgettable.</p>
                    
            </div>
        </section>
    </main>


    <?php
    require_once __DIR__ . '/../Assets/footer.php';
    require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>

</html>