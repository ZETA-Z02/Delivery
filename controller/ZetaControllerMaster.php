<?php

#AQUI LLEGARAN LAS SOLICITUDES AJAX Y SE UTILIZARAN LAS CLASES DE LOS CONTROLLADORES PARA HACER LAS ACCIONES
require_once("./personalAdminController.php");
require_once("./clienteController.php");

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
            $mostrarPersonal = new PersonalAdminController();
            $mostrarPersonal->Read();
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
            }else {
                echo 'alguno de los datos esta vacio o nulos. editar fallo';
            }
        
            break;
        case 'eliminarPersonal':
            if (!empty($_POST['id'])){
                $id = $_POST['id'];
                $personalAdmin->delete($id);
            }else{
                echo 'error, no llego el id';
            }
            break;
        case 'buscarPersonal':
            if(!empty($_POST['buscar'])){
                $buscarPersonal=$_POST['buscar'];
                $personalAdmin->buscardor($buscarPersonal);
            }else{
                echo 'no llega los datos a buscar';
            }
    }
}
// PAGINA CLIENTE ACCIONES, USANDO CLIENTECONTROLLER, CLIENTE ADMIN
if (isset($_GET['actionCliente']) && !empty($_GET['actionCliente'])) {
    $action = $_GET['actionCliente'];
    $clienteAdmin = new ClienteController();
    switch ($action) {
        case '':
            break;
    }
}
