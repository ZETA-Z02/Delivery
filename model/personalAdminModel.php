<?php 
require_once('conexion.php');

class PersonalAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function read(){
        $sql = 'SELECT * FROM personal;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function personalUnico($id){
        $sql = "SELECT * FROM personal WHERE id_personal='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function CrearPersonal($nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo){
        $sql = "INSERT INTO personal VALUES(null,'$nombre','$apellido','$dni','$telefono','$direccion','$estado','$cargo');";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function update($id,$nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo){
        $sql = "UPDATE personal SET nombre = '$nombre',apellido = '$apellido', dni = '$dni', telefono = '$telefono', direccion = '$direccion',estado = '$estado', cargo ='$cargo' WHERE id_personal = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function delete($id){
        $sql = "DELETE FROM personal WHERE id_personal = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function buscador($buscarPersonal){
        $sql = "SELECT * FROM personal WHERE nombre LIKE '$buscarPersonal%' or id_personal LIKE '$buscarPersonal%';";
        $response = $this->conn->ConsultaCon($sql);
        return $response;
    }


}


?>


   