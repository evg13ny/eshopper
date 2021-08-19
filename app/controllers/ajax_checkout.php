<?php

class Ajax_checkout extends Controller
{
    public function index($data_type = '', $id = '')
    {
        $countries = $this->load_model('Countries');

        $data = $countries->get_states($id);

        echo json_encode($data);
    }
}
