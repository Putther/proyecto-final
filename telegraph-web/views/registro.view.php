<div class="formulario-contenedor">
    <div class="post footer-registro">
        <article>
            <h2 class="titulo">Registrarse</h2>
            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" placeholder="Nombre de usuario (Login):" required>
                <i class="icono izquierda fa fa-user-plus"></i><input type="text" name="nombre_usuario" placeholder="Tu nombre (Opcional):">
                <i class="icono izquierda fa fa-envelope"></i><input type="email" name="correo" placeholder="Correo electrónico (Opcional):">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" placeholder="Contraseña:" required>
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" placeholder="Repite la contraseña:" required>
                <input type="submit" value="Registrarse">
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
            ¿Ya eres geordie?
            <a href="index.php">Inicia sesión aquí</a>
        </p>
    </div>
</div>

<footer class="footer-index">
    <p class="copyright">Esta web ha sido creada por y para los fans. Todos los derechos reservados © 2023</p>
</footer>
</body>

</html>