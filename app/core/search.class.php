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
}
