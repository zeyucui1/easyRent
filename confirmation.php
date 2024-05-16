<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EasyRent - Rent your favourite car in AU</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./img/logo.webp" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">
</head>
<title>confirmation Page</title>
<script src="./js/confirmation.js"></script>

<body>

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <img src="./img/logo.webp" alt="easyRent logo">
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
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

      </div>

    </div>
  </header>

  <main>
  

    <div class="confirmation-box">
            <h1 class="confirmation-title">Your order detail</h1>
            <p class="confirmation-item"><strong>OrderId:</strong> <span><?php echo uniqid(); ?></span></p>
            <p class="confirmation-item"><strong>Start Date:</strong> <span id="startDate"></span></p>
            <p class="confirmation-item"><strong>End Date:</strong> <span id="endDate"></span></p>
            <p class="confirmation-item"><strong>Quantity:</strong> <span id="quantity"></span></p>
            <p class="confirmation-item"><strong>Total Price:</strong> <span id="totalPrice"></span></p>
            <p class="confirmation-item"><strong>Name:</strong> <span id="name"></span></p>
            <p class="confirmation-item"><strong>Email:</strong> <span id="email"></span></p>
            <p class="confirmation-item"><strong>Phone:</strong> <span id="phone"></span></p>
        </div>
        <div class="confirmBtn"><button id="confirmOrderButton" class="btn">Confirm Order</button></div>



  </main>
  <?php
  require_once './includes/footer.php';
  ?>

</body>

</html>