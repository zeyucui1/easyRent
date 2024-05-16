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
<title>Reservation Page</title>
<script src="./js/reservation.js"></script>

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

    <div class="blank" style="height: 100px;"></div>
    <div class="reservation-box">
      <div class="selectedCar">
        <h1>Your selected Car</h1>
        <div id="carDetails"></div>
      </div>
      <div class="reservationBox">
        <h1>Reservation Form</h1>
        <form id="reservationForm" action="confirmation.php" method="POST">
          <div class="reservationDetail">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" required>

            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" value="1" min="1" required>
            <label for="Price">Total Price: </label>
            <span id="totalPrice">$0.00</span>
          </div>
          <div class="reservationInformation">
            <label for="name">Name:</label>
            <input type="text" id="name" required pattern="[A-Za-z\s\-]+" title="Name must only contain letters, spaces, and hyphens.">

            <label for="phone">Mobile Number:</label>
            <input type="tel" id="phone" required pattern="04[\d\s\-]{8,10}" title="Mobile number must start with 04 followed by 8 to 10 digits or spaces/hyphens.">

            <label for="email">Email:</label>
            <input type="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">

            <label for="license">Valid Driver's License:</label>
            <input type="text" id="license" required pattern="[A-Za-z0-9\-]+" title="Driver's license must contain only alphanumeric characters and hyphens.">
          </div>

          <div class="reservationBtn">
            <button type="submit" class='btn'>Reserve</button>
            <button type="button" class='btn' onclick="cancelReservation()">Cancel Reservation</button>
          </div>
        </form>
      </div>

    </div>

    <script>
      function cancelReservation() {
        
        alert("Your previous reservation has been cancelled. You can now make a new booking.");

        localStorage.removeItem('selectedCar');

        window.location.href = 'index.php';
      }
    </script>

  </main>
  <?php
  require_once './includes/footer.php';
  ?>

</body>

</html>