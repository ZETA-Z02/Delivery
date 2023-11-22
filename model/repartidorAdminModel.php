<?php
require_once('conexion.php');

class RepartidorAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function Read(){
        $sql = 'SELECT * FROM repartidor;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function RepartidorUnico($id){
        $sql = "SELECT * FROM repartidor WHERE id_repartidor='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Create($nombre,$apellido,$dni,$telefono,$vehiculo){
        $sql = "INSERT INTO repartidor VALUES(null,'$nombre','$apellido','$dni','$telefono','$vehiculo');";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Update($id,$nombre,$apellido,$dni,$telefono,$vehiculo){
        $sql = "UPDATE repartidor SET nombre = '$nombre',apellido = '$apellido', dni = '$dni', telefono = '$telefono', vehiculo = '$vehiculo' WHERE id_repartidor = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Delete($id){
        $sql = "DELETE FROM repartidor WHERE id_repartidor = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function buscador($buscarRepartidor){
        $sql = "SELECT * FROM repartidor WHERE nombre LIKE '$buscarRepartidor%' or id_repartidor LIKE '$buscarRepartidor%';";
        $response = $this->conn->ConsultaCon($sql);
        return $response;
    }
}