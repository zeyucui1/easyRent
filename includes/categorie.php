<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<script src="js/categories.js"></script>

<body>

  <!-- 
        - #FEATURED CAR
      -->

  <section class="section featured-car" id="featured-car">
    <div class="container">

      <div class="title-wrapper">
        <h2 class="h2 section-title">Car categories</h2>
        <div class="dropdown">
          <button class="dropbtn">Select By Categories 🡳</button>
          <div class="dropdown-content">
            <div class="sub-menu ">
              <button>Car Type 🡲</button>
              <div class="sub-menu-content">
                <!-- Car Types Here -->
              </div>
            </div>
            <div class="sub-menu">
              <button>Car brand 🡲</button>
              <div class="sub-menu-content">
                <!-- Car Brands Here -->
              </div>
            </div>
            <div class="sub-menu">
              <button id="clearFilters">Clear all filter ↻ </button>  
            </div>
          </div>
        </div>

      </div>

      <ul class="featured-car-list" id="featured-car-list">

      </ul>

    </div>
  </section>


</body>

</html>