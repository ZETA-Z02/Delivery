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
    <h1>Pagina Administrativa: Inventario</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>producto</th>
                    <th>marca</th>
                    <th>contenido</th>
                    <th>cantidad entrante</th>
                    <th>repartidor encargado</th>
                    <th>fecha de entrega</th>
                </tr>
            </thead>
            <tbody id="mostrarInventario"></tbody>
        </table>
    </div>
    <!-- contenedor para distribuir el formulario y el buscador  -->
    <div class="container-personal">
        <div class="form-agregar">
            <form action="" id="inventario-form">
                <div class="text-field">
                    <label for="">
                        <h3>Agregar</h3>
                    </label>
                    <span>Producto:
                        <select name="producto" id="producto">
                            <option value="">producto name</option>
                        </select>
                    </span>
                </div>
                <div class="text-field">
                    <span>Cantidad<input type="number" id="cantidad" class="form-control" placeholder="cantidad"></input></span>
                </div>
                <div class="text-field">
                    <span>Repartidor:
                        <select name="repartidor" id="repartidor">
                            <option value="">Repartidor name</option>
                        </select>
                    </span>
                </div>
                <div class="text-field">
                    <span>fecha entrega<input type="date" id="fecha" class="form-control" placeholder="Fecha de Entrega" value="<?php echo date('Y-m-d'); ?>" disabled></input></span>
                </div>
                <button type="submit" class="my-form__button">
                    Guardar
                </button>
            </form>
        </div>
    </div>

</main>
<script src="../assets/js/inventarioAdmin.js"></script>
<?php include('../other/footer.php') ?>