document.addEventListener('DOMContentLoaded', function () {
  const reservationData = JSON.parse(localStorage.getItem('reservationData'))
  if (reservationData) {
    document.getElementById('startDate').textContent = reservationData.startDate
    document.getElementById('endDate').textContent = reservationData.endDate
    document.getElementById('quantity').textContent = reservationData.quantity
    document.getElementById('totalPrice').textContent =
      reservationData.totalPrice
    document.getElementById('name').textContent = reservationData.name
    document.getElementById('email').textContent = reservationData.email
    document.getElementById('phone').textContent = reservationData.phone
  }

  document
    .getElementById('confirmOrderButton')
    .addEventListener('click', function () {
      // Convert reservationData to match database table format
      const formattedData = {
        email: reservationData.email,
        startDate: reservationData.startDate,
        endDate: reservationData.endDate,
        totalPrice: reservationData.totalPrice.replace('$', ''), // Remove dollar sign if present
        status: 'confirmed',
      }

      fetch('database.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formattedData),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            alert('Error: ' + data.error)
          } else {
            alert(
              'Order confirmed successfully! Your Order ID is ' + data.order_id
            )
            // Clear localStorage
            localStorage.removeItem('reservationData')
            localStorage.removeItem('selectedCar')

            window.location.href = 'index.php'
          }
        })
        .catch((error) => {
          console.error('Error:', error)
          alert(
            'An error occurred while confirming your order. Please try again.'
          )
        })
    })
})
