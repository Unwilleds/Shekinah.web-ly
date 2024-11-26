
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
    <title>Shekinah | Services</title>
    <?php
        require_once __DIR__ . '/../Assets/Html_head.php';
        require_once __DIR__ . '/../Assets/Gsap_cdn.php';
    ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 
</head>

<body >
  <?php
  include '../Assets/Loading_page.php';
  showLoader();
  ?>
   <navbar-element data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
    data-username="<?= htmlspecialchars($username) ?>">
  </navbar-element>

  <main class="book-main">
  <center>
        <div class="h1"> COMING SOON!!</div>
      </center>
      </main>
    <footer>
    <div class="site-footer">
      <div class="stack">
        <p class="logo-name">Shekinah Event Place Rental</p>
        <p class="location">
          49 San Ignacio St, Poblacion, <br />San Jose del Monte City, Bulacan
        </p>
      </div>
      <div class="site-link-group">
        <ul class="site-links">
          <li><a class="link" href="">About Us</a></li>
          <li><a class="link" href="">Inquire</a></li>
          <li><a class="link" href="">FAQ's</a></li>
        </ul>
        <ul class="social-links">
          <li>
            <a class="socials" href=""><i class="fa-brands fa-facebook"></i></a>
          </li>
          <li>
            <a class="socials" href=""><i class="fa-brands fa-instagram"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="bottom-footer">
      <p class="text-link">
        <a href="">Contact</a>
        |
        <a href="">Imprint</a>
        |
        <a href="">Data Privacy</a>
      </p>
      <p class="company-name stagger" style="--delay: 1s">Shekinah</p>
    </div>
    <a href='#top' class="goUp"><i class="fa-solid fa-arrow-up"></i></a>
  </footer>

  
    <?php
        require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>
</html>
