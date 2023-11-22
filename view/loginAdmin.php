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
    <h1>Pagina Administrativa: Logins</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>id_login</th>
                    <th>usuario</th>
                    <th>password</th>
                    <th>id_cliente</th>
                    <th>id_personal</th>
                    <th>nivel</th>
                    <th colspan="2">acciones</th>
                </tr>
            </thead>
            <tbody id="mostrarLogin"></tbody>
        </table>
    </div>
    <!-- contenedor para distribuir el formulario y el buscador  -->
    <div class="container-personal layout">
        <div class="form-agregar">
            <form action="" id="login-form">
                <div class="layout-grid8">
                    <div class="text-field">
                        <label for="">
                            <h3>Agregar</h3>
                        </label>
                        <span>personal a crear login
                            <select name="login" id="login">
                                <option id="" value=""></option>
                            </select>
                        </span>
                    </div>
                    <div class="text-field">
                        <label for="">
                            <h3>Editar</h3>
                        </label>
                        <input type="number" id="nivel" class="form-control" placeholder="nivel" max="3" min="1"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="usuario" class="form-control" placeholder="usuario"></input>
                    </div>
                    <div class="text-field">
                        <input type="text" id="password" class="form-control" placeholder="password"></input>
                    </div>
                    <input type="hidden" id="idLogin">
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
                    <h4>BUSCAR PERSONAL</h4>
                </label>
                <form action="">
                    <input name="buscar" id="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar Login" aria-label="Search">
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
<script src="../assets/js/loginAdmin.js"></script>


<?php include('../other/footer.php') ?>