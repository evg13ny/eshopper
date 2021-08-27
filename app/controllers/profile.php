<?php

class Profile extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');

        $Order = $this->load_model('Order');

        $user_data = $User->check_login(true);

        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }

        $orders = $Order->get_orders_by_user($user_data->url_address);

        $data['page_title'] = "Profile";

        $data['orders'] = $orders;

        $this->view("profile", $data);
    }
}
