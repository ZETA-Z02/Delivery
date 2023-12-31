<?php
#acciones que se hara con los pedidos, el admin podra visualizar todos los pedidos y hacer acciones como buscar o eliminar(con RESTRICCIONES)
require_once("../model/pedidosAdminModel.php");
class PedidosController
{
    private $consultaAccion;
    public function __construct()
    {
        $this->consultaAccion = new PedidosAdminModel();
        return $this->consultaAccion;
    }
    public function index()
    {
        $json = array();
        $pedidos = $this->consultaAccion->Pedidos();
        while ($row = $pedidos->fetch_array(MYSQLI_ASSOC)) {
            $json[]=array(
                "id_pedido"=>$row['id_pedido'],
                "id_cliente"=>$row['id_cliente'],
                "destino"=>$row['destino'],
                "id_personal"=>$row['id_personal'],
            );
        }
        $jsonData = json_encode($json);
        echo $jsonData;
    }
    public function readDetalles($id)
    {
        $json = array();
        $detalles = $this->consultaAccion->Detalles($id);
        while ($row = $detalles->fetch_array(MYSQLI_ASSOC)) {
            $json[]=array(
                "id_pedido"=>$row['id_pedido'],
                "id_producto"=>$row['id_producto'],
                "cantidad"=>$row['cantidad'],
                "unidad"=>$row['unidad_medida'],
                "precio"=>$row['precio'],
                "subtotal"=>$row['subtotal'],
            );
        }
        $jsonData = json_encode($json);
        echo $jsonData;
    }
}

// $clase = new PedidosController();
// echo $clase->index();
