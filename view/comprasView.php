<?php include("../other/headerMain.php") ?>
<div class="clientes-main">
    <div class="container-items">
        <div class="centering">
        <h1>productos disponibles</h1>
            <div id="mostrarCompras" class="articles">
                <!-- arituclo de ejemplo, esto solo se muestra si no hay que mostrar de la base de datos-todo con ajax -->
                <article>
                    <figure>
                        <img src="../images/cielo-sin-gas.png" alt="Preview">
                    </figure>
                    <div class="article-preview">
                        <h2>CIELO</h2>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel, obcaecati? Nobis quisquam inventore expedita nemo consequatur dolorem asperiores rerum, quam sunt similique adipisci, porro iste corporis? Cum officiis exercitationem esse?
                        </p><br>
                        <p>
                            paquete de 12 unidades 650ml

                        </p><br>

                        <a href="https://learning.atheros.ai" class='button' title="Learn">
                            COMPRAR
                        </a>
                    </div>
                </article>

            </div>
        </div>


    </div>
    <div class="container-select">
        <div class="compras">
            <h2>Compras</h2>
            <table>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>contenido</th>
                        <th>precio unitario</th>
                        <th>cantidad total</th>
                        <th>subtotal</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
                <tbody id="shoppingCar">
                    <tr>
                        <th>loa</th>
                        <th>4</th>
                        <th>4.00</th>
                        <th><input type="number" min="1" value="1"></th>
                        <th>8.00</th>
                        <th><button href="">delete</button></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pagar">
            <div class="botton">
                <button class="btn">PAGAR</button>
                <span>total: <input type="text"></span>
            </div>


        </div>

    </div>
    <!-- <div class="secundario2">
        wefew


    </div> -->
</div>
<script src="../assets/js/comprasView.js"></script>
<?php include("../other/footerMain.php") ?>