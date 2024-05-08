document.addEventListener('DOMContentLoaded', function () {
  let selectedType = null
  let selectedBrand = null
  let carsData = []

  fetch('data/car.json')
    .then((response) => response.json())
    .then((data) => {
      carsData = data.cars
      renderCars(carsData)
      populateDropdowns(carsData)
    })
    .catch((error) => console.error('Error loading the cars data:', error))

  const clearButton = document.getElementById('clearFilters')
  clearButton.addEventListener('click', () => {
    selectedType = null
    selectedBrand = null
    renderCars(carsData)
  })

  function populateDropdowns(cars) {
    const types = new Set(cars.map((car) => car.type))
    const brands = new Set(cars.map((car) => car.brand))
    const typeMenu = document.querySelectorAll('.sub-menu-content')[0]
    const brandMenu = document.querySelectorAll('.sub-menu-content')[1]

    typeMenu.innerHTML = ''
    brandMenu.innerHTML = ''

    types.forEach((type) => {
      const link = document.createElement('a')
      link.textContent = type
      link.addEventListener('click', () => {
        selectedType = type
        selectedBrand = null
        filterAndRenderCars(cars)
      })
      typeMenu.appendChild(link)
    })

    brands.forEach((brand) => {
      const link = document.createElement('a')
      link.textContent = brand
      link.addEventListener('click', () => {
        selectedBrand = brand
        selectedType = null
        filterAndRenderCars(cars)
      })
      brandMenu.appendChild(link)
    })
  }

  function filterAndRenderCars(cars) {
    const filteredCars = cars.filter(
      (car) =>
        (!selectedType || car.type === selectedType) &&
        (!selectedBrand || car.brand === selectedBrand)
    )
    renderCars(filteredCars)
  }

  function renderCars(cars) {
    const carList = document.getElementById('featured-car-list')
    carList.innerHTML = '' // Clear existing cars
    cars.forEach((car, index) => {
      const carHTML = `
        <li>
          <div class="featured-car-card">
            <figure class="card-banner">
              <img src="${car.image}" alt="${car.brand} ${car.carModel}" loading="lazy" width="440" height="300" class="w-100">
            </figure>
            <div class="card-content">
              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="#">${car.brand} ${car.carModel}</a>
                </h3>
                <data class="type" value="${car.type}">${car.type}</data>
              </div>
              <ul class="card-list">
                <li class="card-list-item">
                  <ion-icon name="people-outline"></ion-icon>
                  <span class="card-item-text">${car.seats} Seats</span>
                </li>
                <li class="card-list-item">
                  <ion-icon name="flash-outline"></ion-icon>
                  <span class="card-item-text">${car.fuelType}</span>
                </li>
                <li class="card-list-item">
                  <ion-icon name="speedometer-outline"></ion-icon>
                  <span class="card-item-text">${car.mileage} miles</span>
                </li>
                <li class="card-list-item">
                  <ion-icon name="hardware-chip-outline"></ion-icon>
                  <span class="card-item-text">Stock Left: ${car.quantity}</span>
                </li>
              </ul>
              <div class="card-price-wrapper">
                <p class="card-price">
                  <strong>$${car.pricePerDay}</strong> / Day
                </p>
                <button class="btn" data-index="${index}">Rent now</button>
              </div>
            </div>
          </div>
        </li>`
      carList.innerHTML += carHTML
    })

    // Attach event listeners to buttons after rendering
    document.querySelectorAll('.btn').forEach((button) => {
      button.addEventListener('click', () => {
        const index = button.getAttribute('data-index')
        rentCar(index)
      })
    })
  }
  function rentCar(index) {
    const car = carsData[index]
    // console.log('Renting car:', car)
    localStorage.setItem('selectedCar', JSON.stringify(car))
    window.location.href = 'reservationPage.php' // Redirect to the reservation PHP page
  }
})
