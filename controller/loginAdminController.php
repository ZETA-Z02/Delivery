<?php 
#Acciones que tendra el administrador con la tabla login
require_once("../model/loginAdminModel.php");
class LoginAdminController {
    private $consultaAccion;
    public function __construct() {
        $this->consultaAccion = new LoginAdminModel();
        return $this->consultaAccion;
    }   
    public function read() {
        $data = $this->consultaAccion->Read();
        $json = array();
        while($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "id_login"=>$row['id_login'],
                "usuario"=>$row['usuario'],
                "password"=>$row['password'],
                "id_cliente"=>$row['id_cliente'],
                "id_personal"=>$row['id_personal'],
                "nivel"=>$row['nivel'],
            );
        }
        $jsonData=json_encode($json);
        echo $jsonData;
    }
    public function Create() {
        
    }
    public function Update() {
                
    }
    public function Delete() {
        
    }
}

?>