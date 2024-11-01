class Navbar extends HTMLElement {
  connectedCallback() {
    const isLoggedIn = this.getAttribute('data-is-logged-in') === 'true';
    const username = this.getAttribute('data-username');

    this.innerHTML = `
      <nav class="navbar navbar-expand-lg sticky-top transition-nav-bg animate" id="navbar" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand fw-semibold me-auto" href="./homepage.php">Shekinah</a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./homepage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./bookpage.php">Book now</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-light dropdown-toggle" href="./About-us.php" role="button" data-bs-toggle="dropdown">About Us</a>
                  <ul class="dropdown-menu bg-white border-light-subtle" data-bs-theme="light">
                    <li><a class="dropdown-item" href="./review.php">Review</a></li>
                    <li><a class="dropdown-item" href="./gallery.php">Gallery</a></li>
                    <li><a class="dropdown-item" href="./shop.php">Shop</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-light mx-lg-2" href="./bookpage.php">Services</a></li>
              </ul>
            </div>
          </div>
          ${isLoggedIn ? `<a class="navbar-text text-light text-break text-decoration-none" href="./user_setting.php">Welcome, ${username}</a>` : `<a href="/Shekinah.web/User-auth/user_login.php" class="login-btn">Login</a>`}
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>`;

    this.updateActiveLink();
    window.addEventListener('scroll', this.handleScroll.bind(this));
  }

  handleScroll() {
    const navbar = this.querySelector('#navbar');
    const textItems = this.querySelectorAll('.nav-link');
    const navText = this.querySelector('.navbar-text');
    if (window.scrollY > 10) {
      navbar.classList.add('bg-light', 'shadow');
      navbar.setAttribute('data-bs-theme', 'light');
      textItems.forEach(item => item.classList.remove('text-light'));
      navText.classList.remove('text-light');
    } else {
      navbar.classList.remove('bg-light', 'shadow');
      navbar.setAttribute('data-bs-theme', 'dark');
      textItems.forEach(item => item.classList.add('text-light')); 
      navText.classList.add('text-light');
    }
  }

  updateActiveLink() {
    const currentPath = window.location.pathname.split('/').pop() || 'homepage.php';
    const links = this.querySelectorAll('.nav-link, .dropdown-item');
    links.forEach(link => {
      if (link.href.includes(currentPath)) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }
}

customElements.define('navbar-element', Navbar);
