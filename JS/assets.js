// class Navbar extends HTMLElement {
//   connectedCallback() {
//     const isLoggedIn = this.getAttribute("data-is-logged-in") === "true";
//     const username = this.getAttribute("data-username");

//     this.innerHTML = `
//       <nav class="navbar navbar-expand-lg sticky-top" id="navbar" data-bs-theme="dark">
//         <div id="navbar-bg" class=" transition-nav-bg"></div>
//         <div class="nav container-fluid d-flex justify-content-between">
//          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-label="Toggle navigation">
//             <span class="navbar-toggler-icon"></span>
//           </button>
//           <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
//             <div class="offcanvas-header">
//               <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
//               <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
//             </div>
//             <div class="offcanvas-body">
//               <ul class="navbar-nav">
//                 <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./homepage.php">Home</a></li>
//                 <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./bookpage.php">Book now</a></li>
//                 <li class="nav-item dropdown">
//                   <a class="nav-link text-light dropdown-toggle" href="./About-us.php" role="button" data-bs-toggle="dropdown">About Us</a>
//                   <ul class="dropdown-menu bg-white border-light-subtle" data-bs-theme="light">
//                     <li><a class="dropdown-item" href="./review.php">Review</a></li>
//                     <li><a class="dropdown-item" href="./gallery.php">Gallery</a></li>
//                     <li><a class="dropdown-item" href="./shop.php">Shop</a></li>
//                   </ul>
//                 </li>
//                 <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./services.php">Services</a></li>
//               </ul>
//             </div>
//           </div>
//           <a class="navbar-brand fw-semibold me-auto" href="./homepage.php">Shekinah</a>
//           ${
//             isLoggedIn
//               ? `<a class="navbar-text text-light text-break text-decoration-none" href="./user_setting.php">Welcome, ${username}</a>`
//               : `<a href="/Shekinah.web/User-auth/user_login.php" class="login-btn">Login</a>`
//           }

//         </div>
//       </nav>`;

//     this.updateActiveLink();
//     window.addEventListener("scroll", this.handleScroll.bind(this));
//   }

//   handleScroll() {
//     const navbar = this.querySelector("#navbar");
//     const navbarbg = this.querySelector("#navbar-bg");
//     const textItems = this.querySelectorAll(".nav-link");
//     const navText = this.querySelector(".navbar-text");

//     setTimeout(() => {
//       if (window.scrollY > 100) {
//         setTimeout(() => {
//           navbar.classList.add("shadow");
//           navbar.setAttribute("data-bs-theme", "light");
//           textItems.forEach((item) => item.classList.remove("text-light"));
//           navText.classList.remove("text-light");
//         }, 500);
//         navbarbg.classList.add("open");
//       } else {
//         setTimeout(() => {
//           navbar.classList.remove("shadow");
//           navbar.setAttribute("data-bs-theme", "dark");
//           textItems.forEach((item) => item.classList.add("text-light"));
//           navText.classList.add("text-light");
//         }, 500);
//         navbarbg.classList.remove("open");
//       }
//     }, 1000);
//   }

//   updateActiveLink() {
//     const currentPath =
//       window.location.pathname.split("/").pop() || "homepage.php";
//     const links = this.querySelectorAll(".nav-link, .dropdown-item");
//     links.forEach((link) => {
//       if (link.href.includes(currentPath)) {
//         link.classList.add("active");
//       } else {
//         link.classList.remove("active");
//       }
//     });
//   }
// }

class Navbar extends HTMLElement {
  connectedCallback() {
    const isLoggedIn = this.getAttribute("data-is-logged-in") === "true";
    const username = this.getAttribute("data-username");

    this.innerHTML = `
      <section class="navigation">
        <div class="nav-container">
          <div class="brand">
            <a href="#!">Shekinah</a>
          </div>
          <nav class="nav">
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
              <li>
                <a class="nav-link" href="./homepage.php">Home</a>
              </li>
              <li>
                <a class="nav-link" href="./bookpage.php">Book now</a>
              </li>
              <li>
                <a class="nav-link" href="#!">About Us</a>
                <ul class="navbar-dropdown">
                  <li>
                    <a class="nav-link" href="./gallery.php">Gallery</a>
                  </li>
                  <li>
                    <a class="nav-link" href="./shop.php">Shop</a>
                  </li>
                  <li>
                    <a class="nav-link" href="./review.php">Review</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="nav-link" href="./services.php">Services</a>
              </li>
            </ul>
          </nav>
          ${
            isLoggedIn
              ? `<a class="navbar-text text-light text-break text-decoration-none" href="./user_setting.php">Welcome, ${username}</a>`
              : `<a href="/Shekinah.web/User-auth/user_login.php" class="login-btn">Login</a>`
           }
        </div>
      </section>
    `;

    this.updateActiveLink();
    this.initializeNavbar();
  }

  initializeNavbar() {
    const $ = jQuery; // Make sure jQuery is available in your context

    $('#navbar-toggle').click(function() {
      $('nav ul').slideToggle();
    });

    $('#navbar-toggle').on('click', function() {
      this.classList.toggle('active');
    });

    $('nav ul li a.nav-link:not(:only-child)').click(function(e) {
      $(this).siblings('.navbar-dropdown').slideToggle("slow");
      $('.navbar-dropdown').not($(this).siblings()).hide("slow");
      e.stopPropagation();
    });

    $('html').click(function() {
      $('.navbar-dropdown').hide();
    });
  }

  updateActiveLink() {
    const currentPath =
      window.location.pathname.split("/").pop() || "homepage.php";
    const links = this.querySelectorAll(".nav-link, .dropdown-item");
    links.forEach((link) => {
      link.classList.toggle("active", link.href.includes(currentPath));
    });
  }
}



document.body.style.overflow = "hidden";

document.body.style.overflow = "hidden";
const randomDelay = Math.floor(Math.random() * 2000);

window.addEventListener("load", function () {
  setTimeout(function () {
    document.getElementById("loader").style.display = "none";
    document.body.style.overflow = "auto";

    document.body.classList.add("animations-start"); //Page animation
  }, randomDelay);
});
console.log(randomDelay);
customElements.define("navbar-element", Navbar);
