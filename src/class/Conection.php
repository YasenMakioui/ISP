<?php

class Conection {

    private $conn;

    public function __construct()
    {   
        $this->conn = new mysqli('localhost', 'admin', 'M@n@cor123');
    }

    public function getConection() {
        $this->conn->select_db('isp');
        return $this->conn;
    }
}