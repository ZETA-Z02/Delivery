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
    <h1>Pagina Administrativa: Repartidor Proveedor</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>dni</th>
                    <th>telefono</th>
                    <th>vehiculo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody id="mostrarRepartidor"></tbody>
        </table>
    </div>
    <!-- contenedor para distribuir el formulario y el buscador  -->
    <div class="container-personal layout">
        <div class="form-agregar">
            <form action="" id="repartidor-form">
                <div class="layout-grid8">
                    <div class="text-field">
                        <label for="">
                            <h3>Agregar</h3>
                        </label>
                        <input type="text" id="nombre" placeholder="Nombres" class="form-control">
                    </div>
                    <div class="text-field">
                        <label for="">
                            <h3>Editar</h3>
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
                        <input type="text" id="vehiculo" class="form-control" placeholder="Vehiculo"></input>
                    </div>
                    <input type="hidden" id="idRepartidor">
                    <div>
                        <button type="submit" class="my-form__button">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="buscador">
            <div class="text-field">
                <label for="">
                    <h4>BUSCAR REPARTIDOR</h4>
                </label>
                <form action="">
                    <input name="buscar" id="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar Repartidor" aria-label="Search">
                    <button class="my-form__button" type="submit">Buscar</button>
                </form>
            </div>

            <!-- aqui ira el resultado de busqueda estara oculta mientras no existan busquedas -->
            <!-- TABLE  -->
            <div class="buscar-result">
                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <!-- SEARCH -->
                        <div class="table-personal">
                            <div id="container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- aqui termina el div del resultado de la busqueda -->
        </div>
    </div>

</main>

<!-- Como no se usar js en clases, cada vista tendra su propio JS ajax para manejar las peticiones -->
<script src="../assets/js/repartidorAdmin.js"></script>
<?php include('../other/footer.php') ?>