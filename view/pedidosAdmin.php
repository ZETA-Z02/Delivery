<?php 
session_start();
//echo  $_SESSION['usuario'];
if (!isset($_SESSION['admin']) || $_SESSION['usuario'] != 'admin') {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    //echo  $_SESSION['usuario'];
    header("Location: ./loginView.php");
}

include("../other/header.php");
?>

<?php include('../other/header.php') ?>