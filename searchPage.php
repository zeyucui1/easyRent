

<?php
// 解析 JSON 数据
$jsonData = file_get_contents('data/car.json');
$cars = json_decode($jsonData, true)['cars'];

// 获取搜索条件
$brand = $_GET['brand'] ?? ''; 
$type = $_GET['type'] ?? ''; 

// 筛选数据
$filteredCars = array_filter($cars, function ($car) use ($brand, $type) {
    $matchBrand = $brand === '' || stripos($car['brand'], $brand) !== false;
    $matchType = $type === '' || stripos($car['type'], $type) !== false;
    return $matchBrand && $matchType;
});

// 可以在此处进行调试，输出筛选结果查看
// echo '<pre>' . print_r($filteredCars, true) . '</pre>';
?>






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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>$(document).ready(function () {
  $('#input-1').on('keyup', function () {
    var brand = $(this).val()
    $.ajax({
      url: 'http://localhost/easyRent/includes/suggest.php',
      type: 'GET',
      data: { brand: brand },
      success: function (data) {
        $('#suggestions-brand').html(data).show()
      },
    })
  })

  $('#input-2').on('keyup', function () {
    var type = $(this).val()
    $.ajax({
      url: 'includes/suggest.php',
      type: 'GET',
      data: { type: type },
      success: function (data) {
        $('#suggestions-type').html(data).show()
      },
    })
  })

  $('#suggestions-brand').on('click', 'div', function () {
    $('#input-1').val($(this).text())
    $('#suggestions-brand').hide()
  })

  $('#suggestions-type').on('click', 'div', function () {
    $('#input-2').val($(this).text())
    $('#suggestions-type').hide()
  })

  $(document).on('click', function (event) {
    if (!$(event.target).closest('.input-wrapper').length) {
      $('#suggestions-brand, #suggestions-type').hide()
    }
  })

  $('#suggestions-brand, #suggestions-type').on('click', function (event) {
    event.stopPropagation()
  })
})
</script>
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

        <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">My Reservation</span>
        </a>

      </div>

    </div>
  </header>

  <main>
    <article>
    <div class="blank" style="height: 200px;"></div>

    <form action="searchPage.php" class="hero-form" style="margin-left: 280px;">
    
        <div class="input-wrapper">
          <label for="input-1" class="input-label">Brand</label>
          <input type="text" name="brand" id="input-1" class="input-field" placeholder="🔎What car brand?">
          <div id="suggestions-brand"></div>
        </div>

        <div class="input-wrapper">
          <label for="input-2" class="input-label">Car Type</label>
          <input type="text" name="type" id="input-2" class="input-field" placeholder="🔎What car type?">
          <div id="suggestions-type"></div>
        </div>

        <button type="submit" class="btn">Search</button>
      </form>
    <section class="section featured-car" id="featured-car">
    <div class="container">

      <div class="title-wrapper">
        <h2 class="h2 section-title">Your search Result</h2>
        

      </div>

      <ul class="featured-car-list" id="featured-car-list">
                    <?php foreach ($filteredCars as $car): ?>
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner">
                                <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['brand'] . ' ' . $car['carModel']) ?>" loading="lazy" width="440" height="300" class="w-100">
                            </figure>
                            <div class="card-content">
                                <div class="card-title-wrapper">
                                    <h3 class="h3 card-title">
                                        <a href="#"><?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['carModel']) ?></a>
                                    </h3>
                                    <data class="type" value="<?= htmlspecialchars($car['type']) ?>"><?= htmlspecialchars($car['type']) ?></data>
                                </div>
                                <ul class="card-list">
                                    <li class="card-list-item">
                                        <ion-icon name="people-outline"></ion-icon>
                                        <span class="card-item-text"><?= $car['seats'] ?> Seats</span>
                                    </li>
                                    <li class="card-list-item">
                                        <ion-icon name="flash-outline"></ion-icon>
                                        <span class="card-item-text"><?= htmlspecialchars($car['fuelType']) ?></span>
                                    </li>
                                    <li class="card-list-item">
                                        <ion-icon name="speedometer-outline"></ion-icon>
                                        <span class="card-item-text"><?= $car['mileage'] ?> miles</span>
                                    </li>
                                    <li class="card-list-item">
                                        <ion-icon name="hardware-chip-outline"></ion-icon>
                                        <span class="card-item-text">Stock Left: <?= $car['quantity'] ?></span>
                                    </li>
                                </ul>
                                <div class="card-price-wrapper">
                                    <p class="card-price">
                                        <strong>$<?= $car['pricePerDay'] ?></strong> / Day
                                    </p>
                                    <button class="btn">Rent now</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
    </div>
  </section>

    </article>
  </main>
  <?php
  require_once './includes/footer.php';
  ?>

</body>

</html>