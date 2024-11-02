<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION["full_name"] : null;


$registrationSuccess = isset($_SESSION["registration_success"]) ? $_SESSION["registration_success"] : null;
if ($registrationSuccess) {
  unset($_SESSION["registration_success"]);
}
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function () {
      $('#mySlowTable').load("../Assets/Loading_page.php");
    });
  </script>
</head>

<body>
  <?php
  include '../Assets/Loading_page.php';
  showLoader();
  ?>

  <navbar-element data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
    data-username="<?= htmlspecialchars($username) ?>">
  </navbar-element>
  <main>
    <section class="main" id="main2">
      <section class="home" id="home">
        <div class="contents ">
          <div class="card-image-wrapper dissolve">
            <div class="parallax "> </div>
          </div>

        </div>
        <div class="content drop-in">
          <h1>Welcome to My Parallax Website</h1>
          <p>This is a simple example of a parallax scrolling effect.</p>
        </div>
        <div class="contents">
          <div class="card-image-wrapper dissolve">
            <div class="parallax"></div>
          </div>

        </div>
        <div class="content drop-in">
          <h1>Another Section</h1>
          <p>More content goes here.</p>
        </div>

      </section>
      <!-- <div id = "box1"></div>
        <div id = "box2"></div>
        <div id = "box3"></div>
        <div id = "box4"> -->
      <!-- </div> -->


    </section>
    <section class="coolfkngthingy">
      <div class="text-cont">
        <ul class="text hidden">
          <li>R</li>
          <li class="ghost">é</li>
          <li class="ghost">p</li>
          <li class="ghost">o</li>
          <li class="ghost">n</li>
          <li class="ghost">d</li>
          <li class="ghost">e</li>
          <li class="ghost">z</li>
          <li class="spaced">S</li>
          <li class="ghost">'</li>
          <li class="ghost">i</li>
          <li class="ghost">l</li>
          <li class="spaced">V</li>
          <li class="ghost">o</li>
          <li class="ghost">u</li>
          <li class="ghost">s</li>
          <li class="spaced">P</li>
          <li class="ghost">l</li>
          <li class="ghost">a</li>
          <li class="ghost">î</li>
          <li class="ghost">t</li>
        </ul>
      </div>
    </section>

    <section id='gallery' class='gal'>
      <div id='gallery-track' class='gallery dissolve'>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1607419726991-5fc7e74cda67?q=80&w=2487&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1601042879364-f3947d3f9c16?q=80&w=2487&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1536098561742-ca998e48cbcc?q=80&w=2272&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1514439827219-9137a0b99245?q=80&w=2487&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1525790935716-36a6c45ad067?q=80&w=2487&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1561344640-2453889cde5b?q=80&w=2467&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1561602009-0ecd1cada8bd?q=80&w=2456&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1560583306-bd304a162229?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1535478044878-3ed83d5456ef?q=80&w=2382&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
        <div class='cards'>
          <div class='card-image-wrapper'>
            <img
              src='https://images.unsplash.com/photo-1610322231968-31322d42851f?q=80&w=2536&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </div>
        </div>
      </div>
    </section>
    <div class="marquee dissolve2">

      <span>
        Creative. Technology. Media. Creative. Technology. Media. Creative.
        Technology. Media. Creative. Technology. Media. Creative. Technology.
        Media.
      </span>
      <span>
        Creative. Technology. Media. Creative. Technology. Media. Creative.
        Technology. Media. Creative. Technology. Media. Creative. Technology.
        Media.
      </span>
    </div>

    <a href="/Shekinah.web/User-auth/user_logout.php" class="btn btn-danger rounded-0 scrollEffect">Logout</a>
  </main>

  <?php
  require_once __DIR__ . '/../Assets/Html_footer.php';
  ?>



</body>

</html>