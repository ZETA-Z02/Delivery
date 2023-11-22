<?php 
require_once('conexion.php');
//MODELO PARA LAS CONSULTAS DE LA PAGINA LOGIN-VIEW- PARA VALIDAR DATOS Y DEJAR INGRESAR DEPENDIENDO EL NIVEL DE USUARIO
class LoginModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    //metodo para VER TODOS LOS PRODUCTOS DISPONIBLES DEL ALMACEN CON SU DESCRIPCION DEL PRODUCTO
    public function Validar($usuario){
        $sql = "SELECT * FROM login WHERE usuario = '$usuario';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para ver datos del cliente y pueda hacer pedidos
    public function ValidarCliente($cliente){
        $sql = "SELECT * FROM clientes WHERE id_cliente = '$cliente';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}
?>