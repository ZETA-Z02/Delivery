<?php
#acciones que se hara en el INVENTARIO inventarioADmin
require_once("../model/inventarioAdminModel.php");
class InventarioAdminController
{
    private $consultaAccion;
    public function __construct(){
        $this->consultaAccion = new InventarioAdminModel();
        return $this->consultaAccion;
    }
    public function read(){
        $data = $this->consultaAccion->Read();
        $json = array();
        while($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "nombreProducto"=>$row['nombre'],
                "marca"=>$row['marca'],
                "contenido"=>$row['contenido'],
                "cantidad"=>$row['cantidad'],
                "nombreRepartidor"=>$row['nombres'],
                "fecha"=>$row['fecha_entrega'],
            );
        }
        $jsonData = json_encode($json);
        echo $jsonData;
    }
    public function readProductos(){
        $data = $this->consultaAccion->ReadProductos();
        $json = array();
        while($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "idProducto"=>$row['id_producto'],
                "nombres"=>$row['nombreProducto'],
            );
        }
        $jsonData = json_encode($json);
        echo $jsonData;
    }
    public function readRepartidores(){
        $data = $this->consultaAccion->ReadRepartidores();
        $json = array();
        while($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "idRepartidor"=>$row['id_repartidor'],
                "nombres"=>$row['nombres'],
            );
        }
        $jsonData = json_encode($json);
        echo $jsonData;
    }
    public function create($id_producto,$fecha,$cantidad,$id_repartidor){
        $result = $this->consultaAccion->Create($id_producto,$fecha,$cantidad,$id_repartidor);
        if($result){
            $resultUpdate = $this->consultaAccion->UpdateAlmacen($id_producto,$cantidad,$fecha);
            echo "guardado exitosamente ".$resultUpdate;
        }else{
            echo "error al insertar datos inventario";
        }
    }
}
?>
