<?php

class Conection
{
/**
 * @author Yasen el Makioui
 */
    private $conn;

    //constructor que inicia el objecto
    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'admin', 'M@n@cor123');
    }


    //devuelve el objeto de conexion
    public function getConection()
    {

        if (!$this->conn->select_db('isp')) {
            return false;
        }
        return $this->conn;
    }

    //devuelve el objeto de xonexion usando un usuario en concreto
    public function getConectionByUser($user){
        $this->conn = new mysqli('localhost', $user, 'M@n@cor123');
        if (!$this->conn) {
            return true;
        }
        return false;
    }
}
