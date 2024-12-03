<p?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION["full_name"] : null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shekinah | Offers</title>
  <?php
  require_once __DIR__ . '/../Assets/Html_head.php';
  require_once __DIR__ . '/../Assets/Gsap_cdn.php';
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/../CSS/offers.css">

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
                <img class="ukiyo img1" src="../../Images/img13.jpg" decoding="async" />
            </section>
            <div class="contents-body">
                <p class="company-name stagger" style="--delay: 1s;"><img src="../../Images/shekinahLogo.svg"
                        alt="SHEKINAH"></p>
                <h1 class="contents-title stagger" style="--delay: 1.5s;">Offers</h1>
                <span class="contents-p stagger" style="--delay: 2s;">A good place for making unforgettable,
                    joyful
                    moments.</span>
              
            </div>
        </div>

    <main class="book-main">
        <div class="main-sec">
            <section id="event">
                <div class="content-container">
                    <!-- Image container -->
                    <div class="img-grp">
                        <img src="../../Images/amenities1.jpg" alt="Shekinah Amenities" class="resizable-img">
                    </div>

                    <!-- Content container for the lists -->
                    <div class="content-grp">
                        <div class="amenities-container">
                            <!-- List 1 -->
                            <div class="amenities-list-container">
                              <h3>Event Venue Amenities (List 1)</h3>
                              <ul class="amenities-list">
                                  <li>100 Pax capacity</li>
                                  <li>16 hours usage (includes ingress and egress)</li>
                                  <li>Infinity swimming pool with jacuzzi (jacuzzi - 2hrs only)</li>
                                  <p class="indent">- Aesthetic outdoor lounge chairs</p>
                                  <li>1 air conditioned studio room</li>
                                  <p class="indent">- Queen size bed with double bed</p>
                                  <p class="indent">- Pullout</p>
                                  <p class="indent">- 12 seaters long dining table</p>
                                  <p class="indent">- Bar area with sink</p>
                                  <p class="indent">- 2 comfort room & shower room</p>
                                  <p class="indent">- Refrigerator</p>
                                  <p class="indent">- Microwave oven</p>
                              </ul>
                          </div>

                          <!-- List 2 -->
                          <div class="amenities-list-container">
                              <h3>Event Venue Amenities (List 2)</h3>
                              <ul class="amenities-list">
                                  <li>1 non aircon pavilion - 100 Pax capacity</li>
                                  <p class="indent">- Free use of backdrops in place</p>
                                  <p class="indent">- Free use of buffet table</p>
                                  <p class="indent">- Ventilations</p>
                                  <p class="indent">- Comfort & shower room</p>
                                  <p class="indent">- Service area (sink and prep area)</p>
                                  <p class="indent">- Chairs and tables maximum of good for 100 Pax without covers</p>
                                  <p class="indent">- Free use of water dispenser with 1</p>
                                  <p class="indent">- Container purified water</p>
                                  <p class="indent">- Free use of videoke (until 10 PM only)</p>
                              </ul>
                          </div>
                    </div>
                </div>

                <div class="content-container">
                    <!-- Image container -->
                    <div class="img-grp">
                        <img src="../../Images/amenities2.jpg" alt="Shekinah Amenities" class="resizable-img">
                    </div>

                    <!-- Content container for the lists -->
                    <div class="content-grp">
                        <div class="amenities-container">
                            <!-- List 1 -->
                            <div class="amenities-list-container">
                                <h3>Pool Event - With Airconditioned
                                Studio Room Amenities (List 1)</h3>
                                <ul class="amenities-list">
                                <li>Good for 25 pax</li>
                                    <li>Infinity swimming pool with jacuzzi (Jacuzzi - 2hrs only)</li>
                                    <li>Air Conditioned studio room</li>
                                      <p class = "indent">- Queen size bed with double pull out bed</p>
                                      <p class = "indent">- 2 comfort & shower rooms</p>
                                      <p class = "indent">- Bar area with sink</p>
                                      <p class = "indent">- 12 seaters long dining table</p>
                                      <p class = "indent">- Refrigerator</p>
                                      <p class = "indent">- Microwave oven</p>
                                    <li>Open pavilion</li>
                                      <p class = "indent">- Comfort & shower room</p>
                                      <p class = "indent">- Ventilations</p>
                                      <li>Free use of water dispenser with 1 container of purified water</li>
                                      <li>Chairs and tables good for 25 pax</li>
                                </ul>
                            </div>

                            <!-- List 2 -->
                            <div class="amenities-list-container">
                                <h3>Pool Event - With Airconditioned
                                Studio Room (List 2)</h3>
                                <ul class="amenities-list">
                                    <li>Free use of videoke (strictly up to 10 PM for night guests)</li>
                                    <li>Free use of half basketball court - bring your own ball</li>
                                    <li>Open cabana cottage</li>
                                    <li>Spacious parking area</li>
                                    <li>24 hrs CCTV security camera</li>
                                    <li>Catering not allowed</li>
                                    <li>Free use of griller</li>
                                    <li>Day: 8:00 AM to 5:00 PM</li>
                                    <li>Night: 3:00 PM to 12:00 AM</li>
                                    <li>P300/HD in excess of 25 pax</li>
                                    <li>Extension: P1,000/hr</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-container">
                    <!-- Image container -->
                    <div class="img-grp">
                        <img src="../../Images/amenities3.jpg" alt="Shekinah Amenities" class="resizable-img">
                    </div>

                    <!-- Content container for the lists -->
                    <div class="content-grp">
                        <div class="amenities-container">
                            <!-- List 1 -->
                            <div class="amenities-list-container">
                                <h3>Pool Event- Non
                                Air Conditioned Amenities (List 1)</h3>
                                <ul class="amenities-list">
                                    <li>Good for 20 pax</li>
                                    <li>Infinity swimming pool with jacuzzi (jacuzzi - 2hrs only)</li>
                                      <p class="indent">- Aesthetic outdoor lounge chairs</p>
                                    <li>1 open pavilion</li>
                                      <p class="indent">- Comfort & shower room</p>
                                      <p class="indent">- Kitchen sink</p>
                                      <p class="indent">- Ventilations</p>
                                      <p class="indent">- Chairs and tables good for 20 pax</p>
                                    <li>Free use of 3 long tables</li>
                                    <li>Free use of videoke (strictly up to 10 PM for night guests)</li>
                                    <li>Free use of water dispenser with free 1 container purified water</li>
                                </ul>
                            </div>

                            <!-- List 2 -->
                            <div class="amenities-list-container">
                                <h3>Pool Event- Non
                                Air Conditioned Amenities (List 2)</h3>
                                <ul class="amenities-list">
                                      <li>Free use of griller</li>
                                      <li>Spacious parking area</li>
                                      <li>Free use of half basketball court (bring your own ball)</li>
                                      <li>24 hrs CCTV security camera</li>
                                      <li>Catering not allowed</li>
                                      <li>Day: 8:00 AM to 5:00 PM</li>
                                      <li>Night: 6:00 PM to 12:00 MN</li>
                                      <li>P250/HD in excess of 20 pax</li>
                                      <li>Extension: P800/hr</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</main>

  <?php
  require_once __DIR__ . '/../Assets/footer.php';
  require_once __DIR__ . '/../Assets/Html_footer.php';

  ?>
</body>

</html>