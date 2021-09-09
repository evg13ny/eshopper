<?php $this->view("header", $data); ?>

<div style="text-align: center;">

	<h2>Thank you for shopping this us!</h2>

	<h4>Your order was successful</h4><br><br>

	<div>What would you like to do next?</div><br>

	<a href="<?= ROOT ?>shop">
		<input type="button" class="btn btn-warning" value="Continue shopping">
	</a>

	<a href="<?= ROOT ?>profile">
		<input type="button" class="btn btn-warning" value="View your orders">
	</a>

	<br><br>

</div>

<?php $this->view("footer", $data); ?>