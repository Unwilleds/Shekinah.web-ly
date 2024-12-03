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
  <title>Shekinah | Home</title>
  <?php
  require_once __DIR__ . '/../Assets/Html_head.php';
  require_once __DIR__ . '/../Assets/Gsap_cdn.php';
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../CSS/homepage.css" />

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
    <div class="fv">
      <section class="s1 dissolve">
        <video loop="true" autoplay="autoplay" muted>
          <source src="../../Images/shekinahVid.mp4" type="video/mp4">
          <source src="../../Images/shekinahVid.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
      </section>
      <div class="contents-body">
        <p class="company-name stagger" style="--delay: 1s;"><img src="../../Images/shekinahLogo.svg" alt="SHEKINAH">
        </p>
        <span class="contents-title stagger" style="--delay: 1.5s;">A good place for making unforgettable, joyful
          moments.</span>
        <a href="/../Pages/bookpage.php" class="button parallax-btn stagger" style="--delay: 2s;">BOOK NOW</a>
      </div>
    </div>


    <section class="img-content">

      <img class="ukiyo img-side" data-u-speed="2" data-u-scale="1.3" data-u-willchange decoding="async"
        src="../../Images/bg4.jpg" />

      <div class="main-content drop-in">
        <h1 class="main-title">Welcome to the Shekinah event place rental</h1>
        <div class="vl"></div>
        <p class="main-body">
          Discover the ideal backdrop for your unforgettable special events at our exquisite venue, where every detail
          is meticulously designed to enhance your experience. Immerse yourself in the serene ambiance of our stunning
          pool, which serves as a picturesque centerpiece for your gathering, providing a tranquil and inviting
          atmosphere.</p>
        <a href="/../Pages/aboutpage.php" class="button black">Learn more</a>

      </div>
    </section>

    <div class="par1">

      <h1 class="main-title">Event Offerings at Shekinah</h1>

    </div>
    <div class="main-content drop-in">

      <div class="page-content">
        <div class="main-card">
          <div class="card-content">
            <h2 class="card-title">Weddings</h2>
            <p class="copy">Celebrate your love story in a breathtaking setting with beautiful ceremony and stunning
              decor.</p>
            <button class="card-body button"><a href="bookpage.php">Book Now</a></button>
          </div>
        </div>
        <div class="main-card">
          <div class="card-content">
            <h2 class="card-title">Themed Parties</h2>
            <p class="copy">From seasonal celebrations to costume parties, our venue transforms into a vibrant space
              tailored to your theme.</p>
            <button class="card-body button"><a href="bookpage.php">Book Now</a></button>
          </div>
        </div>
        <div class="main-card">
          <div class="card-content">
            <h2 class="card-title">Family Reunions</h2>
            <p class="copy">Bring your family together for a fun-filled reunion at our venue.</p>
            <button class="card-body button"><a href="bookpage.php">Book Now</a></button>
          </div>
        </div>
        <div class="main-card">
          <div class="card-content">
            <h2 class="card-title">Pool Parties</h2>
            <p class="copy">Dive into fun with our exciting pool parties! Our poolside area provides a vibrant
              atmosphere for enjoying. </p>
            <button class="card-body button"><a href="bookpage.php">Book Now</a></button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <section class="content">
      <div class="social-content">
        <h1 class="main-title"> The Shekinah on Social
        </h1>
        <a href="https://www.facebook.com/shekinaheventsplace" target="_blank">Check us on facebook<span>→</span></a>
      </div>
     
      <div class="list">
        <img class="ukiyo" src="../../Images/img1.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img2.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img3.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img4.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img5.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img6.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img7.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img8.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img9.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img10.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img11.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img12.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img13.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img14.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img15.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img16.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img17.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img18.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img19.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img20.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img21.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img22.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img23.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img24.jpg" alt="Shekinah"></img>
        <img class="ukiyo" src="../../Images/img25.jpg" alt="Shekinah"></img>

        <!-- <a href="https://www.facebook.com/photo.php?fbid=511398648143492&set=pb.100078200832295.-2207520000&type=3" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/458225021_511401764809847_2394389677825235738_n.jpg?stp=cp6_dst-jpg&_nc_cat=107&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeHmElnIBAcM3ERK3nO-ZNT0z19kClaL_vXPX2QKVov-9SEJAOJDU4BS1OPinrZYYNKDkEUt3aUXNoU1vP8dj3_c&_nc_ohc=5bb6g3L9VvkQ7kNvgEMwSR3&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=AXSisI8a3x7EF0tacaOLX7l&oh=00_AYCFyxuW8rbRFXXgr4QUyWQ3eoDRGCvm2HiTTlQFNpxTig&oe=6742313B"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo.php?fbid=511398268143530&set=pb.100078200832295.-2207520000&type=3" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/458302127_511401558143201_6561597170170346683_n.jpg?stp=cp6_dst-jpg&_nc_cat=104&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeH8NLO37phqHq5zS1_Xi-Q1QXSsQ1nVy1ZBdKxDWdXLVr013fAsDsStDwNqFcyWlW0Orgu0tXMVZ8i5i5p_iyfQ&_nc_ohc=Db_7mxkqaTgQ7kNvgFXYI0S&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AuOgarueo3s3IEFj4vqOK68&oh=00_AYAUSrcLMhIaHhudvRMRHclQyOQcPP6ZHp8ki9PTNnLp-Q&oe=674237DB"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo.php?fbid=511397808143576&set=pb.100078200832295.-2207520000&type=3" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-5.fna.fbcdn.net/v/t39.30808-6/458189299_511401268143230_2506920821209545155_n.jpg?stp=cp6_dst-jpg&_nc_cat=102&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeGiJZwKCNkE5DkcYT4FQZatFX68RULSxokVfrxFQtLGiYyiDWPzbOCRBt8dGVYGD8kGuQ_8IiD6DNOiPvYW-L8g&_nc_ohc=03Iqy3-bmOUQ7kNvgEygKTB&_nc_zt=23&_nc_ht=scontent.fmnl17-5.fna&_nc_gid=AMeYZkFPiH4s_8kGm2f3gFN&oh=00_AYB5TWNZarvAwiM9VU98brltpDN0Y7hBwt8WneClKjwHCw&oe=67420ADE"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo.php?fbid=511397611476929&set=pb.100078200832295.-2207520000&type=3" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-5.fna.fbcdn.net/v/t39.30808-6/458176987_511401181476572_8415535587965108760_n.jpg?stp=cp6_dst-jpg&_nc_cat=102&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeEe2YuZrHxIoXFpu2EOju5ATYvHoxBN1CRNi8ejEE3UJHxBOlTVLk1w6bg0Xkb58rrN83IrumwZyI8AG7L4hGTO&_nc_ohc=DnrBucVv6wgQ7kNvgGnAMv4&_nc_zt=23&_nc_ht=scontent.fmnl17-5.fna&_nc_gid=Ar_9rPbXlVFf1o2SEXVTAy3&oh=00_AYBOwNhLWBiNPrCr-yhaBGrfH6wvtWs3EMtaCjH9y-mAYQ&oe=67422D98"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo.php?fbid=437288415554516&set=pb.100078200832295.-2207520000&type=3" target="_blank"> <img class="ukiyo"
            src="../../Images/bg.png"
            alt="Shekinah Images" />
        </a>
        
        <a href="https://www.facebook.com/photo/?fbid=413292841287407&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/432784067_413292834620741_218664837115148881_n.jpg?stp=cp6_dst-jpg&_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeE8Zg3-Benrhjh9fTMHZ0J_gZwDH_hgtwOBnAMf-GC3A7xAapDPjB153BWjdNGq2U4fm2cN7Nhuvf12BYPPC2Y5&_nc_ohc=NmecatYSAjsQ7kNvgGLQ0Ud&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AaCHhJ78yMEWlqV4PYSMxB2&oh=00_AYAXwQdgwgU4DL0OnIYHGkeouIfbKOlg6-l1vVVEzK6BUw&oe=67423501"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo/?fbid=388238700459488&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-5.fna.fbcdn.net/v/t39.30808-6/425684781_388238670459491_9098100581519735962_n.jpg?stp=cp6_dst-jpg&_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEladrzITPvdr3XWgbEk0rUQ9KcQnJfimVD0pxCcl-KZbvCZL8uPizvh6qZT05UEWIIa7rXWokXx8ZuTfWQkiSp&_nc_ohc=GjETwg20aOIQ7kNvgHRrprT&_nc_zt=23&_nc_ht=scontent.fmnl17-5.fna&_nc_gid=Ap1i5wDZaJwv-PHM-n2WByH&oh=00_AYD9_QvochWJyYkCSCp04PxXPth0QU1o3eeJa-DZF7fLFQ&oe=674211F3"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo/?fbid=388238697126155&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/425713093_388238673792824_7531186060798231571_n.jpg?stp=cp6_dst-jpg&_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEVCVHxDQv-Ksy4moqKRn4CAQMwQLX587UBAzBAtfnztWefhJfN1nwbaA9l8A_k-sgmEoTvE-RjFBclf-QPP45h&_nc_ohc=QZJsyX_Y6hEQ7kNvgGA5Xaf&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=A5yHZRJc4Et3NyUJE8HjGfb&oh=00_AYDy6UADdMHSULZ7tkSX6K225ASyEh8luxpAVvJbp2xXCw&oe=67422095"
            alt="Shekinah Images" />
        </a>
        <a href="https://www.facebook.com/photo/?fbid=388238690459489&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-6/425696590_388238663792825_8071195443924802863_n.jpg?stp=cp6_dst-jpg&_nc_cat=100&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFbEDItZgKrL5f8o7s8rvlSmzVlpx5FqkWbNWWnHkWqRS5byn9rspkdY6o-bvenD_ft0PwgLIWux0TW4T6YT96T&_nc_ohc=7PSyYP6Ikf4Q7kNvgGOmE7I&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=AwBt-SODE14SzvPCKD3m1AF&oh=00_AYAbNXLdXbB8fMZUbjTVjrsQULqpGjn3LjyEU9gEwmBPrA&oe=67423832"  alt="Shekinah Images"/>
        </a>
        <a href="https://www.facebook.com/photo/?fbid=388238680459490&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/425684402_388238640459494_2636428053081805783_n.jpg?stp=cp6_dst-jpg&_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEFJxbUx867egMGMBKfTDwWnr_dYj5EPxmev91iPkQ_GRTCv4s1QHpNPXhD9t9Y1YOK1uTlCvRD9VmWp7o5AWKT&_nc_ohc=vd0LWnOu8vcQ7kNvgHGjx-S&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=ALQfcVg10uU7-zPL81GHhfn&oh=00_AYD9e0RbqndiCcPkG4-FUMJdlZ3MZOpGi6UU5shKoemKBg&oe=67420B67"  alt="Shekinah Images"/>
        </a>
        <a href="https://www.facebook.com/photo/?fbid=372379655378726&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-6.fna.fbcdn.net/v/t39.30808-6/417176665_372379652045393_6146507685354971001_n.jpg?stp=cp6_dst-jpg&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGkK-dqoGoYMJVULMcyC7qXB3eADLyyyzwHd4AMvLLLPEMQKU9cM24EPZtZfPYSJa2Sh1rs0eQWLQxpV-TH8AzI&_nc_ohc=ZGs6UyHMg68Q7kNvgF8mJg3&_nc_zt=23&_nc_ht=scontent.fmnl17-6.fna&_nc_gid=AaTPVcCjZAtUAOPCjQZz_nh&oh=00_AYAO6Ffss3Xf59IQeOjrUJZRFJ1jxhiq-fSXxdu9II2__Q&oe=67423774"  alt="Shekinah Images"/>
        </a>
        <a href="https://www.facebook.com/photo/?fbid=362514669698558&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-6/413946375_362514666365225_2716690202531334707_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHkoStVbx1r_s2Xa-hk4fh44-SkkapVsC3j5KSRqlWwLdd-poLoKuulw21zwNMiSVGj7I2tq0aps9a0iTrgShcq&_nc_ohc=eZ-yAKz3ixMQ7kNvgGVUTQT&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=AzRmtHEnGu_rguvJWQoHOF_&oh=00_AYCWT5f8EgOnf251VhBT9_RKf7E9FrqwWmLEmnGPWzKY-w&oe=674218B4"  alt="Shekinah Images"/>
        </a>
        <a href="https://www.facebook.com/photo/?fbid=295197929763566&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-6/368178167_295197926430233_6470861104556196030_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGaICZGJ5iNXZEKUZErhfY9oHK-4-GfKe6gcr7j4Z8p7l0gP60T-x1MLgqhApDgkVJOq0T_Xtk7bzMnTaA6qX4g&_nc_ohc=pNfydMFp74UQ7kNvgGMqOVa&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=A8V8HLUR2nLFVN7H7rKRtVL&oh=00_AYCNVnHrrIbVk-4VkYZUPgMQ8r-QeXlo68RYKvGAebiSCw&oe=674211C7"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=290933813523311&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-6/366539618_290933796856646_2694938660736190810_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHXoZUSzhtR0My16i1oVywlU4H3BXYLBilTgfcFdgsGKcCnjcfRcobyPUDlofn0Cq0ale-LbNAnWP2FjO3OxFwf&_nc_ohc=F2K1rAhgZngQ7kNvgHlOrpW&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=Asxr7CZ5uwJhcN_dsjH_0u8&oh=00_AYBFaSdQltdQQgqxqiOxcaNy_yM7NlbWMI-dwrksCPLUVQ&oe=67423391"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=290933806856645&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/366705873_290933783523314_7326540913198168877_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeFbFKSqBYw2WYA_GNlO2tPax2GfOgtDtJjHYZ86C0O0mPLql6oIdt8dlzkhQtJUDZdKU07AP4Z4gEHQm5gafqMC&_nc_ohc=EhVmIAhwGXAQ7kNvgFDSPFQ&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AzxyvE1hc-nl52SKVu-Nvt6&oh=00_AYASWCdy1EDAj51PNWCe6SlboFhCj2zAxylJKcNV8FYitQ&oe=674218A6"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=290933743523318&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-5.fna.fbcdn.net/v/t39.30808-6/366500852_290933736856652_2697444101627314963_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeF72k6h0MgYjAgmHEdBdBQnQKOGeR9qR99Ao4Z5H2pH35dAmEH8iN4laZ080HnIjsZYp4PfuY13ImFYpOyFbTsv&_nc_ohc=wpjblyirxEsQ7kNvgHs_UVt&_nc_zt=23&_nc_ht=scontent.fmnl17-5.fna&_nc_gid=Ah0CvzMzq9baeN5aIWkKhUz&oh=00_AYDovXOW606uzps7kVARErCEeyztHdAxv3iBQ3gxgNdoZQ&oe=674209FE"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=290933656856660&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/366378116_290933640189995_2937731230376655983_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeH21W6GZ-p5jjoUBxkS-4sWbZoZN00qljxtmhk3TSqWPEkt8SCq-qA5H0hTtWduGfeVBfqWWnqrVZDDNaiTtkhE&_nc_ohc=c4ijtnCzOj4Q7kNvgHBvXu2&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=A4yRLdgGjSeERROuLRgP_dZ&oh=00_AYAtyOrEsAHPOQYfjxUeSRGDkBOBNLk-dfLz1VdGFXH-EQ&oe=67423DA3"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=270877435528949&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/357733586_270877432195616_2962011899254000687_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHWker7S7_6C75nC1NuWwb-KyHaigH8eGcrIdqKAfx4Z6npWGtg1aPnH6HIb9X-EXExJx9Ebj-v084QOoWNKFIT&_nc_ohc=RTgrgFlzG3AQ7kNvgE6PhfX&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AlOOCfIT0Ldk8PWIpCWFpiQ&oh=00_AYB__997VTh7b4Bx6xUCWLA6ZeBIJPi4uyPJKQwZSf0UmA&oe=67422B8D"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=167889832494377&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/310962871_167889829161044_4745208054766092985_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEwk8fdVXPyaxMYDlXUOuqQTdlNgwZrETBN2U2DBmsRMBAzft7bAE7XI4_9OEdNUst9qoXgg9aeVrb4a55aWHck&_nc_ohc=7PoIouejAigQ7kNvgFSHH8D&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=AobYR1zListFXFSS83rtsDU&oh=00_AYAdSpMLi8fGH6Acphg2SU8WhwWFlbOwbhqel9ZTt-jYQQ&oe=674214DE"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=144937414792559&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-5.fna.fbcdn.net/v/t39.30808-6/289078744_144937411459226_162447539657039261_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEFT24SvY-3SGIM5MNOOBqHsPkvBEw1TRmw-S8ETDVNGZpfLnbmqXpE-NwOoIWqGVxSHMYIJbOv1q8A1IAT09vl&_nc_ohc=R97De9WlKtwQ7kNvgGuaq2p&_nc_zt=23&_nc_ht=scontent.fmnl17-5.fna&_nc_gid=AMomuwL9CqljyZHwa6t3lTD&oh=00_AYBOSOP9901h9ALdlYvBjdG00sQipe272iddSBQpd_D99w&oe=67423155"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=144723384813962&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-1.fna.fbcdn.net/v/t39.30808-6/288633071_144723381480629_4072157739434874023_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeHUiRKP8X0oSqwhPWJs5qWiiiIJUfeq8RqKIglR96rxGhWeMwx6CKUNpTqsV5ceY2Lwl-RaFjow0sVK7H5WIlfU&_nc_ohc=o4uWMpyxRhMQ7kNvgG_CXG3&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=AaHZ4TURZkUuUER2by55COp&oh=00_AYCEqe2V_Bu4gxRMqLIZD6jXscrzKznmffuEnPs9Egskrg&oe=67421DB8"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=133308745955426&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/279901052_133308742622093_3653332886836792003_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=f727a1&_nc_eui2=AeELtJbLUMXLWLaEypzAeUrVOUQxSYnMNXQ5RDFJicw1dL6eQgz4l1dRz_9IXw_O1o1Kc16VN84XawzyR2oOUTW5&_nc_ohc=NJJcqWbgLDEQ7kNvgHpApuD&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=A_2BrNEO3apcBwRYxhALOhu&oh=00_AYDfJIvgL3ZhQxh0kxmQ3siHdnnhBxw0r3Xo7_wQRLIwaw&oe=67423BE2"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=119552307331070&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/275983864_119552457331055_152656925238832361_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEsFUJqpCTFzL9bDVLhqybcvIraEGZf0Ba8itoQZl_QFuFwoOByT9EzmQrZ9EOquq022ntbW_J5dSHQE1KOkY7i&_nc_ohc=AIh5y8FqaiYQ7kNvgFcHRPf&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=ACC4oyRY6BR8UcscIGeO--8&oh=00_AYBHzObra2orwXkbzKo0h9x_fRiCPWacHCqDRpffHn0UbA&oe=67421F36"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=119167547369546&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/275884166_119167597369541_3142705126869811100_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEVW5YXfQLojPJc-brnYinzDb_AY7-bL6YNv8Bjv5svpr5_unC4p69jSoH7uDjMR1rgs0zbOPXDa5mTc9QVWyA_&_nc_ohc=ScQiwG_B3KAQ7kNvgFmbK81&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=AdphwpckYyaqeDPAfyLSZWD&oh=00_AYDEWyNtbY7ngMtDLzY-0fpCTNQH-fmnBwFaroPODBvgWQ&oe=6742138E"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=114850707801230&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/275232569_114850704467897_2422151485208549476_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeHDrKa_mlmHHMhBpcrRoeGbG8yaG0nGTkAbzJobScZOQO4scAhGF2Te0aj6UMEtEVtjYnvXg360tGuyf4Am_Q94&_nc_ohc=Y2FOOMo-T0YQ7kNvgGaGleh&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=AkzQJkypTr5VpL_LWL1bV9E&oh=00_AYCj9sN4-nOiB-nHf4fSKSXDyLqp11wDvRDHhiDup4lqBQ&oe=67423C15"  alt="Shekinah Images"/>
        </a>
       
        <a href="https://www.facebook.com/photo/?fbid=114850517801249&set=pb.100078200832295.-2207520000" target="_blank"> <img class="ukiyo"
            src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/275194508_114850514467916_8121938734992948213_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeFUdTyQeQeEt0IGMpK8aXf1xKiNm2dMnm_EqI2bZ0yeb6VrERvqLm-7bypX1MuSaTMuOjTrtkFWqTGlTbVuYV0n&_nc_ohc=KfiUvdnZxP4Q7kNvgG7OjTY&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=AcNXFD2rUIrZgCL2O0czxcK&oh=00_AYCLNKEKK_P4bTyq1BTphpDuym6o1WHsQz4pBO6JkUW3Gw&oe=6742246F"  alt="Shekinah Images"/>
        </a> -->



        <div class="marquee m1 dissolve2 m-fade">


          <span>
          From breathtaking views to exceptional service, our guests love it all. 
          </span>
          <span>
          From breathtaking views to exceptional service, our guests love it all. 
          </span>

        </div>
    </section>

    <section class="quotes">

      <p class="main-title">Customer Feedback</p>
      <div class="content-slider">

        <div class="slider">
          <div class="mask">
            <ul>
              <li class="anim1">
                <div class="quote">"Our wedding at Shekinah was a dream come true! The staff was incredibly attentive,
                  and
                  the setting was absolutely stunning. Thank you for making our special day unforgettable!"</div>
                <div class="source">- Marc Kevin Del Mundo</div>
              </li>
              <li class="anim2">
                <div class="quote">"We hosted our family reunion at Shekinah, and it was perfect! The pool area was a
                  hit
                  with the kids, and everyone loved the delicious catering. We can’t wait to come back!"</div>
                <div class="source">- Saji Bañaga</div>
              </li>
              <li class="anim3">
                <div class="quote">"Shekinah was the perfect venue for my birthday party! The decorations were exactly
                  what I wanted, and the staff made everything seamless. I couldn’t have asked for a better
                  experience."
                </div>
                <div class="source">- Arlan Martin Jalop</div>
              </li>
              <li class="anim4">
                <div class="quote">"I held a corporate retreat at Shekinah, and it exceeded all expectations. The
                  facilities were top-notch, and the staff was very professional. Highly recommend for any business
                  event!"</div>
                <div class="source">- John Paul Tambal</div>
              </li>
              <li class="anim5">
                <div class="quote">"We celebrated our anniversary at Shekinah, and it was magical. The romantic
                  atmosphere
                  and exceptional service made for a memorable evening. We’ll definitely be back!"</div>
                <div class="source">- Gian Khiel Nieva</div>
              </li>

            </ul>
          </div>
        </div>
      </div>

    </section>

    <section class="faq-section">
      <div class="main-title">Frequently Asked Questions</div>

      <div class="faq-content">
        <div class="faq-question">
          <input id="q1" type="checkbox" class="panel" name="panel">
          <label for="q1" class="plus">+</label>
          <label for="q1" class="panel-title">What are the check-in and check out times?</label>
          <div class="panel-content">
            Our check-in time starts at 8:00 AM ,
            and check-out is at 12:00 AM. If you need an early check-in or late check-out,
            we recommend contacting us in advance to see if arrangements can be made.
          </div>
        </div>

        <div class="faq-question">
          <input id="q2" type="checkbox" class="panel">
          <label for="q2" class="plus">+</label>
          <label for="q2" class="panel-title">What payment methods are accepted?</label>
          <div class="panel-content">We accept various payment methods, including BDO, BPI, GCash, etc.,
            digital wallets and bank transfers. We also accept cash at our front desk.
            Please note that additional fees may apply for bank transfers or certain credit card transactions.
          </div>
        </div>

        <div class="faq-question">
          <input id="q3" type="checkbox" class="panel">
          <label for="q3" class="plus">+</label>
          <label for="q3" class="panel-title">Is the catering included?</label>
          <div class="panel-content"> No, we don't provide catering services. Our resort offers versatile event spaces,
            amenities and exceptional service.
            Guests are welcome to coordinate external catering services tailored to their preferences,
            subject to their payment fee. Please contact us for recommended caterers and event planning assistance.
          </div>
        </div>

        <div class="faq-question">
          <input id="q4" type="checkbox" class="panel">
          <label for="q4" class="plus">+</label>
          <label for="q4" class="panel-title">Are time extension allowed?</label>
          <div class="panel-content">Yes, the rate is 1000 per hour, provided there isn't another client scheduled next.
          </div>
        </div>

        <div class="faq-question">
          <input id="q5" type="checkbox" class="panel">
          <label for="q5" class="plus">+</label>
          <label for="q5" class="panel-title">Are pets allowed?</label>
          <div class="panel-content">Yes, pets are allowed, but they are not allowed in the pool.
          </div>
        </div>

        <div class="faq-question">
          <input id="q6" type="checkbox" class="panel">
          <label for="q6" class="plus">+</label>
          <label for="q6" class="panel-title">What are the policies regarding to the use of liquor?</label>
          <div class="panel-content">You can buy liquors inside the premises, outside liquors are charge 200 per bottle, 300 per case for beer and alike.
          </div>
        </div>

      </div>
    </section>


    <!-- <a href="/../User-auth/user_logout.php" class="btn btn-danger rounded-0 scrollEffect">Logout</a> -->

  </main>

  <?php
    require_once __DIR__ . '/../Assets/footer.php';
    require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>

</html>