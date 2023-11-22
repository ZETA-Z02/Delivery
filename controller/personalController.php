<?php 
#acciones que se hara en el personal, lo que podra hacer el personal, como visualizar los pedidos y demas

class PersonalController{
    private $consultaAccion;
    public function __construct(){
        //$this->consultaAccion = new PersonalAdminModel();
        //return $this->consultaAccion;
    }
    public function index(){

    }
    //CAMBIAR ESTE CREATE, TIPO EJEMPLO ES ESTOM CAMBIAR PARA QUE MUESTRE LOS PEDIDOS PENDIENTES
    public function create($nombre,$apellido,$dni,$telefono,$direccion,$estado,$cargo){
        $respuesta = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion'=> $direccion,
            'estado'=> $estado,
            'cargo'=> $cargo
        );
        
        echo json_encode($respuesta);
    }
    
}