<?php
#acciones para el login, Como ingresar salir y demas
require_once("../model/loginModel.php");
class loginController
{
    private $consultaAccion;
    public function __construct()
    {
        $this->consultaAccion = new LoginModel();
        return $this->consultaAccion;
    }
    //EL USUARIO ES UNICO EN LA BASE DE DATOS, ASI QUE NO HAY PROBLEMAS CON DUPLICADOS-SE UTILIZA PASSWORD_HASH($CONTRASENA,BYENCRYPT)
    public function login($usuario, $password)
    {
        $data = $this->consultaAccion->Validar($usuario);
        if (password_verify($password, $data['password'])) {
            //echo 'usuario->'.$data['usuario'].' valido '.$data['nivel'];
            switch ($data['nivel']) {
                case 1:
                    session_start();
                    $_SESSION['usuario'] = 'admin';
                    $_SESSION['admin'] = $data['id_personal'];
                    echo 'http://localhost/delivery/view/dashboardAdmin.php';
                    break;
                case 2:
                    session_start();
                    $_SESSION['usuario'] = 'personal';
                    $_SESSION['personal'] = $data['id_personal'];
                    echo 'http://localhost/delivery/view/personalView.php';
                    break;
                case 3:
                    session_start();
                    $dataCliente = $this->consultaAccion->ValidarCliente($data['id_cliente']);
                    $_SESSION['usuario'] = 'cliente';
                    $_SESSION['cliente'] = $data['id_cliente'];
                    $_SESSION['destino'] = $dataCliente['direccion'];
                    echo 'http://localhost/delivery/view/comprasView.php';
                    break;
            }
        } else {
            echo false;
        }
    }
    public function getOut()
    {
    }
}
