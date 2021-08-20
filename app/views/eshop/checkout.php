<?php $this->view("header", $data); ?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div>
		<!--/breadcrums-->

		<div class="register-req">
			<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
		</div>
		<!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-6 clearfix">
					<div class="bill-to">
						<p>Bill To</p>
						<div class="form-one">
							<form>
								<input type="text" placeholder="Address 1 *" autofocus required>
								<input type="text" placeholder="Address 2">
								<input type="text" placeholder="Phone *" required>
							</form>
						</div>
						<div class="form-two">
							<form method="POST">
								<input type="text" placeholder="Zip / Postal Code *" required>
								<select name="country" class="js-country" oninput="get_states(this.value)" required>
									<option>-- Country --</option>

									<?php if (isset($countries) && $countries) : ?>
										<?php foreach ($countries as $row) : ?>

											<option value="<?= $row->id ?>"><?= $row->country ?></option>

										<?php endforeach; ?>
									<?php endif; ?>

								</select>
								<select name="state" class="js-state">
									<option>-- State / Province / Region --</option>
								</select>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="order-message">
						<p>Shipping Order</p>
						<textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
					</div>
				</div>
			</div>
		</div>

		<a href="<?= ROOT ?>pay">
			<input type="button" class="btn btn-warning pull-right" value="Pay >">
		</a>

		<a href="<?= ROOT ?>cart">
			<input type="button" class="btn btn-warning pull-left" value="< Back to cart">
		</a>

	</div>
</section>
<!--/#cart_items-->

<script type="text/javascript">
	function get_states(id) {

		send_data({
			id: id.trim()
		}, "get_states");
	}

	function send_data(data = {}, data_type) {
		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
				handle_result(ajax.responseText);
			}
		});

		ajax.open("POST", "<?= ROOT ?>ajax_checkout/" + data_type + "/" + JSON.stringify(data), true);
		ajax.send();
	}

	function handle_result(result) {
		console.log(result);
		if (result != "") {
			var obj = JSON.parse(result);

			if (typeof obj.data_type != 'undefined') {
				if (obj.data_type == "get_states") {

					var select_input = document.querySelector(".js-state");
					select_input.innerHTML = "<option>-- State / Province / Region --</option>";
					
					for (var i = 0; i < obj.data.length; i++) {
						select_input.innerHTML += "<option value='" + obj.data[i].id + "'>" + obj.data[i].state + "</option>";
					}
				}
			}
		}
	}
</script>

<?php $this->view("footer", $data); ?>