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
    public function readPersonal() {
        $data = $this->consultaAccion->ReadPersonal();
        $json = array();
        while($row = $data->fetch_array(MYSQLI_ASSOC)){
            $json[]=array(
                "id_personal"=>$row['id'],
                "nombres"=>$row['nombres'],
            );
        }
        $jsonData=json_encode($json);
        echo $jsonData;
    }
    public function create($usuario,$password,$id_personal,$nivel) {
        //echo $usuario.' '.$password.' '.$id_personal.' '.$nivel;
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->consultaAccion->Create($usuario,$passwordHash,$id_personal,$nivel);
        if($result){
            echo 'datos insertados correctamente';
        }else{
            echo 'fallo la insercion';
        }
    }
    public function loginUnico($id){
        $data = $this->consultaAccion->LoginUnico($id);
        $jsonData = json_encode($data);
        echo $jsonData;
    }
    public function update() {

                
    }
    public function delete() {
        
    }
}

?>