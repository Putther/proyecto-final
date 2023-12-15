<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Comentario creado con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_modificar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Comentario modificado con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_borrar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Comentario eliminado con éxito')";
        echo "</script>";
    }
}
?>


<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><?php echo $articulo['titulo_post'] ?></h2>
            <p class="fecha"><?php echo fecha($articulo['fecha_post']) ?></p>
            <div class="thumb">
                <a>
                    <img src="<?php echo RUTA; ?>/recursos/imagenes/comunidad/<?php echo $articulo['imagen_post'] ?>" alt="">
                </a>
            </div>
            <p class="descripcion"><?php echo nl2br($articulo['texto_post']) ?></p>
        </article>
    </div>
</div>

<h2 class="titulo" style="text-align: center;">COMENTARIOS</h2><br>

<?php
if ($_SESSION['usuario'] != "invitado") {
?>

    <p id="realizar-comentario" class="enlace-comentarios">Hacer un comentario</p>

    <div id="nuevo-comentario" class="post-comentario contenedor" style="display: none">
        <div class="personal">
            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <img src="../../recursos/imagenes/usuario/<?php echo $datos_formulario['imagen_usuario'] ?>" alt="Avatar" class="avatar-comentario">
                <h2 class="titulo"><?php echo $datos_formulario['login_usuario'] ?></h2>
                <p>Escribir comentario:</p><br>
                <input type="hidden" name="crear_comentario" value="">
                <input type="hidden" name="id_post" value="<?php echo $id_post ?>">
                <textarea name="comentario_texto" placeholder="(Máximo 250 caracteres)" class="descripcion-comentario" maxlength="250" required></textarea></p>
                <input style="text-align:end;" type="submit" value="COMENTAR"></input>
            </form>
        </div>
    </div>
<?php
}
?>

<?php if (!$comentarios_resultado) {
?>
    <p style="text-align: center;"><i>No hay comentarios</i></p>
<?php
}

foreach ($comentarios_resultado as $comentario) {
?>
    <div class="post-comentario contenedor">
        <div class="personal footer-post">
            <article class="personal_texto">
                <img src="../../recursos/imagenes/usuario/<?php echo $comentario['imagen_usuario'] ?>" alt="Avatar" class="avatar-comentario">
                <h2 class="titulo"><?php echo $comentario['login_usuario'] ?></h2>
                <?php if ($comentario['fecha_comentario_editado'] != NULL) {
                ?>
                    <p class="fecha"><?php echo $comentario['fecha_comentario_editado'] ?> (Editado)</p><br>
                <?php
                } else { ?>
                    <p class="fecha"><?php echo $comentario['fecha_comentario'] ?></p><br>
                <?php
                } ?>
                <p id="comentario" class="descripcion-comentario"><?php echo nl2br($comentario['texto_comentario']) ?></p>
                <?php if ($login_usuario == $comentario['login_usuario']) {
                ?><form id="eliminar-comentario" class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="hidden" name="borrar_comentario" value="">
                        <input type="hidden" name="id_post" value="<?php echo $id_post ?>">
                        <input type="hidden" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>">
                        <button type="submit">
                            <i class="fa fa-trash"></i> Eliminar comentario
                        </button>
                    </form>

                    <form id="modificar-comentario" style="display: none" class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="hidden" name="modificar_comentario" value="">
                        <input type="hidden" name="id_post" value="<?php echo $id_post ?>">
                        <input type="hidden" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>">
                        <textarea name="comentario_texto_modificado" class="descripcion-comentario"><?php echo nl2br($comentario['texto_comentario']) ?></textarea>
                        <button type="submit">
                            MODIFICAR
                        </button>
                    </form>
                    <button class="formulario-boton" id="modificar">
                        <i class="fa fa-pen"></i> Modificar comentario
                    </button>
                <?php
                } ?>
            </article>
        </div>
    </div>
<?php } ?>

<script>
    $('#modificar').on('click', function() {
        $('#comentario').hide();
        $('#modificar').hide();
        $('#eliminar-comentario').hide();
        $('#modificar-comentario').show();
    });

    $('#realizar-comentario').on('click', function() {
        $('#realizar-comentario').hide();
        $('#nuevo-comentario').show();
    });
</script>