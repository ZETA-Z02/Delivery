<?php include('../other/header.php') ?>
<main>
    <h1>Pagina Administrativa: Productos</h1>
    <div class="table-personal">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombres</th>
                    <th>descripcion</th>
                    <th>marca</th>
                    <th>contenido</th>
                    <th>unidades</th>
                    <th>precio</th>
                    <th>imagen</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody id="mostrarProductos"></tbody>
        </table>
    </div>
    <!-- contenedor para distribuir el formulario y el buscador  -->
    <div class="container-personal">
        <div class="form-agregar">
            <form action="" id="productos-form" method="post" enctype="multipart/form-data">
                <div class="text-field">
                    <label for="">
                        <h3>Agregar-Editar</h3>
                    </label>

                    <input type="text" id="nombre" placeholder="Nombre" class="form-control">
                </div>
                <div class="text-field">
                    <input type="text" id="descripcion" class="form-control" placeholder="Descripcion"></input>
                </div>
                <div class="text-field">
                    <input type="text" id="marca" class="form-control" placeholder="Marca"></input>
                </div>
                <div class="text-field">
                    <input type="text" id="contenido" class="form-control" placeholder="Contenido"></input>
                </div>
                <div class="text-field">
                    <input type="text" id="unidades" class="form-control" placeholder="Unidades"></input>
                </div>
                <div class="text-field">
                    <input type="text" id="precio" class="form-control" placeholder="Precio"></input>
                </div>
                <div class="text-field">
                    <input type="file" id="imagen" class="form-control" placeholder="Imagen"></input>
                </div>
                <input type="hidden" id="idProducto">
                <button type="submit" class="my-form__button">
                    Guardar
                </button>
            </form>
        </div>
        <div class="buscador">
            <div class="text-field">
                <label for="">
                    <h4>BUSCAR PRODUCTO</h4>
                </label>
                <form action="">
                    <input name="buscar" id="buscar" class="form-control mr-sm-2" type="search" placeholder="Buscar Productos" aria-label="Search">
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
<script src="../assets/js/productosAdmin.js"></script>
<?php include('../other/footer.php') ?>