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
        while($datos=mysqli_fetch_assoc($consulta)){
            $cantidad = $datos["cantidad"];
            $idProducto = $datos["id_producto"];
            $nombre = $datos["nombre"];
            $descripcion = $datos["descripcion"];
            $marca = $datos["marca"];
            $contenido = $datos["contenido"];
            $unidades = $datos["unidades"];
            $precio = $datos["precio"];
            $imagen = $datos["imagen"];
        }
    }
    public function create(){

    }
    
}









?>