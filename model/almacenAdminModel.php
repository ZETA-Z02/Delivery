<?php 
require_once('conexion.php');
//
class AlmacenAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function read(){
        $sql = 'SELECT p.nombre, p.marca, p.contenido, a.cantidad_stock, a.fecha_ultima_actualizacion 
        FROM almacen a 
        INNER JOIN productos p 
        ON a.id_producto = p.id_producto;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    

}