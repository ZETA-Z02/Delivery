<?php

require_once("conexion.php");

class RegistroModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function Create($nombre,$apellido,$dni,$telefono,$direccion,$correo){
        $sql = "INSERT INTO clientes VALUES(null,'$nombre','$apellido','$dni','$telefono','$direccion','$correo')";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function CreateLogin($usuario,$password,$id_cliente){
        $sql = "INSERT INTO login VALUES(null,'$usuario','$password','$id_cliente',null,'3')";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function ReadCliente($dni){
        $sql = "SELECT * FROM clientes WHERE dni='$dni';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function DeleteClienteFail($id){
        $sql = "DELETE FROM clientes WHERE id_cliente='$id';";
        $data = $this->conn->ConsultaSin($sql);
        return $data;
    }


}

?>