<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION["full_name"] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shekinah | Booking</title>

  <?php
  require_once __DIR__ . '/../Assets/Html_head.php';
  require_once __DIR__ . '/../Assets/Gsap_cdn.php';

  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../CSS/bookpage.css" />
</head>

<body>

  <?php
  include '../Assets/Loading_page.php';
  showLoader();
  ?>

  <navbar-element data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>">
  </navbar-element>


  <?php
  // if (isset($_POST["finish-button"]) == "submit") {
  //   // Get input values from POST request
  
  //   $dom = new DOMDocument();
  //   // Get the strong element 
  //   $calendar = $dom->getElementById('daySelected');
  //   // Get the attribute 
  //   $valueDay = $calendar->getAttribute('data-date');
  //   $event = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  //   $full_name = filter_var($_POST["full_name"], FILTER_SANITIZE_STRING);
  //   $guest_count = filter_var($_POST["guest"], FILTER_VALIDATE_INT);
  //   $phone_number = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
  //   $time = filter_var($_POST["timeActive"], FILTER_SANITIZE_STRING);
  
  //   // Database connection
  //   require_once __DIR__ . "/../Database/database.php";
  
  //   // Use a prepared statement to prevent SQL injection
  //   $sql = "INSERT INTO booking_record (event, full_name, guest, phone, date, time) 
  //           VALUES (?, ?, ?, ?, ?, ?)";
  //   $stmt = $conn->prepare($sql);
  
  //   if ($stmt) {
  //     $stmt->bind_param('ssisss', $event, $full_name, $guest_count, $phone_number, $valueDay, $time);
  
  //     if ($stmt->execute()) {
  //       echo "New record created successfully for event \"$event\" on \"$valueDay\" at \"$time\" with guest count \"$guest_count\".";
  //     } else {
  //       echo "Error: {$stmt->error}";
  //     }
  //   } else {
  //     echo "Error preparing the statement: {$conn->error}";
  //   }
  // }
  

  // Handle email (if applicable)
  $email = $_SESSION["email"] ?? '';
  ?>


  <div class='err'>
    <div class='errors e1' style="display: none">Please fill all required fields before finishing.</div>
    <div class='errors e2' style="display: none">Insufficient payment amount!</div>
    <div class='errors e3' style="display: none">Please complete all required fields before proceeding.</div>
    <div class='errors e4' style="display: none">Please complete all required sections before proceeding.</div>
    <div class='success e5' style="display: none">Booking completed successfully!</div>
    <div class='danger e6' style="display: none">Booking failed! please try again.</div>
  </div>
  <main id="container">
    <div class="fv">
      <section class="s1 dissolve">
        <img class="ukiyo img1" src="/../Images/bg.png" decoding="async" />
      </section>
      <div class="contents-body">
        <p class="company-name stagger" style="--delay: 1s;"><img src="/../Images/shekinahLogo.svg" alt="SHEKINAH"></p>
        <span class="contents-title stagger" style="--delay: 1.5s;">A good place for making unforgettable, joyful
          moments.</span>
        <button class="button parallax-btn stagger" style="--delay: 2s;">BOOK NOW</button>
      </div>
    </div>
    <div class="modal">
      <div class="modal-content">
        <!-- Sidebar for navigation -->
        <div class="sidebar">
          <h2>Booking Procedure</h2>
          <ul>
            <li class="active">Event Type</li>
            <li>Date & Time</li>
            <li>Information</li>
            <li>Payments</li>
            <li>Summary</li>
          </ul>
        </div>
        <!-- Main content area -->
        <div class="main-contents">
          <!-- Service Selection Section -->
          <div id="service-selection" class="section">
            <section>
              <h2>Event Type Selection</h2>
              <label for="service">Amenities:</label>
              <select id="service" name="service">
                <option class="disabled" value="0" disabled selected="true">
                  Please select a event type.
                </option>
                <option value="event" data-price="₱25,000">
                  Event Package
                </option>
                <option value="pool-non-ac" data-price="₱7,500">
                  Pool Event - Non Airconditioned
                </option>
                <option value="pool-ac" data-price="₱12,000">
                  Pool Event - With Airconditioned Studio Room
                </option>
              </select>

              <div class="event-summary" id="event-summary"></div>
            </section>
            <div class="navigation-buttons">
              <button id="service-next" class="next-button">Next</button>
            </div>
          </div>

          <!-- Date & Time Section -->
          <div id="date-time-section" class="section hidden">
            <main class="date-time-main" id="date-time-main">
              <h2>Select Date & Time</h2>
              <section class="calendar-section" id="calendar-section">
                <div class="calendar">
                  <div class="calendar-header">
                    <button id="prev-month" aria-label="Previous Month">
                      &lt;
                    </button>
                    <select id="month-selector" aria-label="Select Month"></select>
                    <select id="year-selector" aria-label="Select Year"></select>
                    <button id="next-month" aria-label="Next Month">
                      &gt;
                    </button>
                  </div>
                  <div class="calendar-days-header">
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                    <span>Sun</span>
                  </div>
                  <div class="calendar-days"></div>
                  <div class="time-slots"></div>
                </div>
                <!-- Close .calendar -->
              </section>

              <section class="time-section" id="time-section">
                <!-- <button class="time-btn" value="Day (8am - 5pm)">
                </button>
                <button class="time-btn" value="Night (6pm - 12mn)">
                </button>
                <button class="time-btn" value="Whole Day (8am - 12mn)">
                </button> -->
              </section>
            </main>
            <div class="navigation-buttons">
              <button id="date-time-prev" class="prev-button" aria-label="Previous Section">
                Previous
              </button>
              <button id="date-time-next" class="next-button" aria-label="Next Section">
                Next
              </button>
            </div>
          </div>

          <!-- Your Information Section -->
          <div id="your-info" class="section hidden">
            <section>
              <h2>Information</h2>
              <form id="user-info-form" autocomplete="off">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required />
                <label for="guest">Guests: </label>
                <input type="number" id="guest" name="guest" />
                <label for="phone">Phone Number:</label>
                <input type="number" id="phone" minlength="11" name="phone" required />


                <div class="btn_container">
                  <label for="terms&conditions"><input type="checkbox" id="terms&conditions"><a class="open_button"
                      href="#!">Terms & Conditions<span style="color:red">*</span></a></label>

                </div>
                <div class="modal_info">
                  <h1>TERMS AND CONDITION
                  </h1>
                  <div class="modal-body">
                <h4>Payment Policy</h4>
                <ul>
                    <li>50% Reservation Fee to book the date.</li>
                    <li>50% to pay 3 days before the event.</li>
                    <li>Security Deposit of P10,000 to be added in the reservation fee. Refundable upon check-out after checking for any losses or damages at the property.</li>
                    <li>Maximum capacity of the venue is 100 PAX.</li>
                </ul>

                <h4>Cancellation Policy</h4>
                <ul>
                    <li>30 days prior to the event: 15% (P3,750) cancellation fee shall be deducted from the refund.</li>
                    <li>14 days prior to the event: 50% (P6,250) of the reservation fee shall be forfeited. The rest of the payment shall be refunded.</li>
                    <li>7 days to 24 hours prior to the event: No refund shall be allowed. One-time free rebooking is allowed subject to availability. Subsequent rescheduling incurs a fee of P500.00 each.</li>
                    <li>Cancellations caused by government lockdowns or restrictions: One-time free rescheduling is allowed, subject to availability. No refund is available.</li>
                </ul>

                <h4>Venue Design and Styling</h4>
                <ul>
                    <li>Ceiling treatments, adhesives, and nailing are not allowed.</li>
                    <li>Balloons or flowers are not allowed to float in the pool.</li>
                    <li>Backdrops present in the venue are free to use.</li>
                    <li>Buffet and dining tables are non-movable except for furniture beside the pool.</li>
                </ul>

                <h4>Time</h4>
                <ul>
                    <li>Venue usage is 16 hours, including ingress and egress, between 8:00 AM and 12:00 MN.</li>
                    <li>Time extension: P1,000 per hour.</li>
                </ul>

                <h4>Liquor and Corkage</h4>
                <ul>
                    <li>Liquors are available for sale inside the premises. Bringing liquor incurs corkage fees.</li>
                    <li>Mobile bar corkage: P1,000.00.</li>
                    <li>Free corkage for one party cart using electricity. Succeeding carts: P500 each.</li>
                </ul>

                <h4>Additional Notes</h4>
                <ul>
                    <li>Inflatable pool/playground: P1,000 each.</li>
                    <li>Catering services must leave the venue in the same condition as arrival. Damages or losses will be charged to the client.</li>
                    <li>Pets are not allowed to swim in the pool.</li>
                    <li>Please treat the venue as your own home.</li>
                </ul>
            </div>
                </div>
                <div class="modal_overlay">
                </div>


                <label for="notes">Notes:</label>
                <textarea name="notes" id="notes" name="notes" rows="4"></textarea>
              </form>
            </section>
            <div class="navigation-buttons">
              <button id="your-info-prev" class="prev-button">Previous</button>
              <button id="your-info-next" class="next-button">Next</button>
            </div>
          </div>

          <!-- Payment Section -->
          <div id="payments" class="section hidden">
            <section>
              <h2>Payments</h2>
              <form id="payment-form">
                <label for="payment-method">Payment Method:</label>
                <select id="payment-method">
                  <option class="disabled" value="" disabled selected="true">
                    Select Payment Method
                  </option>
                  <option value="On-Site Payment">On-Site Payment</option>
                  <option value="Online Payment">Online Payment</option>
                </select>
                <div class="payment" id="payment" style="display: none">
                  <select id="payment-method-online">
                    <option value="Paymaya">BDO</option>
                    <option value="Paypal">BPI</option>
                    <option value="Gcash">Gcash</option>
                  </select>
                  <div class="amount">
                    <input id="amounts" type="number" inputmode="numeric" pattern="\d*" placeholder="Input Amount" />
                  </div>
                  <a class="payNow">Pay Now</a>
                </div>
              </form>

              <div class="onsite-payment" id="onsite-payment" style="display: none">
                <h3>Receipt</h3>
                <div>Event Type: <span class="event"></span></div>
                <div>Sub Total: <span class="subTotal"></span></div>
                <div><strong>Total: <span class="total"></span></strong></div>
              </div>
              <div class="online-payment-group" id="online-payment-group" style="display: none">
                <h3>Receipt</h3>

                <div>Event Type: <span class="event"></span></div>
                <div>E-wallet: <span class="eWallet">Paymaya</span></div>
                <div>Sub Total: <span class="subTotal"></span></div>
                <div><strong>Total: <span class="total"></span></strong></div>
                <div class="online-payment" id="online-payment" style="display: none">
                  <hr />
                  <div>Amount Paid: ₱<span class="paid"></span></div>
                  <div>Balace: <span class="balance"></span></div>
                </div>
              </div>
            </section>
            <div class="navigation-buttons">
              <button id="payments-prev" class="prev-button">Previous</button>
              <button id="payments-next" class="next-button finish">
                Next
              </button>
            </div>
          </div>

          <!-- Summary Section -->
          <div id="summary" class="section hidden">
            <section>
              <h2>Summary</h2>
              <p><strong>Event:</strong> <span id="summary-service"></span></p>
              <p><strong>Date:</strong> <span id="summary-date"></span></p>
              <p><strong>Time:</strong> <span id="summary-time"></span></p>
              <p><strong>Name:</strong> <span id="summary-name"></span></p>
              <p><strong>Email:</strong> <span id="summary-email" data-email="<?= $email ?>"></span></p>
              <p>
                <strong>Payment Method:</strong>
                <span id="summary-payment"></span>
              </p>
            </section>
            <div class="navigation-buttons">
              <button id="summary-prev" class="prev-button">Previous</button>
              <button id="finish-button" class="finish-button">
                Finish Booking
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
  require_once __DIR__ . '/../Assets/footer.php';
  require_once __DIR__ . '/../Assets/Html_footer.php';
  ?>
  <script src="../JS/bookpage.js" defer></script>


</body>

</html>