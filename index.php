<?php
#OBTENGO MI URL-> delivery
$url = $_SERVER['REQUEST_URI'];
echo $url;

// Verifica si la URL solicitada existe en las rutas definidas
if($url != '/delivery/'){
    echo 'no entra';
    header('Location: /delivery/view/error.php', true, 302);
    exit;
}else{
    echo 'entra';
    header('location: /delivery/view/main.php');
    exit;
}


?>