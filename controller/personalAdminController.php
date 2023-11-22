<?php 
#acciones que se hara en la Pagina ADmin Personal, sera para el admin, podra hacer acciones con los datos del personal
require_once("../model/personalAdminModel.php");
class PersonalAdminController{
    private $consultaAccion;
    public function __construct(){
        $this->consultaAccion = new PersonalAdminModel();
        return $this->consultaAccion;
    }
    public function Read(){
        $data = $this->consultaAccion->read();
        $json = array();
        
        while ($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "id"=> $row["id_personal"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "direccion"=> $row["direccion"],
                "estado"=> $estado = $row['estado'] == 1 ? 'activo' : 'inactivo',
                "cargo"=> $row["cargo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function personalUnico($id){
        $data = $this->consultaAccion->personalUnico($id);
        $jsonstring = json_encode($data);
        echo $jsonstring;

    }
    public function create($nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo){
        if($estado == "activo"){
            $estado = 1;            
        }else{
            $estado = 0;
        }
        $respuesta = $this->consultaAccion->CrearPersonal($nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo);
        if($respuesta){
            echo "guardado correctamente";
        }else{
            echo "fallo al guardar";
        }
    }
    
    public function update($id,$nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo){
        $respuesta = $this->consultaAccion->update($id,$nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo);
        if($respuesta){
            echo "editado correctamente, actualizado";
        }else{
            echo "fallo al editar-actualizado";
        }
    }
    public function delete($id){
        $respuesta = $this->consultaAccion->delete($id);
        if($respuesta){
            echo "eliminado correctamente al usuario unico por id";
        }else{
            echo "ERROR al eliminar al personal seleccionado";
        }
    }
    public function buscardor($buscarPersonal){
        $data = $this->consultaAccion->buscador($buscarPersonal);
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_personal"],
                "nombre"=> $row["nombre"],
                "apellido"=> $row["apellido"],
                "dni"=> $row["dni"],
                "telefono"=> $row["telefono"],
                "direccion"=> $row["direccion"],
                "estado"=> $estado = $row['estado'] == 1 ? 'activo' : 'inactivo',
                "cargo"=> $row["cargo"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

}









?>
