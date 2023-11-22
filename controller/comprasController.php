<?php
session_start();
#acciones que hara el cliente, como comprar y seleccionar Compras usado por el cliente
require_once("../model/comprasModel.php");
class ComprasController
{
    private $consultaAccion;
    public function __construct()
    {
        $this->consultaAccion = new ComprasModel();
        return $this->consultaAccion;
    }
    //ESTE METODO MUESTRA TODO EN EL INDEX DE COMPRAS-LOS PRODUCTOS DISPONIBLES DEL ALMACEN
    public function index()
    {
        $consulta = $this->consultaAccion->Read();
        //METER TODO EN UN JSON PARA QUE SE MEUSTRE LOS DATOS BIEN
        $json = array();
        while ($datos = mysqli_fetch_array($consulta)) {
            $json[] = array(
                "cantidad" => $datos["cantidad"],
                "id_producto" => $datos["id_producto"],
                "nombre" => $datos["nombre"],
                "descripcion" => $datos["descripcion"],
                "marca" => $datos["marca"],
                "contenido" => $datos["contenido"],
                "unidades" => $datos["unidades"],
                "precio" => $datos["precio"],
                "imagen" => $datos["imagen"],
            );
            //estos son los datos que vienen de la BD
        }
        $jsonResponse = json_encode($json);
        echo $jsonResponse;
    }
    public function pedido($opcionPago, $totalJavas, $descripcion = null, $productosArray)
    {
        //echo var_dump($array);
        //echo $_SESSION['cliente'].' '.$_SESSION['destino'];
        //echo $opcionPago.' '.$totalJavas.' '.$descripcion;
        $id_cliente = $_SESSION['cliente'];
        $destino = $_SESSION['destino'];
        //pendiente o entregado
        $estado = 'pendiente';
        $opcion_pago = $opcionPago;
        $cantidad_total = $totalJavas;
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $personal = $this->consultaAccion->PersonalRandom();
        if (!empty($personal) && isset($personal)) {
            $result = $this->consultaAccion->Pedido($personal['id_personal'], $id_cliente, $descripcion, $destino, $estado, $fecha, $hora, $opcion_pago, $cantidad_total);
            if ($result == true && $result != false) {
                $idPedido = $this->consultaAccion->PedidoUltimo($personal['id_personal'], $id_cliente, $estado, $fecha, $hora);
                $resultPedidoDetalle = $this->pedidoDetalle($idPedido['id_pedido'], $productosArray);
                if ($resultPedidoDetalle == true && $resultPedidoDetalle != false) {
                    //echo 'se hizo todo el pedido con exito'; 
                    echo true; 
                } else {
                    //echo 'fallo la insercion de los detalles del pedido se cancela el pedido';
                    echo false;
                    $result = $this->consultaAccion->DeletePedidoFail($idPedido['id_pedido']);
                }
            } else {
                //echo 'no se pudo hacer el pedido-error en la consulta';
                echo false;
            }
        } else {
            echo 'no hay personal disponible';
        }
    }
    public function pedidoDetalle($idPedido, $productosArray)
    {
        //DEVOLVERA TRUE O FALTE DEPENDIENDO SI LA INSERCION DE DATOS FUE EXITOSO
        //echo $idPedido.' '.$productosArray;
        //echo var_dump($productosArray);
        try {
            //EXPLICACION: foreach(ARRAY as CLAVE => VALOR)
            foreach ($productosArray as $idProducto => $cantidad) {
                $dataProducto = $this->consultaAccion->ProductoUnico($idProducto);
                // echo "{$clave}=>{$valor}";
                $subtotal = $cantidad * $dataProducto['precio'];
                //echo $dataProducto['contenido'].' '.$dataProducto['precio'].' '.$cantidad*$dataProducto['precio'];
                $this->consultaAccion->PedidoDetalle($idPedido, $idProducto, $cantidad, $dataProducto['contenido'], $dataProducto['precio'], $subtotal);
            }
            $resultado = TRUE;
        } catch (Exception $e) {
            echo 'Excepción: ',  $e->getMessage();
            $resultado = FALSE;
        }

        return $resultado;
    }
}

// $re= new ComprasController();
// $re->index();
