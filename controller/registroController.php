<?php 
require_once("../model/registroModel.php");

class RegistroController{
    private $consultaAccion;
    public function __construct(){
        $this->consultaAccion = new RegistroModel();
        return $this->consultaAccion;
    }
    public function create($nombre,$apellido,$dni,$telefono,$direccion,$correo,$usuario,$password){
        $result = $this->consultaAccion->Create($nombre,$apellido,$dni,$telefono,$direccion,$correo);
        if($result){
            $data = $this->consultaAccion->ReadCliente($dni);
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $resultLogin = $this->consultaAccion->CreateLogin($usuario,$passwordHash,$data['id_cliente']);
            if($resultLogin){
                echo true;
            }else{
                echo "No se pudo registrar su usuario-Se borra el cliene sin login";
                $this->consultaAccion->DeleteClienteFail($data['id_cliente']);
            }
        }else{
            "no se pudo registrar clientes";
        }
    }
}



?>