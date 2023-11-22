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
    <h1>Pagina Administrativa: Almacen</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>marca</th>
                    <th>contenido</th>
                    <th>fecha de ultima actualizacion</th>
                    <th>cantidad</th>
                    <th>disponibilidad</th>
                </tr>
            </thead>
            <tbody id="mostrarAlmacen"></tbody>
        </table>
    </div>
    <!-- formulario que va generar pdf, Es un formulario para hacer mas pedidos de productos o algo asi -->
    <div class="container-personal layout">
        <div class="form-agregar">
            <form action="" id="personal-form">
                <div class="layout-grid8">
                    <div class="text-field">
                        <label for="">
                            <h3>Formulario para hacer mas pedidos a la empresa Proveedora</h3>
                        </label>
                        <input type="text" id="nombre" placeholder="Nombres" class="form-control">
                    </div>
                    <div class="text-field">
                        <label for="">
                            <h3>Mas productos</h3><br>
                        </label>
                        <input type="text" id="apellido" class="form-control" placeholder="Apellidos"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="dni" class="form-control" placeholder="DNI"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="telefono" class="form-control" placeholder="Telefono"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="direccion" class="form-control" placeholder="Direccion"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="estado" class="form-control" placeholder="Estado"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="cargo" class="form-control" placeholder="Cargo"></input>
                    </div>
                    <input type="hidden" id="idPersonal">
                    <div>
                        <button type="submit" class="my-form__button">
                            SOLICITAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="../assets/js/almacenAdmin.js"></script>
<?php include('../other/footer.php') ?>