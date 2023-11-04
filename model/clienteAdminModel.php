<?php 
require_once('conexion.php');

class ClienteAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function getAll(){
        $sql = '';
    }

}