<?php

#AQUI LLEGARAN LAS SOLICITUDES AJAX Y SE UTILIZARAN LAS CLASES DE LOS CONTROLLADORES PARA HACER LAS ACCIONES
require_once("./personalAdminController.php");
require_once("./clienteController.php");
require_once("./comprasController.php");

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

//Pagina Compras Acciones, acciones deben ser con una SESSION INICIADA
if (!empty($_GET['actionCompras']) && !empty($_GET['actionCompras'])) {
    $action = $_GET['actionCompras'];
    //echo 'accion cliente '.$action;
    $comprasView = new ComprasController();
    switch ($action) {
        case 'mostrarCompras':
            //echo $action;
            $comprasView->index();
            break;
    }

}
?>
