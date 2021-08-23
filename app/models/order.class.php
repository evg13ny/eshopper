<?php

class Order extends Controller

{

    public $errors = array();

    public function save_order($POST, $ROWS, $user_url, $sessionid)
    {

        foreach ($POST as $key => $value) {

            if ($key == "country") {

                if ($value == "" || $value == "-- Country --") {

                    $this->errors[] = "Please enter a valid country";
                }
            }

            if ($key == "state") {

                if ($value == "" || $value == "-- State / Province / Region --") {

                    $this->errors[] = "Please enter a valid state";
                }
            }
        }

        return;

        $total = 0;

        foreach ($ROWS as $key => $row) {

            $total += $row->cart_qty * $row->price;
        }

        $db = Database::newInstance();

        if (is_array($ROWS) && count($this->errors) == 0) {

            $countries = $this->load_model('Countries');

            $data = array();

            $data['user_url']         = $user_url;
            $data['sessionid']        = $sessionid;
            $data['delivery_address'] = $POST['address1'] . "" . $POST['address2'];
            $data['total']            = $total;
            $country_obj              = $countries->get_country($POST['country']);
            $data['country']          = $country_obj->country;
            // $data['country']          = $countries->get_country($POST['country']);
            $state_obj                = $countries->get_state($POST['state']);
            $data['state']            = $state_obj->state;
            // $data['state']            = $countries->get_state($POST['state']);
            $data['zip']              = $POST['postal_code'];
            $data['tax']              = 0;
            $data['shipping']         = 0;
            $data['date']             = date("Y-m-d H:i:s");
            $data['phone']            = $POST['phone'];

            $query = "insert into orders (user_url,delivery_address,total,country,state,zip,tax,shipping,date,sessionid,phone) values (:user_url,:delivery_address,:total,:country,:state,:zip,:tax,:shipping,:date,:sessionid,:phone)";

            $result = $db->write($query, $data);

            // save details

            $orderid = 0;

            $query = "select id from orders order by id desc limit 1";

            $result = $db->read($query);

            if (is_array($result)) {

                $orderid = $result[0]->id;
            }

            foreach ($ROWS as $row) {

                $data = array();

                $data['orderid']     = $orderid;
                $data['qty']         = $row->cart_qty;
                $data['description'] = $row->description;
                $data['amount']      = $row->price;
                $data['total']       = $row->cart_qty * $row->price;
                $data['productid']   = $row->id;

                $query = "insert into order_details (orderid,qty,description,amount,total,productid) values (:orderid,:qty,:description,:amount,:total,:productid)";

                $result = $db->write($query, $data);
            }
        }
    }
}