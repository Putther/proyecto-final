<div class="contenedor">
    <div class="post footer-post">
        <article class="footer-reporte">
            <h2 class="titulo">Nuevo reporte</h2>
            <form class="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="login_usuario" value="<?php echo $usuario_resultado['id_usuario'] ?>">
                <label for="categoria">Escoge una categoría:</label>
                <select name="categoria">
                    <option value="publicaciones">Publicaciones</option>
                    <option value="comentarios">Comentarios</option>
                    <option value="galeria">Galería</option>
                </select><br><br>
                <textarea name="texto" placeholder="Expón los detalles de tu reporte:"></textarea>
                <input type="submit" value="Enviar">
            </form>
        </article>
    </div>
</div>