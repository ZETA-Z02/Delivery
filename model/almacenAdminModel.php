<?php 
require_once('conexion.php');
//
class AlmacenAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    

}