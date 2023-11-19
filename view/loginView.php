<?php include("../other/headerMain.php") ?>
<div class="containerLogin" id="container-login">
    <div class="backgroundLogin"></div>
    <!-- <div class="error" id="mensajeError"></div> -->
    <div class="centeringLogin">
        <form class="my-formLogin">
            <div class="login-welcome-row">
                <img class="login-welcome" src="../assets/images/astronaut.jpg" alt="Astronaut">
                <!-- optimize the image in production -->
                <h1>LogIn!</h1>
            </div>
            <div class="text-fieldLogin">
                <label for="email">Nombre de Usuario:</label>
                <input aria-label="Email" type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <img alt="Email Icon" title="Email Icon" src="../assets/images/email.svg">
            </div>
            <div class="text-fieldLogin">
                <label for="password">Contraseña:</label>
                <input id="password" type="password" aria-label="Password" name="password" placeholder="Contraseña" required>
                <!-- <input id="password" type="password" aria-label="Password" name="password" placeholder="Contraseña" title="Minimum 6 characters at least 1 Alphabet and 1 Number" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required> -->
                <img alt="Password Icon" title="Password Icon" src="../assets/images/password.svg">
            </div>
            <input type="submit" class="my-form__button" value="Ingresar">
            <div class="my-form__actions">
                <div class="my-form__row">
                    <span>Did you forget your password?</span>
                    <a href="#" title="Reset Password">Reset Password</a>
                </div>
                <div class="my-form__signup">
                    <a href="./registroView.php" title="Create Account">Crear Cuenta</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="../assets/js/loginView.js"></script>
<?php include("../other/footerMain.php") ?>