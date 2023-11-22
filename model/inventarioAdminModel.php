<?php
require_once('conexion.php');
class InventarioAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function Read(){
        $sql = "SELECT p.nombre,p.marca,p.contenido,i.*,r.id_repartidor, CONCAT(r.nombre,' ',r.apellido) as nombres
        FROM productos p 
        JOIN inventario i 
        ON p.id_producto=i.id_producto
        JOIN repartidor r
        ON r.id_repartidor=i.id_repartidor";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ReadRepartidores(){
        $sql = "SELECT id_repartidor, CONCAT(nombre,' ',apellido) AS nombres FROM repartidor;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ReadProductos(){
        $sql = "SELECT id_producto, CONCAT(nombre,' ',marca) AS nombreProducto FROM productos;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Create($id_producto,$fecha,$cantidad,$id_repartidor){
        $sql = "INSERT INTO inventario VALUES(null,'$id_producto','$fecha','$cantidad','$id_repartidor');";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function UpdateAlmacen($id_producto,$cantidad,$fecha){
        $sql = "UPDATE almacen SET cantidad_stock=cantidad_stock + '$cantidad', fecha_ultima_actualizacion = '$fecha' WHERE id_producto='$id_producto';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    
}