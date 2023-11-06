<?php 
require_once('conexion.php');
//MODELO PARA LAS CONSULTAS DE LA PAGINA COMPRAS-ACCIONES QUE TENDRA EN CLIENTE
class ComprasModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    //metodo para VER TODOS LOS PRODUCTOS DISPONIBLES DEL ALMACEN CON SU DESCRIPCION DEL PRODUCTO
    public function Read(){
        $sql = 'SELECT a.cantidad ,p.* 
        FROM almacen a 
        INNER JOIN productos p 
        ON a.id_producto=p.id_producto
        WHERE a.cantidad>0;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    

}
?>