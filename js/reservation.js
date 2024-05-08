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
    // 如果没有车辆信息，提示用户并可能跳转回选择页面
    carDetailsDiv.innerHTML =
      '<p>No car selected. Please go back to select a car.</p>'
  }

  const form = document.getElementById('reservationForm')
  form.onsubmit = function (event) {
    event.preventDefault()
    // 这里可以添加将预订信息发送到服务器的代码
    console.log('Form submitted', {
      startDate: document.getElementById('startDate').value,
      endDate: document.getElementById('endDate').value,
      quantity: document.getElementById('quantity').value,
    })
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
