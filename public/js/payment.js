paypal.Buttons({
    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '8'
          }
        }]
      });
    }
  }).render('#paypal-button-container');