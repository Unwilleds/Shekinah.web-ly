class Navbar extends HTMLElement {
  connectedCallback() {
    const isLoggedIn = this.getAttribute("data-is-logged-in") === "true";
    const username = this.getAttribute("data-username");

    this.innerHTML = `
      <section class="navigation">
        <div class="nav-container">
          <div class="navs-head">
            <div class="nav-mobile">
              <a id="navbar-toggle" ><span></span></a>
            </div>
            <nav class="navs">
              <ul class="nav-list">
                <li>
                  <a class="nav-link" href="./homepage.php">Home</a>
                </li>
                <li>
                  <a class="nav-link" href="./bookpage.php">Book Now</a>
                </li>
                <li>
                  <a class="nav-link" href="./offers.php">Offers</a>
                </li>
                <li>
                  <a class="nav-link" href="./aboutpage.php">About Us</a>
                 
                </li>
              </ul>
            </nav>
            <div class="brand">
              <a class="nav-brand" href='#top'>Shekinah</a>
            </div>
          </div>
          <div class="login-btn-grps">
            ${
              isLoggedIn
                ? `<a href="/../User-auth/user_logout.php" class="login-btn red">Logout</a>`
                : `<a href="/../User-auth/user_login.php" class="login-btn">Login</a>`
            }
          </div>
        </div>
      </section>
    `;

    this.updateActiveLink();
    this.initializeNavbar();
  }

  initializeNavbar() {
    const navbarToggle = $("#navbar-toggle");
    const navList = $(".navs .nav-list");
    const navbar = $(".navigation");
    const button = $(".login-btn");

    $(document).ready(() => {
      const updateTextColor = (isActive) => {
        const isWideScreen = window.matchMedia("(min-width: 55rem)").matches;
        const scrolled = $(document).scrollTop() > 100;
        const root = document.querySelector(":root");

        if (isActive && isWideScreen && !scrolled) {
          navbar.find(".nav-list .nav-link, .nav-brand").css("color", "white");
          button.css({
            color: "white",
            border: "2px solid white",
          });
          root.style.setProperty("--nav-hover-color", "#fafaf3");
        } else if (isActive || (scrolled && !isWideScreen)) {
          navbar
            .find(".nav-list .nav-link, .nav-brand")
            .css("color", "var(--text-color)");
          button.css({
            color: "var(--text-color)",
            border: "2px solid var(--text-color)",
          });
          root.style.setProperty("--nav-hover-color", "#1f2929");
        } else if (!scrolled) {
          // Default state without scrolling
          navbar
            .find(".nav-list .nav-link, .nav-brand")
            .css("color", "var(--base-color)");
          button.css({
            color: "var(--base-color)",
            border: "2px solid var(--base-color)",
          });
          root.style.setProperty("--nav-hover-color", "#fafaf3");
        } else {
          navbar
            .find(".nav-list .nav-link, .nav-brand")
            .css("color", "var(--text-color)");
          button.css({
            color: "var(--text-color)",
            border: "2px solid var(--text-color)",
          });
          root.style.setProperty("--nav-hover-color", "#1f2929");
        }
      };

      // Toggle the navigation menu
      navbarToggle.click(function () {
        const isActive = $(this).toggleClass("active").hasClass("active");
        updateTextColor(isActive);
        navList.slideToggle("slow");
      });

      // Dropdown toggle
      $(".navs ul li .nav-link:not(:only-child)").click(function (e) {
        $(this).siblings(".navbar-dropdown").slideToggle("slow");
        $(this).toggleClass("active");
        $(".navbar-dropdown").not($(this).siblings()).hide("slow");
        e.stopPropagation();
      });

      $("html").click(function () {
        $(".navbar-dropdown").hide("slow");
      });

      $(window).scroll(function () {
        const scrolled = $(document).scrollTop() > 100;
        navbar.css({
          "background-position": scrolled ? "top" : "bottom",
          "background-color": scrolled ? "var(--base-color)" : "transparent",
        });
        updateTextColor(navbarToggle.hasClass("active"));
      });

      $(window).resize(function () {
        updateTextColor(navbarToggle.hasClass("active"));
      });
    });
  }

  updateActiveLink() {
    const currentPath =
      window.location.pathname.split("/").pop() || "homepage.php";
    const links = this.querySelectorAll(".nav-link, .dropdown-item");
    links.forEach((link) => {
      link.classList.toggle("active", link.href.includes(currentPath));
      console.log("Link Path:", new URL(link.href).pathname, "Active:", link.href.includes(currentPath));
    });
  }
}
document.body.style.overflowY = "hidden";
document.body.style.height = "100%";
document.documentElement.style.overflowY = "hidden";
document.documentElement.style.height = "100%";

const randomDelay = Math.floor((Math.random() + 0.5) * 2500);
// On window load
window.addEventListener("load", function () {
  setTimeout(function () {
    // Hide the loader
    document.getElementById("loader").style.display = "none";

    setTimeout(() => {
      document.body.style.overflowY = "";
      document.body.style.height = "";
      document.documentElement.style.overflowY = "";
      document.documentElement.style.height = "";
      console.log("Animations started and scrolling unlocked");
    }, randomDelay + 1000);

    document.body.classList.add("animations-start");
  }, randomDelay - 500);
});

console.log("Random delay for loader:", randomDelay);

$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  
});

customElements.define("navbar-element", Navbar);
