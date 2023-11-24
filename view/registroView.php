<?php include("../other/headerMain.php") ?>
<div class="container-registro">
    <div class="containerRegister" id="container">
        <div class="form-container sign-in">
            <form>
                <h1>Crea tu cuenta</h1>
                <span>Llene sus datos</span>
                <input type="text" id="nombre" placeholder="Nombres">
                <input type="text" id="apellido" placeholder="Apellidos">
                <input type="number" id="dni" placeholder="dni" min="1" max="99999999">
                <input type="number" id="telefono" placeholder="telefono" min="1" max="999999999">
                <input type="text" id="direccion" placeholder="direccion">
                <input type="email" id="correo" placeholder="correo">
                <!-- <button>Sign In</button> -->
            </form>
        </div>
        <div class="form-container sign-up">
            <form>
                <h1>Crea tu cuenta de usuario</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Usuario y contraseña</span>
                <input type="usuario" id="usuario" placeholder="Usuario">
                <input type="password" id="password" placeholder="Password">
                <input type="password" id="password2" placeholder="Repeat Password">
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Lo hace muy bien!</h1>
                    <p>Llene el formulario con un usuario y password unicos que usted recuerde</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hola! Registrese aqui</h1>
                    <p>Llene el formulario con sus datos reales para comenzar, despues cree su cuenta de usuario para ingresar</p>
                    <button class="hidden" id="register">Siguiente-></button>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/registro.js"></script>
</div>
<?php include("../other/footerMain.php") ?>