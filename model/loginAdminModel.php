<?php 
require_once("conexion.php");

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
    //muestra al personal que todavia no tiene un login
    public function ReadPersonal(){
        $sql = "SELECT p.id_personal as id ,CONCAT(p.nombre,' ',p.apellido) AS nombres,l.* 
        FROM personal p 
        LEFT JOIN login l 
        ON p.id_personal=l.id_personal
        WHERE l.id_login IS null;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Create($usuario,$password,$id_personal,$nivel){
        $sql = "INSERT INTO login VALUES(null,'$usuario','$password',null,'$id_personal','$nivel');";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function LoginUnico($id){
        $sql = "SELECT * FROM login WHERE id_login = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function LoginUnicoNombre($id){
        $sql = "SELECT p.id_personal as id,CONCAT(p.nombre,' ',p.apellido) AS nombres,l.* 
        FROM personal p
        JOIN login l
        ON p.id_personal=l.id_personal
        WHERE l.id_login = $id;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Update($usuario,$password,$id_login,$nivel){
        $sql = "UPDATE login SET usuario='$usuario',password='$password',nivel='$nivel' WHERE id_login='$id_login';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function Delete($id){
        $sql = "DELETE FROM login WHERE id_login = '$id';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
}


?>