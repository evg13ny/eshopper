<?php

class Setting

{
    private $error = array();

    public function get_all()
    {

        $db = Database::newInstance();
        $query = "select * from settings";
        return $db->read($query);
    }

    public function get_all_as_object()
    {

        $db = Database::newInstance();
        $query = "select * from settings";
        $data = $db->read($query);
        $settings = (object)[];

        if (is_array($data)) {
            foreach ($data as $row) {
                $setting_name = $row->setting;
                $settings->$setting_name = $row->value;
            }
        }
        return $settings;
    }

    public function save($POST)
    {

        $this->$error = array();
        $db = Database::newInstance();

        foreach ($POST as $key => $value) {

            $arr = array();
            $arr['setting'] = $key;
            $arr['value'] = $value;
            $query = "update settings set value = :value where setting = :setting ;imit 1";
            $db->write($query, $arr);
            $this->$error[] = "an error";
        }

        return $this->$error;
    }
}
