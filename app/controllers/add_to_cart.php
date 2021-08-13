<?php

class Add_to_cart extends Controller
{
    public function index($id = '')
    {
        $id = esc($id);

        $DB = Database::newInstance();

        $ROWS = $DB->read("select * from products where id = :id limit 1", ["id" => $id]);

        if ($ROWS) {
            $ROW = $ROWS[0];

            if (isset($_SESSION['CART'])) {
                $ids = array_column($_SESSION['CART'], "id");

                if (in_array($ROW->id, $ids)) {
                    $key = array_search($ROW->id, $ids);
                    $_SESSION['CART'][$key]['qty']++;
                } else {
                    $arr = array();
                    $arr['id'] = $ROW->id;
                    $arr['qty'] = 1;

                    $_SESSION['CART'][] = $arr;
                }
            } else {
                $arr = array();
                $arr['id'] = $ROW->id;
                $arr['qty'] = 1;

                $_SESSION['CART'][] = $arr;
            }
        }

        show($_SESSION);

        // header("Location: " . ROOT . "shop");

        // die;
    }
}
