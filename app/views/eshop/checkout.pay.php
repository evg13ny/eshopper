<?php $this->view("header", $data); ?>

<div style="text-align: center;">

	<h1>Select a payment method below</h1>

	<div id="smart-button-container">
		<div style="text-align: center;">
			<div id="paypal-button-container"></div>
		</div>
	</div>
	<script src="https://www.paypal.com/sdk/js?client-id=AQHxY_ehAW56vlCCfTJN7gYlCAEyNgRTRqrTJQ7FPBQHKUcFDZKGUStHFgDgXR4euCk1wMI9afT5Y_rj&enable-funding=venmo&currency=RUB" data-sdk-integration-source="button-factory"></script>
	<script>
		function initPayPalButton() {
			paypal.Buttons({
				style: {
					shape: 'pill',
					color: 'blue',
					layout: 'vertical',
					label: 'paypal',

				},

				createOrder: function(data, actions) {
					return actions.order.create({
						purchase_units: [{
							"description": "Мой товар",
							"amount": {
								"currency_code": "RUB",
								"value": 13.2,
								"breakdown": {
									"item_total": {
										"currency_code": "RUB",
										"value": 10
									},
									"shipping": {
										"currency_code": "RUB",
										"value": 3
									},
									"tax_total": {
										"currency_code": "RUB",
										"value": 0.2
									}
								}
							}
						}]
					});
				},

				onApprove: function(data, actions) {
					return actions.order.capture().then(function(orderData) {

						// Full available details
						// console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

						// Show a success message within this page, e.g.
						// const element = document.getElementById('paypal-button-container');
						// element.innerHTML = '';
						// element.innerHTML = '<h3>Thank you for your payment!</h3>';

						// Or go to another URL:  actions.redirect('thank_you.html');

						window.location.href = '<?= ROOT . "checkout/thank_you?mode=approved" ?>';
					});
				},

				onCancel: function(data) {
					window.location.href = '<?= ROOT . "checkout/thank_you?mode=cancel" ?>';
				},

				onError: function(err) {
					window.location.href = '<?= ROOT . "checkout/thank_you?mode=error" ?>';
				}

			}).render('#paypal-button-container');
		}
		initPayPalButton();
	</script>

</div>

<?php $this->view("footer", $data); ?>