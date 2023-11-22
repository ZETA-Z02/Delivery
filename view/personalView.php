<?php 
session_start();
//echo  $_SESSION['usuario'];
if (!isset($_SESSION['personal']) || $_SESSION['usuario'] != 'personal') {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    //echo  $_SESSION['usuario'];
    header("Location: ./loginView.php");
}

include("../other/headerMain.php");
?>  

<h1>pagina vista personal</h1>