document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('order-form');

  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevents the default form submission behavior

      const fullName = document.getElementById('fName').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      const service = document.getElementById('service').value;
      const provider = document.getElementById('Service provider').value;

      if (validateForm(fullName, email, phone, service, provider)) {
          const orderDetails = {
              name: fullName,
              email: email,
              phone: phone,
              service: service,
              provider: provider
          };

          console.log('Order Submitted:', orderDetails);
          alert('Order Submitted Successfully!\n' + JSON.stringify(orderDetails, null, 2));
          
          // Here you can add code to send the orderDetails to the server if needed
      } else {
          alert('Please fill in all required fields.');
      }
  });

  function validateForm(name, email, phone, service, provider) {
      return name && email && phone && service && provider;
  }
});
