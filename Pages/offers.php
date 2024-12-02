
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
      <center>
        <div class="h1"> COMING SOON!!</div>
      </center>
      <div class="main-sec">
      <section id="event">
          <div class="img-grp">
            <div class="imgFrame"></div>
            <img src="" alt="">
          </div>
          <div class="content-grp">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate fugiat aliquam molestiae ipsam, accusamus eos unde cum, voluptates aut repellendus deserunt consequuntur facilis et ipsum provident eligendi dolores dignissimos perspiciatis quam obcaecati nobis dolorum! Itaque voluptatem cumque est quod sunt omnis non vero. Sapiente accusantium perferendis facilis aut consectetur aspernatur perspiciatis aliquid sit in, consequuntur odio similique tenetur minima exercitationem architecto, nihil recusandae corrupti hic velit ipsum magni ab cupiditate facere. Quibusdam magni blanditiis ipsam laboriosam, consequatur expedita ab voluptate? Doloribus commodi deleniti nulla pariatur optio qui nostrum rem ipsa unde, magnam eum obcaecati quia modi recusandae odit. Exercitationem consectetur vel blanditiis voluptates, alias ipsa ratione nulla voluptatem modi facere aspernatur. Optio sit voluptas sed corporis quaerat, fugiat tempore accusantium? Asperiores temporibus odit natus ipsa consequuntur dolores ad qui itaque quia, minima nemo enim? Esse fugiat expedita odio molestias eveniet ut quisquam ad iusto, ratione, fugit laudantium? Nostrum est voluptate nulla dolor porro repellat commodi dignissimos tenetur velit nisi!
          </div>
      </section>
      <section id="pool-non-ac">
          <div class="img-grp">
            <div class="imgFrame"></div>

            <img src="" alt="">
          </div>
          <div class="content-grp">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate fugiat aliquam molestiae ipsam, accusamus eos unde cum, voluptates aut repellendus deserunt consequuntur facilis et ipsum provident eligendi dolores dignissimos perspiciatis quam obcaecati nobis dolorum! Itaque voluptatem cumque est quod sunt omnis non vero. Sapiente accusantium perferendis facilis aut consectetur aspernatur perspiciatis aliquid sit in, consequuntur odio similique tenetur minima exercitationem architecto, nihil recusandae corrupti hic velit ipsum magni ab cupiditate facere. Quibusdam magni blanditiis ipsam laboriosam, consequatur expedita ab voluptate? Doloribus commodi deleniti nulla pariatur optio qui nostrum rem ipsa unde, magnam eum obcaecati quia modi recusandae odit. Exercitationem consectetur vel blanditiis voluptates, alias ipsa ratione nulla voluptatem modi facere aspernatur. Optio sit voluptas sed corporis quaerat, fugiat tempore accusantium? Asperiores temporibus odit natus ipsa consequuntur dolores ad qui itaque quia, minima nemo enim? Esse fugiat expedita odio molestias eveniet ut quisquam ad iusto, ratione, fugit laudantium? Nostrum est voluptate nulla dolor porro repellat commodi dignissimos tenetur velit nisi!
          </div>
      </section>
      <section id="pool-ac">
          <div class="img-grp">
            <img src="" alt="">
            <div class="imgFrame"></div>

          </div>
          <div class="content-grp">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque cupiditate fugiat aliquam molestiae ipsam, accusamus eos unde cum, voluptates aut repellendus deserunt consequuntur facilis et ipsum provident eligendi dolores dignissimos perspiciatis quam obcaecati nobis dolorum! Itaque voluptatem cumque est quod sunt omnis non vero. Sapiente accusantium perferendis facilis aut consectetur aspernatur perspiciatis aliquid sit in, consequuntur odio similique tenetur minima exercitationem architecto, nihil recusandae corrupti hic velit ipsum magni ab cupiditate facere. Quibusdam magni blanditiis ipsam laboriosam, consequatur expedita ab voluptate? Doloribus commodi deleniti nulla pariatur optio qui nostrum rem ipsa unde, magnam eum obcaecati quia modi recusandae odit. Exercitationem consectetur vel blanditiis voluptates, alias ipsa ratione nulla voluptatem modi facere aspernatur. Optio sit voluptas sed corporis quaerat, fugiat tempore accusantium? Asperiores temporibus odit natus ipsa consequuntur dolores ad qui itaque quia, minima nemo enim? Esse fugiat expedita odio molestias eveniet ut quisquam ad iusto, ratione, fugit laudantium? Nostrum est voluptate nulla dolor porro repellat commodi dignissimos tenetur velit nisi!
          </div>
      </section>
      </div>
      </main>


  
    <?php
    require_once __DIR__ . '/../Assets/footer.php';
    require_once __DIR__ . '/../Assets/Html_footer.php';
    ?>
</body>
</html>
