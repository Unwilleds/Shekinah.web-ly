
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
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="../CSS/offers.css">
  <link rel="stylesheet " type="text/css" href="..x1/CSS/style.css">
 
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
      <div class="main-sec">
  <section id="event">
    <div class="content-container">
      <!-- Image container -->
      <div class="img-grp">
        <img src="../../Images/amenities1.png" alt="Shekinah" class="resizable-img">
      </div>

      <!-- Content container for the lists -->
      <div class="content-grp">
        <div class="amenities-container">
          <!-- List 1 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 1)</h3>
            <ul class="amenities-list">
              <li><strong>Capacity:</strong> 100 Pax capacity</li>
              <li><strong>Usage Time:</strong> 16 hours usage (includes ingress and egress)</li>
              <li><strong>Swimming Pool:</strong> Infinity swimming pool with jacuzzi (Jacuzzi 2hrs only)</li>
              <li><strong>Outdoor Lounge Chairs:</strong> Aesthetic outdoor lounge chairs</li>
              <li><strong>Studio Room:</strong> 1 airconditioned studio room</li>
              <li><strong>Bed:</strong> Queen size bed with double bed pullout</li>
              <li><strong>Dining Table:</strong> 12 seaters long dining table</li>
              <li><strong>Bar Area:</strong> Bar area with sink</li>
              <li><strong>Restrooms:</strong> 2 comfort room & shower room</li>
              <li><strong>Refrigerator:</strong> Refrigerator</li>
              <li><strong>Microwave Oven:</strong> Microwave oven</li>
              <li><strong>Non Aircon Pavilion:</strong> 1 Non aircon pavilion - 100 Pax capacity</li>
              <li><strong>Backdrops:</strong> Free use of backdrops in place</li>
              <li><strong>Buffet Table:</strong> Free use of buffet table</li>
            </ul>
          </div>

          <!-- List 2 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 2)</h3>
            <ul class="amenities-list">
              <li><strong>Ventilation:</strong> Ventilations</li>
              <li><strong>Comfort & Shower:</strong> Comfort & shower room</li>
              <li><strong>Service Area:</strong> Service area (sink and prep area)</li>
              <li><strong>Chairs and Tables:</strong> Chairs and tables maximum of good for 100 Pax (without covers)</li>
              <li><strong>Water Dispenser:</strong> Free use of water dispenser with 1 container purified water</li>
              <li><strong>Videoke:</strong> Free use of videoke (until 10pm only)</li>
              <li><strong>Cabana:</strong> Open cabana cottage</li>
              <li><strong>Parking:</strong> Spacious parking area</li>
              <li><strong>CCTV:</strong> 24 hrs CCTV camera</li>
              <li><strong>Griller:</strong> Free use of griller</li>
              <li><strong>Event Policy:</strong> 1 event per day policy</li>
              <li><strong>Extension:</strong> Extension P1,000/hr</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

      </section>
      <div class="main-sec">
  <section id="event">
    <div class="content-container">
      <!-- Image container -->
      <div class="img-grp">
        <img src="../../Images/amenities1.png" alt="Shekinah" class="resizable-img">
      </div>

      <!-- Content container for the lists -->
      <div class="content-grp">
        <div class="amenities-container">
          <!-- List 1 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 1)</h3>
            <ul class="amenities-list">
              <li><strong>Capacity:</strong> 100 Pax capacity</li>
              <li><strong>Usage Time:</strong> 16 hours usage (includes ingress and egress)</li>
              <li><strong>Swimming Pool:</strong> Infinity swimming pool with jacuzzi (Jacuzzi 2hrs only)</li>
              <li><strong>Outdoor Lounge Chairs:</strong> Aesthetic outdoor lounge chairs</li>
              <li><strong>Studio Room:</strong> 1 airconditioned studio room</li>
              <li><strong>Bed:</strong> Queen size bed with double bed pullout</li>
              <li><strong>Dining Table:</strong> 12 seaters long dining table</li>
              <li><strong>Bar Area:</strong> Bar area with sink</li>
              <li><strong>Restrooms:</strong> 2 comfort room & shower room</li>
              <li><strong>Refrigerator:</strong> Refrigerator</li>
              <li><strong>Microwave Oven:</strong> Microwave oven</li>
              <li><strong>Non Aircon Pavilion:</strong> 1 Non aircon pavilion - 100 Pax capacity</li>
              <li><strong>Backdrops:</strong> Free use of backdrops in place</li>
              <li><strong>Buffet Table:</strong> Free use of buffet table</li>
            </ul>
          </div>

          <!-- List 2 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 2)</h3>
            <ul class="amenities-list">
              <li><strong>Ventilation:</strong> Ventilations</li>
              <li><strong>Comfort & Shower:</strong> Comfort & shower room</li>
              <li><strong>Service Area:</strong> Service area (sink and prep area)</li>
              <li><strong>Chairs and Tables:</strong> Chairs and tables maximum of good for 100 Pax (without covers)</li>
              <li><strong>Water Dispenser:</strong> Free use of water dispenser with 1 container purified water</li>
              <li><strong>Videoke:</strong> Free use of videoke (until 10pm only)</li>
              <li><strong>Cabana:</strong> Open cabana cottage</li>
              <li><strong>Parking:</strong> Spacious parking area</li>
              <li><strong>CCTV:</strong> 24 hrs CCTV camera</li>
              <li><strong>Griller:</strong> Free use of griller</li>
              <li><strong>Event Policy:</strong> 1 event per day policy</li>
              <li><strong>Extension:</strong> Extension P1,000/hr</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


      </section>
      <div class="main-sec">
  <section id="event">
    <div class="content-container">
      <!-- Image container -->
      <div class="img-grp">
        <img src="../../Images/amenities1.png" alt="Shekinah" class="resizable-img">
      </div>

      <!-- Content container for the lists -->
      <div class="content-grp">
        <div class="amenities-container">
          <!-- List 1 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 1)</h3>
            <ul class="amenities-list">
              <li><strong>Capacity:</strong> 100 Pax capacity</li>
              <li><strong>Usage Time:</strong> 16 hours usage (includes ingress and egress)</li>
              <li><strong>Swimming Pool:</strong> Infinity swimming pool with jacuzzi (Jacuzzi 2hrs only)</li>
              <li><strong>Outdoor Lounge Chairs:</strong> Aesthetic outdoor lounge chairs</li>
              <li><strong>Studio Room:</strong> 1 airconditioned studio room</li>
              <li><strong>Bed:</strong> Queen size bed with double bed pullout</li>
              <li><strong>Dining Table:</strong> 12 seaters long dining table</li>
              <li><strong>Bar Area:</strong> Bar area with sink</li>
              <li><strong>Restrooms:</strong> 2 comfort room & shower room</li>
              <li><strong>Refrigerator:</strong> Refrigerator</li>
              <li><strong>Microwave Oven:</strong> Microwave oven</li>
              <li><strong>Non Aircon Pavilion:</strong> 1 Non aircon pavilion - 100 Pax capacity</li>
              <li><strong>Backdrops:</strong> Free use of backdrops in place</li>
              <li><strong>Buffet Table:</strong> Free use of buffet table</li>
            </ul>
          </div>

          <!-- List 2 -->
          <div class="amenities-list-container">
            <h3>Event Venue Amenities (List 2)</h3>
            <ul class="amenities-list">
              <li><strong>Ventilation:</strong> Ventilations</li>
              <li><strong>Comfort & Shower:</strong> Comfort & shower room</li>
              <li><strong>Service Area:</strong> Service area (sink and prep area)</li>
              <li><strong>Chairs and Tables:</strong> Chairs and tables maximum of good for 100 Pax (without covers)</li>
              <li><strong>Water Dispenser:</strong> Free use of water dispenser with 1 container purified water</li>
              <li><strong>Videoke:</strong> Free use of videoke (until 10pm only)</li>
              <li><strong>Cabana:</strong> Open cabana cottage</li>
              <li><strong>Parking:</strong> Spacious parking area</li>
              <li><strong>CCTV:</strong> 24 hrs CCTV camera</li>
              <li><strong>Griller:</strong> Free use of griller</li>
              <li><strong>Event Policy:</strong> 1 event per day policy</li>
              <li><strong>Extension:</strong> Extension P1,000/hr</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

      </section>
      </div>
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
