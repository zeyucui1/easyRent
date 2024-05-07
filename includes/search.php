<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
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
  <!-- 
        - #HERO
      -->

  <section class="section hero" id="home">
    <div class="container">

      <div class="hero-content">
        <h2 class="h1 hero-title">The easy way to takeover a lease</h2>

        <p class="hero-text">
          Live in Australia and want to rent a car? Search your favourite car and rent it now.
        </p>
      </div>

      <div class="hero-banner" id="hero-banner"></div>
      <form action="searchPage.php" class="hero-form">
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
  


    </div>
  </section>


</body>

</html>