<?php

class Model {

    private $db;

    function __construct()
    {
        $this->db = $this->create_connection();
    }

    public function create_connection() {
        //IMPORTANTE!! INDICAR EL PUERTO! PARA MySQL :3308 Y PARA MariaDB:3306
        $host = 'localhost:MARAVILLA';
        $userName = 'root';
        $password = '';
        $database = 'db_todo_list';

        try {
            $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }

        return $db;
    }

    public function getDb() {
        return $this->db;
    }
}