<?php

class Setting

{
    private $error = "";

    public function get_all()
    {

        $db = Database::newInstance();
        $query = "select * from settings";
        return $db->read($query);
    }
}
