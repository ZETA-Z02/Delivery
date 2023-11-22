<?php 
require_once("../model/almacenAdminModel.php");
#acciones que se hara en el almacen
class AlmacenController{
    private $modelAccion;
    public function __construct(){
        $this->modelAccion = new AlmacenAdminModel();
        return $this->modelAccion;
    }
    public function read(){
        $data = $this->modelAccion->Read();
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "nombre"=> $row["nombre"],
                "marca"=> $row["marca"],
                "contenido"=> $row["contenido"],
                "fecha"=> $row["fecha_ultima_actualizacion"],
                "cantidad"=> $row["cantidad_stock"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    public function create(){

    }  
}









?>