<?php

class Conection {

    private $conn;

    public function __construct()
    {   
        $this->conn = new mysqli('localhost', 'admin', 'M@n@cor123');
    }

    public function getConection() {
        
        if (!$this->conn->select_db('isp')) {
            return false;
        }
        return $this->conn;
    }
}