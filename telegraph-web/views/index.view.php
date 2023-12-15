<div id="mensaje"></div>

<?php
if (isset($_GET["mensaje"])) {
    echo "<script>";
    echo "mostrarMensaje('success', 'Usuario creado con éxito')";
    echo "</script>";
}
?>

<div class="formulario-contenedor">
    <div class="post footer-login">
        <article>
            <h2 class="titulo">Iniciar sesión</h2>
            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" placeholder="Usuario:" required>
                <i class="icono izquierda fa fa-lock"></i> <input type="password" name="password" placeholder="Contraseña:" required>
                <input type="submit" value="Iniciar sesión">
            </form>

            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="submit" value="Entrar como invitado">
            </form>

            <?php if (!empty($errores)) : ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </article>
        <p class="texto-registrate">
            ¿Aún no eres Knopfleriano?
            <a href="registro.php">Regístrate aquí</a>
        </p>
    </div>
</div>

<footer class="footer-index">
    <p class="copyright">Esta web ha sido creada por y para los fans. Todos los derechos reservados © 2023</p>
</footer>
</body>

</html>