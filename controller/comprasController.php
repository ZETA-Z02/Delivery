<?php 
#acciones que hara el cliente, como comprar y seleccionar Compras usado por el cliente
require_once("../model/comprasModel.php");
class ComprasController{
    private $consultaAccion;
    public function __construct(){
        $this->consultaAccion = new ComprasModel();
        return $this->consultaAccion;
    }
    //ESTE METODO MUESTRA TODO EN EL INDEX DE COMPRAS-LOS PRODUCTOS DISPONIBLES DEL ALMACEN
    public function index(){
        $consulta = $this->consultaAccion->Read();
        //METER TODO EN UN JSON PARA QUE SE MEUSTRE LOS DATOS BIEN
        $json = array();
        while($datos=mysqli_fetch_array($consulta)){
            $json[]=array(
                "cantidad"=> $datos["cantidad"],
                "id_producto"=> $datos["id_producto"],
                "nombre"=> $datos["nombre"],
                "descripcion"=> $datos["descripcion"],
                "marca"=> $datos["marca"],
                "contenido"=> $datos["contenido"],
                "unidades"=> $datos["unidades"],
                "precio"=> $datos["precio"],
                "imagen"=> $datos["imagen"],
            );
            //estos son los datos que vienen de la BD
        }
        $jsonResponse = json_encode($json);
        echo $jsonResponse;
    }
    public function create(){

    }
    
}

// $re= new ComprasController();
// $re->index();

