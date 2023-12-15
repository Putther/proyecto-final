<div class="contenedor footer-imagen">
    <h1 class="subeimagen">Subir una imagen</h1><br>
    <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="foto">Selecciona una imagen a subir</label>
        <input type="file" id="foto" name="foto" required><br><br>
        <input type="hidden" name="id_usuario" value="<?php echo $datos_formulario["id_usuario"] ?>">
        <label for="foto">Escribe un título:</label>
        <input type="text" id="titulo" name="titulo">

        <label for="texto">Descripción:</label>
        <textarea name="texto" id="texto" placeholder="Escribe una descripción"></textarea>

        <?php

        if (isset($error)) {
        ?><p class="error"><?php echo $error; ?></p><?php
                                                        }

                                                            ?>

        <input type="submit" class="submit" value="Subir imagen">
    </form>
</div>