<?php

class Order

{

    public function save_order($POST, $ROWS, $user_url, $sessionid)
    {

        // show($POST);

        $total = 0;

        foreach ($ROWS as $key => $row) {

            $total += $row->cart_qty * $row->price;
        }

        $db = Database::newInstance();

        if (is_array($ROWS)) {

            $data = array();

            $data['user_url']         = $user_url;
            $data['sessionid']        = $sessionid;
            $data['delivery_address'] = $POST['address1'] . "" . $POST['address2'];
            $data['total']            = $total;
            $data['country']          = $POST['country'];
            $data['state']            = $POST['state'];
            $data['zip']              = $POST['postal_code'];
            $data['tax']              = 0;
            $data['shipping']         = 0;
            $data['date']             = date("Y-m-d H:i:s");
            $data['phone']            = $POST['phone'];

            $query = "insert into orders (user_url,delivery_address,total,country,state,zip,tax,shipping,date,sessionid,phone) values (:user_url,:delivery_address,:total,:country,:state,:zip,:tax,:shipping,:date,:sessionid,:phone)";

            $result = $db->write($query, $data);
        }
    }
}
