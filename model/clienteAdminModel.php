<?php 
require_once('conexion.php');

class ClienteAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function read(){
        $sql = 'SELECT * FROM clientes;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ClienteUnico($id){
        $sql = "SELECT * FROM clientes WHERE id_cliente='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Create($nombre,$apellido,$dni,$telefono,$direccion,$correo){
        $sql = "INSERT INTO clientes VALUES(null,'$nombre','$apellido','$dni','$telefono','$direccion','$correo');";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Update($id,$nombre,$apellido,$dni,$telefono,$direccion,$correo){
        $sql = "UPDATE clientes SET nombre = '$nombre',apellido = '$apellido', dni = '$dni', telefono = '$telefono', direccion = '$direccion',correo = '$correo' WHERE id_cliente = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Delete($id){
        $sql = "DELETE FROM clientes WHERE id_cliente = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function buscador($buscarCliente){
        $sql = "SELECT * FROM clientes WHERE nombre LIKE '$buscarCliente%';";
        $response = $this->conn->ConsultaCon($sql);
        return $response;
    }

}