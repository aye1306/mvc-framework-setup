<?php

class Example_Model
{
    private $db;
    private $table_name = "table name";
    public function __construct()
    {
        require_once "../config/class_database.php";
        $DB = new Class_Database();
        $this->db = $DB;
    }

    public function example_use_database()
    {

        //$data = $this->db->Query('SQL Syntax', []); 
        // [] parameter example => ['id'=>1,'name'=> 'nungaye']

        $data = '{"id":1,"name":"namo"}';
        return json_decode($data);
    }
}
