<?php 
require_once('conexion.php');
//MODELO PARA LAS CONSULTAS DE LA PAGINA LOGIN-VIEW- PARA VALIDAR DATOS Y DEJAR INGRESAR DEPENDIENDO EL NIVEL DE USUARIO
class PersonalViewModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    //metodo para VER TODOS LOS PRODUCTOS DISPONIBLES DEL ALMACEN CON SU DESCRIPCION DEL PRODUCTO
    public function Pedidos(){
        $sql = "SELECT * FROM pedidos WHERE estado != 'completado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    //para ver datos del cliente y pueda hacer pedidos
    public function Detalles($id){
        $sql = "SELECT * FROM pedidos_detalle WHERE id_pedido = '$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Update($id){
        $sql = "UPDATE pedidos SET estado = 'completado' WHERE id_pedido='$id';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
}
?>