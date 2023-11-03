<?php

#AQUI LLEGARAN LAS SOLICITUDES AJAX Y SE UTILIZARAN LAS CLASES DE LOS CONTROLLADORES PARA HACER LAS ACCIONES


if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    echo 'llega la accion a ejecutar';
    if ($action == 'feetchTasks') {
        // $taskController = new TaskController();
        // $taskController->feetchTasks();
        echo 'acciones del controllador';
    }
}



?>