<div class="contenedor">
    <div class="post footer-post">
        <article>
            <h2 class="titulo">Nuevo post</h2>
            <form enctype="multipart/form-data" class="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="login_usuario" value="<?php echo $usuario_resultado['id_usuario'] ?>">
                <input type="text" name="titulo" placeholder="Título del artículo:">
                <input type="text" name="descripcion" placeholder="Descripción del artículo:">
                <textarea name="texto" placeholder="Texto del artículo:"></textarea>
                <input type="file" name="thumb">

                <input type="submit" value="Crear post">
            </form>
        </article>
    </div>
</div>