<div class="contenedor">
    <div class="post footer-post">
        <article>
            <h2 class="titulo">Modificar post</h2>
            <form enctype="multipart/form-data" class="formulario" method="POST" action="">
                <input type="hidden" name="modificar_post">
                <input type="hidden" name="ruta_imagen" value="<?php echo $articulo_resultado["imagen_post"] ?>">
                <input type="hidden" name="id_post" value="<?php echo $id_articulo?>">
                <input type="text" name="titulo" placeholder="Título del artículo:" value="<?php echo $articulo_resultado["titulo_post"] ?>">
                <input type="text" name="descripcion" placeholder="Descripción del artículo:" value="<?php echo $articulo_resultado["descripcion_post"] ?>">
                <textarea name="texto" placeholder="Texto del artículo:"><?php echo $articulo_resultado["texto_post"] ?></textarea>
                <input type="file" name="thumb">

                <input type="submit" value="Modificar post">
            </form>
        </article>
    </div>
</div>