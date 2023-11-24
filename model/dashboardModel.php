<?php 
require_once('conexion.php');
//MODELO PARA LAS CONSULTAS DE LA PAGINA COMPRAS-ACCIONES QUE TENDRA EN CLIENTE
class DashboardModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function stock(){
        $sql = "SELECT p.nombre, a.cantidad_stock
        FROM almacen a 
        INNER JOIN productos p 
        ON a.id_producto = p.id_producto;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
}