<?php

class Search
{

    public static function get_categories()
    {

        $DB = Database::newInstance();
        $query = "select id, category from categories where disabled = 0 order by views desc";
        $data = $DB->read($query);

        if (is_array($data)) {

            foreach ($data as $row) {

                echo "<option id='$row->id'>$row->category</option>";
            }
        }
    }

    public static function get_years()
    {

        $DB = Database::newInstance();
        $query = "select id, date from products group by year(date)";
        $data = $DB->read($query);

        if (is_array($data)) {

            foreach ($data as $row) {

                echo "<option>" . date("Y", strtotime($row->date)) . "</option>";
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

                echo "<input id=\"$row->id\" value=\"$row->id\" class=\"form-checkbox-input\" type=\"checkbox\" name=\"brand-$num\">
                <label for=\"$row->id\">$row->brand</label> &nbsp ";

                $num++;
            }
        }
    }
}
