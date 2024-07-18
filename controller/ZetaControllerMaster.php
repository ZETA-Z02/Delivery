<?php
#AQUI LLEGARAN LAS SOLICITUDES AJAX Y SE UTILIZARAN LAS CLASES DE LOS CONTROLLADORES PARA HACER LAS ACCIONES
require_once("./personalAdminController.php");
require_once("./clienteController.php");
require_once("./productosController.php");
require_once("./almacenController.php");
require_once("./repartidorAdminController.php");
require_once("./comprasController.php");
require_once("./loginController.php");
require_once("./inventarioAdminController.php");
require_once("./loginAdminController.php");
require_once("./pedidosController.php");
require_once("./personalViewController.php");
require_once("./registroController.php");
require_once("./dashboardController.php");


// cada pagina enviara por la url un dato distinto para que se obtenga aqui y se maneje ordenadamente todas las acciones

// PAGINA PERSONAL ACCIONES, USANDO PERSONALADMINCONTROLLER, PERSONAL ADMIN
if (isset($_GET['actionPersonal']) && !empty($_GET['actionPersonal'])) {
    $action = $_GET['actionPersonal'];
    //Instanciamos la clase que necesitaremos para usar sus metodos y tener acciones en la tabla personal
    $personalAdmin = new PersonalAdminController();
    switch ($action) {
        case 'guardarPersonal':
            if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['estado']) && !empty($_POST['cargo'])) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $estado = $_POST['estado'];
                $cargo = $_POST['cargo'];
                $personalAdmin->create($nombre, $apellido, $dni, $telefono, $direccion, $estado, $cargo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos';
            }
            break;
        case 'mostrarPersonal':
            $personalAdmin->Read();
            break;
        case 'personalUnico':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $personalAdmin->personalUnico($id);
            } else {
                echo 'error en personalUnico';
            }
            break;
        case 'editarPersonal':
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['estado']) && !empty($_POST['cargo'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $estado = $_POST['estado'];
                $cargo = $_POST['cargo'];
                $personalAdmin->update($id, $nombre, $apellido, $dni, $telefono, $direccion, $estado, $cargo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos. editar fallo';
            }

            break;
        case 'eliminarPersonal':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $personalAdmin->delete($id);
            } else {
                echo 'error, no llego el id';
            }
            break;
        case 'buscarPersonal':
            if (!empty($_POST['buscar'])) {
                $buscarPersonal = $_POST['buscar'];
                $personalAdmin->buscardor($buscarPersonal);
            } else {
                echo 'no llega los datos a buscar';
            }
            break;
    }
}

// PAGINA CLIENTE ACCIONES, USANDO CLIENTECONTROLLER, CLIENTE ADMIN
if (isset($_GET['actionCliente']) && !empty($_GET['actionCliente'])) {
    $action = $_GET['actionCliente'];
    //echo 'accion cliente '.$action;
    $clienteAdmin = new ClienteController();
    switch ($action) {
        case 'guardarCliente':
            //echo 'accion Cliente';
            if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['correo'])) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['correo'];
                $clienteAdmin->create($nombre, $apellido, $dni, $telefono, $direccion, $correo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos';
            }
            break;
        case 'mostrarCliente':
            $clienteAdmin->read();
            break;
        case 'clienteUnico':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $clienteAdmin->clienteUnico($id);
            } else {
                echo 'error en clienteUnico';
            }
            break;
        case 'editarCliente':
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['correo'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['correo'];
                $clienteAdmin->update($id, $nombre, $apellido, $dni, $telefono, $direccion, $correo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos. editar fallo';
            }

            break;
        case 'eliminarCliente':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $clienteAdmin->delete($id);
            } else {
                echo 'error, no llego el id';
            }
            break;
        case 'buscarCliente':
            if (!empty($_POST['buscar'])) {
                $buscarCliente = $_POST['buscar'];
                $clienteAdmin->buscardor($buscarCliente);
            } else {
                echo 'no llega los datos a buscar';
            }
            break;
    }
}

//PAGINA PRODUCTOS ACCIONES, USANDO PRODUCTOSCONTROLLER, PRODUCTOS ADMIN
if (isset($_GET['actionProductos']) && !empty($_GET['actionProductos'])) {
    $action = $_GET['actionProductos'];
    //echo 'accion Productos'.$action;
    $productoAdmin = new ProductosController();
    switch ($action) {
        case 'guardarProducto':
            //echo 'accion Cliente';
            if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['marca']) && !empty($_POST['contenido']) && !empty($_POST['unidades']) && !empty($_POST['precio']) || !empty($_POST['imagen'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $marca = $_POST['marca'];
                $contenido = $_POST['contenido'];
                $unidades = $_POST['unidades'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $productoAdmin->create($nombre, $descripcion, $marca, $contenido, $unidades, $precio, $imagen);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos';
            }
            break;
        case 'mostrarProductos':
            //echo 'mostrar Productos en proceso';
            $productoAdmin->read();
            break;
        case 'productoUnico':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $productoAdmin->productoUnico($id);
            } else {
                echo 'error en clienteUnico';
            }
            break;
        case 'editarProducto':
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['marca']) && !empty($_POST['contenido']) && !empty($_POST['unidades']) && !empty($_POST['precio']) && !empty($_POST['imagen'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $marca = $_POST['marca'];
                $contenido = $_POST['contenido'];
                $unidades = $_POST['unidades'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $productoAdmin->update($id, $nombre, $descripcion, $marca, $contenido, $unidades, $precio, $imagen);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos. editar fallo';
            }

            break;
        case 'eliminarProducto':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $productoAdmin->delete($id);
            } else {
                echo 'error, no llego el id';
            }
            break;
        case 'buscarProducto':
            if (!empty($_POST['buscar'])) {
                $buscarCliente = $_POST['buscar'];
                $productoAdmin->buscardor($buscarCliente);
            } else {
                echo 'no llega los datos a buscar';
            }
            break;
    }
}

