<?php
class ProductosAdminModel{
    private $conn;
    public function __construct(){
        $this->conn = new Conexion();
        return $this->conn;
    }
    public function Read(){
        $sql = 'SELECT * FROM productos;';
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ProductoUnico($id){
        $sql = "SELECT * FROM productos WHERE id_producto='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Create($nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen){
        $sql = "INSERT INTO productos VALUES(null,'$nombre','$descripcion','$marca','$contenido','$unidades','$precio','$imagen');";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Update($id,$nombre,$descripcion,$marca,$contenido,$unidades,$precio,$imagen){
        $sql = "UPDATE productos SET nombre = '$nombre',descripcion = '$descripcion', marca = '$marca', contenido = '$contenido', unidades = '$unidades',precio = '$precio', imagen = '$imagen' WHERE id_producto = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function Delete($id){
        $sql = "DELETE FROM productos WHERE id_producto = '$id'";
        $response = $this->conn->ConsultaSin($sql);
        return $response;
    }
    public function buscador($buscarProducto){
        $sql = "SELECT * FROM productos WHERE nombre LIKE '$buscarProducto%' or id_producto LIKE '$buscarProducto%';";
        $response = $this->conn->ConsultaCon($sql);
        return $response;
    }
}


?>