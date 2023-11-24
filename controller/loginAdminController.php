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
        $dataPersonal = $this->consultaAccion->LoginUnicoNombre($id);
        $data["nombre"]=$dataPersonal['nombres'];
        // $dataArray=array();
        // $dataArray[]=array(
        //     "usuario"=>$data['usuario'],
        //     "password"=>$data['password'],
        //     "nivel"=>$data['nivel'],
        //     "id_login"=>$data['id_login'],
        //     "nombre"=>$dataPersonal['nombres']
        // );
        
        $jsonData = json_encode($data, JSON_FORCE_OBJECT);
        echo $jsonData;
    }
    public function update($usuario,$password,$id_login,$nivel) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->consultaAccion->Update($usuario,$passwordHash,$id_login,$nivel);
        if($result){
            echo 'se actualizo correctamente el login';
        }else{
            echo 'error en actualizar';
        }
                
    }
    public function delete($id) {
        $result = $this->consultaAccion->Delete($id);
        if($result){
            echo "borrado correctamente";
        }else{
            echo "no se logro borrar";
        }     
    }
}

?>