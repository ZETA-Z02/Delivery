<?php 
#acciones que que se podra hacer con la informacion del cliente, clienteADmin
require_once("../model/clienteAdminModel.php");
class ClienteController{
    private $modelAccion;
    public function __construct() {
        $this->modelAccion = new ClienteAdminModel();
        return $this->modelAccion;
    }

    public function index(){

    }
    public function create(){

    }
    
}









?>