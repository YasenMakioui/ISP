<?php

class Conection {

    private $conn;

    public function __construct()
    {   
        $this->conn = new PDO('mysql:host=localhost', 'admin', 'M@n@cor123');
    }

    public function getConection() {
        return $this->conn;
    }
}