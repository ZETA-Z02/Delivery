<?php 
#acciones que se hara con los productos, Pagina Admin Productos
require_once("../model/productosAdminModel.php");
class ProductosController{
    private $modelAccion;
    public function __construct() {
    $this->modelAccion = new ProductosAdminModel();
    return $this->modelAccion;
    }

    public function read(){
        $data = $this->modelAccion->Read();
        $json = array();
        while ($row = mysqli_fetch_array($data)){
            $json[]=array(
                "id"=> $row["id_producto"],
                "nombre"=> $row["nombre"],
                "descripcion"=> $row["descripcion"],
                "marca"=> $row["marca"],
                "contenido"=> $row["contenido"],
                "unidades"=> $row["unidades"],
                "precio"=> $row["precio"],
                "imagen"=> $row["imagen"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function productoUnico($id){
        $data = $this->modelAccion->ProductoUnico($id);
        $jsonstring = json_encode($data);
        echo $jsonstring;

    }
    public function create($nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen){
        $respuesta = $this->modelAccion->Create($nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen);
        if($respuesta){
            echo "guardado correctamente";
        }else{
            echo "fallo al guardar";
        }
    }
    
    public function update($id,$nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen){
        $respuesta = $this->modelAccion->Update($id,$nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen);
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
                "descripcion"=> $row["descripcion"],
                "marca"=> $row["marca"],
                "contenido"=> $row["contenido"],
                "unidades"=> $row["unidades"],
                "precio"=> $row["precio"],
                "imagen"=> $row["imagen"],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
}









?>