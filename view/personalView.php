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
<div class="clientes-main">
    <div class="faq-container">
        <details>
            <summary>
                <span class="faq-title">
                    <h3>pedido|id cliente|destino|id personal encargado: | stado: </h3>
                </span>
                <img src="../assets/svg/plus.svg" class="expand-icon" alt="Plus">
            </summary>
            <div class="faq-content">
                <div class="table-personal">
                    <table>
                        <thead>
                            <tr>
                                <th>id_producto</th>
                                <th>cantidad</th>
                                <th>unidad medida</th>
                                <th>precio</th>
                                <th>subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </details>
    </div>
</div>

<script src="../assets/js/personalView.js"></script>
<?php include("../other/footerMain.php") ?>