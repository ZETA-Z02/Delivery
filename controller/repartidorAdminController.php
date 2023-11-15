<?php 
#acciones que se hara con el repartidor, Pagina Admin Repartidor, acciones con la info del repartidor
require_once("../model/repartidorAdminModel.php");
class RepartidorAdminController{
    private $modelAccion;
    public function __construct() {
    $this->modelAccion = new RepartidorAdminModel();
    return $this->modelAccion;
    }

    public function read(){
        $data = $this->modelAccion->Read();
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_repartidor"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "vehiculo"=> $row["vehiculo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function repartidorUnico($id){
        $data = $this->modelAccion->RepartidorUnico($id);
        $jsonstring = json_encode($data);
        echo $jsonstring;

    }
    public function create($nombre,$apellido,$dni,$telefono,$vehiculo){
        $respuesta = $this->modelAccion->Create($nombre,$apellido,$dni,$telefono,$vehiculo);
        if($respuesta){
            echo "guardado correctamente";
        }else{
            echo "fallo al guardar";
        }
    }
    
    public function update($id,$nombre,$apellido,$dni,$telefono,$vehiculo){
        $respuesta = $this->modelAccion->Update($id,$nombre,$apellido,$dni,$telefono,$vehiculo);
        if($respuesta){
            echo "editado correctamente, actualizado";
        }else{
            echo "fallo al editar-actualizado";
        }
    }
    public function delete($id){
        $respuesta = $this->modelAccion->Delete($id);
        if($respuesta){
            echo "eliminado correctamente al usuario unico por id";
        }else{
            echo "ERROR al eliminar al personal seleccionado";
        }
    }
    public function buscardor($buscarRepartidor){
        $data = $this->modelAccion->buscador($buscarRepartidor);
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_repartidor"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "vehiculo"=> $row["vehiculo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
}









?>