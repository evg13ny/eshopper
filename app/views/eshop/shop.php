<?php $this->view("header", $data); ?>

<section id="advertisement">
	<div class="container">
		<img src="<?= ASSETS . THEME ?>images/shop/advertisement.jpg" alt="" />
	</div>
</section>

<section>
	<div class="container">
		<div class="row">

			<?php $this->view("sidebar.inc", $data); ?>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Features Items</h2>

					<?php if (isset($ROWS) && is_array($ROWS)) : ?>
						<?php foreach ($ROWS as $row) : ?>

							<!--one product-->

							<?php $this->view("product.inc", $row); ?>

							<!--/one product-->

						<?php endforeach; ?>
					<?php endif; ?>

					<?php Page::show_links() ?>

				</div>
				<!--features_items-->
			</div>
		</div>
	</div>
</section>

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
					console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

					// Show a success message within this page, e.g.
					const element = document.getElementById('paypal-button-container');
					element.innerHTML = '';
					element.innerHTML = '<h3>Thank you for your payment!</h3>';

					// Or go to another URL:  actions.redirect('thank_you.html');

				});
			},

			onError: function(err) {
				console.log(err);
			}
		}).render('#paypal-button-container');
	}
	initPayPalButton();
</script>

<?php $this->view("footer", $data); ?>