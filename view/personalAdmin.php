<?php include('../other/header.php') ?>
<main>
    <h1>Pagina Administrativa: Personal</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>dni</th>
                    <th>telefono</th>
                    <th>direccion</th>
                    <th>estado</th>
                    <th>cargo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody id="mostrarPersonal"></tbody>
        </table>
    </div>
    <!-- contenedor para distribuir el formulario y el buscador  -->
    <div class="container-personal layout">
        <div class="form-agregar">
            <form action="" id="personal-form">
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
                    <input name="buscar" id="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar Personal" aria-label="Search">
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
<script src="../assets/js/personalAdmin.js"></script>

<!-- <tr>
                    <td>1</td>
                    <td>zeta</td>
                    <td>zeta</td>
                    <td>72535244</td>
                    <td>998777712</td>
                    <td>jr pierdete buscando</td>
                    <td>Activo</td>
                    <td>gerente</td>
                    <td><a href="">editar</a></td>
                    <td><a href="">eliminar</a></td>
                </tr> -->

<?php include('../other/footer.php') ?>