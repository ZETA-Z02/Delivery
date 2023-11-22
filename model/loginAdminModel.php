<?php 
require_once('./conexion.php');

class LoginAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function Read(){
        $sql = "SELECT * FROM login;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
}


?>