//PAGINA PRODUCTOS ACCIONES, USANDO PRODUCTOSCONTROLLER, PRODUCTOS ADMIN
if (isset($_GET['actionAlmacen']) && !empty($_GET['actionAlmacen'])) {
    $action = $_GET['actionAlmacen'];
    //echo 'accion Productos'.$action;
    $almacenAdmin = new AlmacenController();
    switch ($action) {
        case 'mostrarAlmacen':
            //echo 'mostrar Productos en proceso';
            $almacenAdmin->read();
            break;
    }
}

//PAGINA REPARTIDOR ACCIONES, USANDO REPARTIDORCONTROLLER, REPARTIDOR ADMIN
if (isset($_GET['actionRepartidor']) && !empty($_GET['actionRepartidor'])) {
    $action = $_GET['actionRepartidor'];
    //Instanciamos la clase que necesitaremos para usar sus metodos y tener acciones en la tabla personal
    $repartidorAdmin = new RepartidorAdminController();
    switch ($action) {
        case 'guardarRepartidor':
            if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['vehiculo'])) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $vehiculo = $_POST['vehiculo'];
                $repartidorAdmin->create($nombre, $apellido, $dni, $telefono, $vehiculo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos';
            }
            break;
        case 'mostrarRepartidor':
            $repartidorAdmin->Read();
            break;
        case 'repartidorUnico':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $repartidorAdmin->repartidorUnico($id);
            } else {
                echo 'error en repartidorUnico';
            }
            break;
        case 'editarRepartidor':
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['vehiculo'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $telefono = $_POST['telefono'];
                $vehiculo = $_POST['vehiculo'];
                $repartidorAdmin->update($id, $nombre, $apellido, $dni, $telefono, $vehiculo);
                //echo 'llegan todos los datos solicitados y ninguno esta vacio';
            } else {
                echo 'alguno de los datos esta vacio o nulos. editar fallo';
            }

            break;
        case 'eliminarRepartidor':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $repartidorAdmin->delete($id);
            } else {
                echo 'error, no llego el id';
            }
            break;
        case 'buscarRepartidor':
            if (!empty($_POST['buscar'])) {
                $buscarRepartidor = $_POST['buscar'];
                $repartidorAdmin->buscardor($buscarRepartidor);
            } else {
                echo 'no llega los datos a buscar';
            }
            break;
    }
}

//Pagina Compras Acciones, acciones deben ser con una SESSION INICIADA
if (isset($_GET['actionCompras']) && !empty($_GET['actionCompras'])) {
    $action = $_GET['actionCompras'];
    //echo 'accion cliente '.$action;
    $comprasView = new ComprasController();
    switch ($action) {
        case 'mostrarCompras':
            //echo $action;
            $comprasView->index();
            break;
        case 'pedidoEnviado':
            $pedido = $_POST['data'];
            //datos
            $descripcion = $pedido['descripcion'];
            $opcionPago = $pedido['opcion_pago'];
            $totalJavas = $pedido['totalJavas'];
            $productos = $pedido['productos'];
            //echo $descripcion.' '.$opcionPago.' '.$totalJavas.' '.$productos;
            //public function pedido($opcionPago,$totalJavas,$descripcion = null)
            $comprasView->pedido($opcionPago, $totalJavas, $descripcion, $productos);
            break;
    }
}

//PAGINA LOGIN ACCIONES- PARA INGRESAR Y DECLARAR LA VARIABLE SESSION DEPENDIENDO EL NIVEL DE USUARIO
//SE PODRIA UTILIZAR ESTE MISMO PARA CERRAR SESION, CON EL MISMO CONTROLLADOR LOGIN-EXIT
if (isset($_GET['actionLogin']) && !empty($_GET['actionLogin'])) {
    $action = $_GET['actionLogin'];
    //echo 'accion login '.$action;
    $loginView = new LoginController();
    switch ($action) {
        case 'LogIn':
            //echo $action.' llega los datos y se validara al usuario '.$_POST['username'].'-'.$_POST['password'];
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $usuario = trim($_POST['username']);
                $password = trim($_POST['password']);
                //aqui debe devolver la ruta dependiendo el nivel de usuario
                $loginView->login($usuario, $password);
            } else {
                echo 'alguno de los datos esta vacio o nulos';
            }
            break;
    }
}

