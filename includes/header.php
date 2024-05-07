<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <img src="./img/logo.webp" alt="easyRent logo">
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>
          <li>
            <a href="#hero-banner" class="navbar-link" data-nav-link>Search Cars</a>
          </li>
          <li>
            <a href="#featured-car" class="navbar-link" data-nav-link>Car categories</a>
          </li>

          <li>
            <a href="#get-start" class="navbar-link" data-nav-link>How to get start</a>
          </li>
          <li>
            <a href="#footer" class="navbar-link" data-nav-link>About Us</a>
          </li>


        </ul>
      </nav>

      <div class="header-actions">

        <div class="header-contact">
          <a class="contact-link">04 12345678</a>

          <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
        </div>

        <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">My Reservation</span>
        </a>

      </div>

    </div>
  </header>
</body>
</html>