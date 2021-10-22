<?php $this->view("header", $data); ?>

<?php $this->view("slider", $data); ?>

<?php

$str = '{"id":"WH-66445223J0522635N-3U789487FR927973U","event_version":"1.0","create_time":"2021-10-21T08:50:13.010Z","resource_type":"checkout-order","resource_version":"2.0","event_type":"CHECKOUT.ORDER.APPROVED","summary":"An order has been approved by buyer","resource":{"create_time":"2021-10-21T08:33:13Z","purchase_units":[{"reference_id":"default","amount":{"currency_code":"RUB","value":"13.20","breakdown":{"item_total":{"currency_code":"RUB","value":"10.00"},"shipping":{"currency_code":"RUB","value":"3.00"},"tax_total":{"currency_code":"RUB","value":"0.20"}}},"payee":{"email_address":"sb-yp7bd5780768@business.example.com","merchant_id":"EBJTVUSHVPBTN"},"description":"Мой товар","shipping":{"name":{"full_name":"John Doe"},"address":{"address_line_1":"25513540 River N343 W","admin_area_2":"Den Haag","admin_area_1":"2585","postal_code":"1015 CS","country_code":"NL"}}}],"links":[{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G","rel":"self","method":"GET"},{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G","rel":"update","method":"PATCH"},{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G/capture","rel":"capture","method":"POST"}],"id":"6MJ65684UE783060G","intent":"CAPTURE","payer":{"name":{"given_name":"John","surname":"Doe"},"email_address":"sb-i43m698192455@personal.example.com","payer_id":"KL82X6TRPKHDQ","address":{"country_code":"NL"}},"status":"APPROVED"},"links":[{"href":"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-66445223J0522635N-3U789487FR927973U","rel":"self","method":"GET"},{"href":"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-66445223J0522635N-3U789487FR927973U/resend","rel":"resend","method":"POST"}]}';
echo "<pre>";
$obj = json_decode($str);
echo $obj->id . "<br>";
echo $obj->event_type . "<br>";
echo $obj->resource->purchase_units[0]->amount->value . "<br>";
echo $obj->resource->purchase_units[0]->description . "<br>";
echo $obj->resource->status . "<br>";
echo $obj->resource->payer->name->given_name . "<br>";
echo $obj->resource->payer->name->surname . "<br>";
echo $obj->resource->payer->email_address . "<br>";
echo $obj->resource->payer->payer_id . "<br>";
echo $obj->summary . "<br>";
echo "<br>";
print_r($obj);

?>

<section>
	<div class="container">
		<div class="row">
			<center>
				<h1>Thanks for shopping with is!</h1>
			</center>
		</div>
	</div>
</section>

<?php $this->view("footer", $data); ?>