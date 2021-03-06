<?php

class Payment extends Controller
{

    public function index()
    {

        $data = file_get_contents('php://input');

        // $data = '{"id":"WH-66445223J0522635N-3U789487FR927973U","event_version":"1.0","create_time":"2021-10-21T08:50:13.010Z","resource_type":"checkout-order","resource_version":"2.0","event_type":"CHECKOUT.ORDER.APPROVED","summary":"An order has been approved by buyer","resource":{"create_time":"2021-10-21T08:33:13Z","purchase_units":[{"reference_id":"default","amount":{"currency_code":"RUB","value":"13.20","breakdown":{"item_total":{"currency_code":"RUB","value":"10.00"},"shipping":{"currency_code":"RUB","value":"3.00"},"tax_total":{"currency_code":"RUB","value":"0.20"}}},"payee":{"email_address":"sb-yp7bd5780768@business.example.com","merchant_id":"EBJTVUSHVPBTN"},"description":"Мой товар","shipping":{"name":{"full_name":"John Doe"},"address":{"address_line_1":"25513540 River N343 W","admin_area_2":"Den Haag","admin_area_1":"2585","postal_code":"1015 CS","country_code":"NL"}}}],"links":[{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G","rel":"self","method":"GET"},{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G","rel":"update","method":"PATCH"},{"href":"https://api.sandbox.paypal.com/v2/checkout/orders/6MJ65684UE783060G/capture","rel":"capture","method":"POST"}],"id":"6MJ65684UE783060G","intent":"CAPTURE","payer":{"name":{"given_name":"John","surname":"Doe"},"email_address":"sb-i43m698192455@personal.example.com","payer_id":"KL82X6TRPKHDQ","address":{"country_code":"NL"}},"status":"APPROVED"},"links":[{"href":"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-66445223J0522635N-3U789487FR927973U","rel":"self","method":"GET"},{"href":"https://api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-66445223J0522635N-3U789487FR927973U/resend","rel":"resend","method":"POST"}]}';
        // $filename = time() . "_.txt";
        // file_put_contents($filename, $data);

        $obj = json_decode($data);
        $DB = Database::newInstance();

        if (is_object($obj)) {

            $arr = array();
            $arr['trans_id'] =   $obj->id;
            $arr['event_type'] = $obj->event_type;
            $arr['amount'] =     $obj->resource->purchase_units[0]->amount->value;
            $arr['order_id'] =   $obj->resource->purchase_units[0]->description;
            $arr['status'] =     $obj->resource->status;
            $arr['first_name'] = $obj->resource->payer->name->given_name;
            $arr['last_name'] =  $obj->resource->payer->name->surname;
            $arr['email'] =      $obj->resource->payer->email_address;
            $arr['payer_id'] =   $obj->resource->payer->payer_id;
            $arr['summary'] =    $obj->summary;
            $arr['raw'] =        $data;
            $arr['date'] =       date("Y-m-d H:i:s");

            $query = "insert into payments 
            (trans_id,event_type,amount,order_id,status,first_name,last_name,email,payer_id,summary,raw,date) 
            values 
            (:trans_id,:event_type,:amount,:order_id,:status,:first_name,:last_name,:email,:payer_id,:summary,:raw,:date)";
            $DB->write($query, $arr);
        }
    }
}
