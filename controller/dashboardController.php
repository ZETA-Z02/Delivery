<?php 
#acciones que se hara en el DASHBOARD
require_once("../model/dashboardModel.php");

class DashboardController{
    private $consultaAccion;
    public function __construct(){
        $this->consultaAccion=new DashboardModel();
        return $this->consultaAccion;
    }
    public function index(){
        $data = $this->consultaAccion->stock();
        $jsonName = array();
        $jsonStock = array();
        while ($row = mysqli_fetch_array($data)){
            array_push($jsonName, $row['nombre']);
            array_push($jsonStock, $row['cantidad_stock']);
        }
        $jsonData[] =array(
            "nombres"=>$jsonName,
            "stock"=>$jsonStock); 
        $jsonstring = json_encode($jsonData);
        echo $jsonstring;
    }
    public function create(){

    }
    
}









?>