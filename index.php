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

<body>

  <?php
  require_once 'includes/header.php';
  ?>

  <main>
    <article>

      <?php
      require_once 'includes/search.php';
      ?>


      <?php
      require_once 'includes/categorie.php';
      ?>

      <?php
      require_once 'includes/guide.php';
      ?>

    </article>
  </main>
  <?php
  require_once 'includes/footer.php';
  ?>

</body>

</html>