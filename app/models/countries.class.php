<?php

class Countries
{
    public function get_countries()
    {

        $DB = Database::newInstance();

        $query = "select * from countries order by id desc";

        $data = $DB->read($query);

        return $data;
    }

    public function get_states($id)
    {

        $arr['id'] = (int)$id;

        $DB = Database::newInstance();

        $query = "select * from states where parent = :id order by id desc";

        $data = $DB->read($query, $arr);

        return $data;
    }
}
