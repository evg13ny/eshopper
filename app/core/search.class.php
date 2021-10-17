<?php

class Search
{

    public static function get_categories($name = '')
    {

        $DB = Database::newInstance();
        $query = "select id, category from categories where disabled = 0 order by views desc";
        $data = $DB->read($query);

        if (is_array($data)) {

            foreach ($data as $row) {

                echo "<option value='$row->id' " . self::get_sticky('select', $name, $row->id) . ">$row->category</option>";
            }
        }
    }

    public static function get_years($name)
    {

        $DB = Database::newInstance();
        $query = "select id, date from products group by year(date)";
        $data = $DB->read($query);

        if (is_array($data)) {

            foreach ($data as $row) {

                $year =  date("Y", strtotime($row->date));
                echo "<option " . self::get_sticky('select', $name, $year) . ">" . $year . "</option>";
            }
        }
    }

    public static function get_brands()
    {

        $DB = Database::newInstance();
        $query = "select id, brand from brands where disabled = 0 order by views desc";
        $data = $DB->read($query);

        if (is_array($data)) {

            $num = 0;

            foreach ($data as $row) {

                echo "<input " . self::get_sticky('checkbox', 'brand-' . $num, $row->id) . " id=\"$row->id\" value=\"$row->id\" class=\"form-checkbox-input\" type=\"checkbox\" name=\"brand-$num\">
                <label for=\"$row->id\">$row->brand</label> &nbsp ";

                $num++;
            }
        }
    }

    public static function get_sticky($type, $name, $value = '')
    {

        switch ($type) {

            case 'textbox':
                echo isset($_GET[$name]) ? $_GET[$name] : "";
                break;

            case 'select':
                return isset($_GET[$name]) && $value == $_GET[$name] ? "selected='true'" : "";
                break;

            case 'number':
                echo isset($_GET[$name]) ? $_GET[$name] : "0";
                break;

            case 'checkbox':
                return isset($_GET[$name]) && $value == $_GET[$name] ? "checked='true'" : "";
                break;

            default:
                break;
        }
    }

    public static function make_query($GET, $limit, $offset)
    {

        $params = array();

        // add description if available
        if (isset($GET['description']) && trim($GET['description']) != "") {

            $params['description'] = $GET['description'];
        }

        // add category if available
        if (isset($GET['category']) && trim($GET['category']) != "--Select Category--") {

            $params['category'] = $GET['category'];
        }


        // add year if available
        if (isset($GET['year']) && trim($GET['year']) != "--Select Year--") {

            $params['year'] = $GET['year'];
        }

        // add price if available
        if (isset($GET['min-price']) && trim($GET['max-price']) != "0" && trim($GET['min-price']) != "" && trim($GET['max-price']) != "") {

            $params['min-price'] = (float)$GET['min-price'];
            $params['max-price'] = (float)$GET['max-price'];
        }

        // add qty if available
        if (isset($GET['min-qty']) && trim($GET['max-qty']) != "0" && trim($GET['min-qty']) != "" && trim($GET['max-qty']) != "") {

            $params['min-qty'] = (int)$GET['min-qty'];
            $params['max-qty'] = (int)$GET['max-qty'];
        }

        // add brands if available
        $brands = array();

        foreach ($GET as $key => $value) {

            if (strstr($key, "brand-")) {

                $brands[] = $value;
            }
        }

        if (count($brands) > 0) {

            $params['brands'] = implode("','", $brands);
        }

        $query = " 
             select prod.*, cat.category as category_name, brands.brand as brand_name 
             from products as prod 
             join categories as cat on cat.id = prod.category 
             join brands on brands.id = prod.brand 
             ";

        if (count($params) > 0) {

            $query .= " where ";
        }

        if (isset($params['description'])) {

            $query .= " prod.description like '%$params[description]%' AND ";
        }

        if (isset($params['category'])) {

            $query .= " cat.id = '$params[category]' AND ";
        }

        if (isset($params['min-price'])) {

            $query .= " prod.price BETWEEN '" . $params['min-price'] . "' AND '" . $params['max-price'] . "' AND ";
        }

        if (isset($params['min-qty'])) {

            $query .= " prod.quantity BETWEEN '" . $params['min-qty'] . "' AND '" . $params['max-qty'] . "' AND ";
        }

        if (isset($params['year'])) {

            $query .= " YEAR(prod.date) = '$params[year]' AND ";
        }

        if (isset($params['brands'])) {

            $query .= " brands.id IN ('" . $params['brands'] . "') AND ";
        }

        $query = trim($query);
        $query = trim($query, 'AND');
        $query .= " order by prod.id desc limit $limit offset $offset ";

        return $query;
    }
}
