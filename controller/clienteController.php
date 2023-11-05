<?php 
#acciones que que se podra hacer con la informacion del cliente, clienteADmin
require_once("../model/clienteAdminModel.php");
class ClienteController{
    private $modelAccion;
    public function __construct() {
        $this->modelAccion = new ClienteAdminModel();
        return $this->modelAccion;
    }

    public function Read(){
        $data = $this->modelAccion->Read();
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_cliente"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "direccion"=> $row["direccion"],
                "correo"=> $row["correo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function clienteUnico($id){
        $data = $this->modelAccion->ClienteUnico($id);
        $jsonstring = json_encode($data);
        echo $jsonstring;

    }
    public function create($nombre,$apellido,$dni,$telefono,$direccion,$correo){
        $respuesta = $this->modelAccion->Create($nombre,$apellido,$dni,$telefono,$direccion,$correo);
        if($respuesta){
            echo "guardado correctamente";
        }else{
            echo "fallo al guardar";
        }
    }
    
    public function update($id,$nombre,$apellido,$dni,$telefono,$direccion,$correo){
        $respuesta = $this->modelAccion->Update($id,$nombre,$apellido,$dni,$telefono,$direccion,$correo);
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
    public function buscardor($buscarPersonal){
        $data = $this->modelAccion->buscador($buscarPersonal);
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_cliente"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "direccion"=> $row["direccion"],
                "correo"=> $row["correo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
}









?>