//PAGINA INVENTARIO, ACCIONES: AGREGAR NUEVO INVENTARI(ENTRADA DE PRODUCTOS), VER INVENTARIO 
if (isset($_GET['actionInventario']) && !empty($_GET['actionInventario'])) {
    $action = $_GET['actionInventario'];
    //echo 'accion inventario '.$action;
    $inventarioAdmin = new InventarioAdminController();
    switch ($action) {
        case 'mostrarInventario':
            $inventarioAdmin->read();
            break;
        case 'mostrarProductos':
            //echo 'llega';
            $inventarioAdmin->readProductos();
            break;
        case 'mostrarRepartidores';
            //echo 'llega param ostrar repartidores';
            $inventarioAdmin->readRepartidores();
            break;
        case 'guardarInventario':
            if (!empty($_POST['producto']) && !empty($_POST['repartidor']) && !empty($_POST['cantidad']) && !empty($_POST['fecha'])) {
                $inventarioAdmin->create($_POST['producto'], $_POST['fecha'], $_POST['cantidad'], $_POST['repartidor']);
            } else {
                echo "error: datos vacios";
            }
            break;
    }
}

//PAGINA LOGIN ADMIN PARA CRUD DE LOGIN Y REGISTRAR LOGIN DE UN NUEVO PERSONAL
if (isset($_GET['actionLoginAdmin']) && !empty($_GET['actionLoginAdmin'])) {
    $action = $_GET['actionLoginAdmin'];
    //echo 'accion login '.$action;
    $loginAdmin = new LoginAdminController();
    switch ($action) {
        case 'mostrarLogin':
            //echo 'mostrar login';
            $loginAdmin->read();
            break;
        case 'mostrarPersonalLogin':
            //echo 'llega';
            $loginAdmin->readPersonal();
            break;
        case 'guardarLogin':
            if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['id_login']) && !empty($_POST['nivel'])) {
                $loginAdmin->create($_POST['usuario'], $_POST['password'], $_POST['id_login'], $_POST['nivel']);
            } else {
                echo "error: datos vacios";
            }
            break;
        case 'unicoLogin':
            if (isset($_POST['id']) && !empty('id')) {
                $id = $_POST['id'];
                $loginAdmin->loginUnico($id);
            } else {
                echo 'no llega el id login';
            }
            break;
        case 'editarLogin':
            if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['id_login']) && !empty($_POST['nivel'])) {
                $loginAdmin->update($_POST['usuario'], $_POST['password'], $_POST['id_login'], $_POST['nivel']);
            } else {
                echo 'no llega los datos para actualizar';
            }
            break;
        case 'eliminarLogin':
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $loginAdmin->delete($id);
            } else {
                echo 'error, no llego el id';
            }
            break;
    }
}

//PAGINA PEDIDOS ADMIN PARA VER TODOS LOS PEDIDOS
if (isset($_GET['actionPedidos']) && !empty($_GET['actionPedidos'])) {
    $action = $_GET['actionPedidos'];
    //echo 'accion login '.$action;
    $pedidosAdmin = new PedidosController();
    switch ($action) {
        case 'mostrarPedidos':
            //echo 'mostrar pedidos';
            echo $pedidosAdmin->index();
            break;
        case 'mostrarDetalles':
            //echo 'llega';
            $id = $_POST['id'];
            $pedidosAdmin->readDetalles($id);
            break;
    }
}

//PAGINA PERSONAL VIEW PARA LA VISTA PERSONAL PODRA CAMBIAR EL ESTADO DE UN PEDIDO 
if (isset($_GET['actionPersonalView']) && !empty($_GET['actionPersonalView'])) {
    $action = $_GET['actionPersonalView'];
    //echo 'accion login '.$action;
    $personalView = new PersonalViewController();
    switch ($action) {
        case 'mostrarPedidosPendientes':
            //echo 'mostrar pedidos';
            echo $personalView->index();
            break;
        case 'mostrarDetalles':
            //echo 'llega';
            $id = $_POST['id'];
            $personalView->readDetalles($id);
            break;
        case 'actualizarEstado':
            $id = $_POST['id_pedido'];
            $personalView->update($id);
            break;
    }
}

//PAGINA REGISTRO CLIENTE RECIBIR DATOS Y REGISTRAR CLIENTE
if (isset($_GET['actionRegistro']) && !empty($_GET['actionRegistro'])) {
    $action = $_GET['actionRegistro'];
    //echo 'accion login '.$action;
    $registro = new RegistroController();
    switch ($action) {
        case 'registrar':
            //echo 'se registro';
            $registro->create($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['telefono'],$_POST['direccion'],$_POST['correo'],$_POST['usuario'],$_POST['password']);
            break;
    }
}

//PAGINA DASHBOARD ADMIN GRAFICOS
if (isset($_GET['actionDashboard']) && !empty($_GET['actionDashboard'])) {
    $action = $_GET['actionDashboard'];
    //echo 'accion login '.$action;
    $dashboard = new DashboardController();
    switch ($action) {
        case 'mostrarGraficos':
            //echo 'se registro';
            $dashboard->index();
            break;
        case "generarPdf":
            
            break;
    }
}
