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
<main>
    <div class="graficos">
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="generar">
        <h1>generar pdf</h1>
        <button>generar</button>
    </div>
</main>

<script src="../assets/js/dashboard.js"></script>
<?php include("../other/footer.php") ?>