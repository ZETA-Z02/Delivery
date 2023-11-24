<?php 
#acciones que se hara con los productos, Pagina Admin Productos
require_once("../model/personalViewModel.php");
class PersonalViewController{
    private $consultaAccion;
    public function __construct() {
    $this->consultaAccion = new PersonalViewModel();
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
                "estado"=>$row['estado'],
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
    public function update($id){
        $result = $this->consultaAccion->Update($id);
        if($result){
            echo "se actualizo correctamente";
        }else{
            echo "error en actualizar";
        }
    }
}