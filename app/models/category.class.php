<?php

Class Category

{
    public function create($DATA)
    {
        $DB = Database::getInstance();

        $category = $DATA->data;

        $DB->write($query, $arr);
    }

    public function edit($DATA)
    {
    }

    public function delete($DATA)
    {
    }
}
