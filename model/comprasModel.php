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
        $sql = 'SELECT a.cantidad_stock ,p.* 
        FROM almacen a 
        INNER JOIN productos p 
        ON a.id_producto=p.id_producto
        WHERE a.cantidad_stock>0;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    //obtener el personal random, el cual sera el responsable del pedido
    public function PersonalRandom(){
        $sql = "SELECT * FROM personal ORDER BY RAND() LIMIT 1;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //insertamos a la base de datos el pedido
    public function Pedido($id_personal,$id_cliente,$descripcion,$destino,$estado,$fecha,$hora,$opcion_pago,$cantidad_total){
        $sql = "INSERT INTO pedidos VALUES(null, '$id_personal','$id_cliente','$descripcion','$destino', '$estado', '$fecha','$hora','$opcion_pago','$cantidad_total');";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    //obtenedos el ultimo pedido por el usuario para insertar datos a pedidos_detalle
    public function PedidoUltimo($id_personal,$id_cliente,$estado,$fecha,$hora){
        $sql = "SELECT id_pedido FROM pedidos WHERE id_personal='$id_personal' AND id_cliente='$id_cliente' AND estado='$estado' AND fecha='$fecha' AND hora='$hora';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //insertar datos a Pedidos_detalle
    public function PedidoDetalle($id_pedido,$id_producto,$cantidad,$unidad_medida,$precio,$subtotal){
        $sql = "INSERT INTO pedidos_detalle VALUES(null,'$id_pedido','$id_producto','$cantidad','$unidad_medida','$precio','$subtotal');";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }
    public function ProductoUnico($idProducto){
        $sql = "SELECT * FROM productos WHERE id_producto='$idProducto';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function DeletePedidoFail($idPedido){
        $sql = "DELETE FROM pedidos WHERE id_pedido = '$idPedido';";
        $result = $this->conn->ConsultaSin($sql);
        return $result;
    }

}
?>