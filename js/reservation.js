document.addEventListener('DOMContentLoaded', function () {
  // 从LocalStorage获取选中的车辆信息
  const selectedCar = JSON.parse(localStorage.getItem('selectedCar'))
  if (selectedCar) {
    // 将车辆信息展示在页面上
    const carDetailsDiv = document.getElementById('carDetails')
    carDetailsDiv.innerHTML = `
          <img src=${selectedCar.image}></img>
          <p>Brand: ${selectedCar.brand}</p>
          <p>Model: ${selectedCar.carModel}</p>
          <p>Price Per Day: ${selectedCar.pricePerDay}$/Day</p>
          <p>Seats: ${selectedCar.seats}</p>
          <p>Type: ${selectedCar.type}</p>
          <p>Description: ${selectedCar.description}</p>
      `
  } else {
    carDetailsDiv.innerHTML =
      '<p class="no-booking-alert">Currently, there are no bookings.</p>'
  }

  const form = document.getElementById('reservationForm')
  form.onsubmit = function (event) {
    // 这里可以添加将预订信息发送到服务器的代码
    const reservationData = {
      startDate: document.getElementById('startDate').value,
      endDate: document.getElementById('endDate').value,
      quantity: document.getElementById('quantity').value,
      totalPrice: document.getElementById('totalPrice').textContent,
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
      phone: document.getElementById('phone').value,
    }

    localStorage.setItem('reservationData', JSON.stringify(reservationData))
    window.location.href = 'confirmation.php'
    console.log('Form submitted', reservationData)
  }
  const startDateInput = document.getElementById('startDate')
  const endDateInput = document.getElementById('endDate')
  const quantityInput = document.getElementById('quantity')
  const totalPriceElement = document.getElementById('totalPrice')

  function calculateTotalPrice() {
    const startDate = new Date(startDateInput.value)
    const endDate = new Date(endDateInput.value)
    const quantity = parseInt(quantityInput.value, 10)
    const days = (endDate - startDate) / (1000 * 3600 * 24)

    if (days > 0 && !isNaN(days)) {
      const totalPrice = days * selectedCar.pricePerDay * quantity
      totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`
    }
  }

  startDateInput.addEventListener('change', calculateTotalPrice)
  endDateInput.addEventListener('change', calculateTotalPrice)
  quantityInput.addEventListener('input', calculateTotalPrice)
})
