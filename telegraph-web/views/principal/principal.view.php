<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Post creado con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_modificar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Post modificado con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_borrar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Post eliminado con éxito')";
        echo "</script>";
    }
}
?>

<h1 class="personal_titulo">COMUNIDAD</h1>
</h1><br>
<div class="contenedor">

    <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/model/principal/buscar.php" method="GET">
        <input type="text" name="busqueda" placeholder="Buscar">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form><br>

    <?php

    foreach ($articulos as $articulo) { ?>
        <div class="post">
            <article>
                <div class="test-info">
                    <div class="dificultad">
                        <?php if ($_SESSION['usuario'] != "invitado") {
                        ?>
                            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <input type="hidden" name="id_post" value="<?php echo $articulo["id_principal"] ?>">
                                <button type="submit" name="action" value="fav">
                                    <?php
                                    $comprobarFavoritoUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario' AND favoritos_usuario LIKE '%" . $articulo["id_principal"] . ",%'");
                                    $comprobarFavoritoUsuario->execute();
                                    $tieneFavorito = $comprobarFavoritoUsuario->rowCount();

                                    if ($tieneFavorito == 0) {
                                    ?>
                                        <i class="fa fa-star fa-lg" style="color: #fff;"> <?php echo $articulo["favoritos_post"] ?></i>
                                    <?php } else { ?>
                                        <i class="fa fa-star fa-lg" style="color: #ffe436;;"> <?php echo $articulo["favoritos_post"] ?></i>
                                    <?php } ?>
                                </button>
                                <button type="submit" name="action" value="like">
                                    <?php
                                    $comprobarUpvoteUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario' AND upvotes_usuario LIKE '%" . $articulo["id_principal"] . ",%'");
                                    $comprobarUpvoteUsuario->execute();
                                    $tieneUpvote = $comprobarUpvoteUsuario->rowCount();

                                    if ($tieneUpvote == 0) {
                                    ?>
                                        <i class="fa fa-arrow-up fa-lg" style="color: #fff;"> <?php echo $articulo["upvotes_post"] ?></i>
                                    <?php } else { ?>
                                        <i class="fa fa-arrow-up fa-lg" style="color: #33c758;"> <?php echo $articulo["upvotes_post"] ?></i>
                                    <?php } ?>
                                </button>
                            </form> <?php
                                } else {
                                    ?>
                            <i class="fa fa-arrow-up fa-lg" style="color: #33c758;"></i> <span id="dificultad"><?php echo $articulo["upvotes_post"] ?></span>
                            <i class="fa fa-star fa-lg" style="color: #ffe436;"></i> <span id="dificultad"><?php echo $articulo["favoritos_post"] ?></span>
                        <?php } ?>

                    </div>
                    <div class="puntuacion-total"><i class="fa fa-comment"></i> <span id="puntuacion"><?php echo $articulo['total_comentarios'] ?></span></div>
                </div><br><br><br>
                <h2 class="titulo"><a href="ver-post.php?id=<?php echo $articulo['id_principal']; ?>"><?php echo $articulo['titulo_post'] ?></a></h2>
                <p class="subtitulo">Publicado por <?php echo $articulo['login_usuario'] ?> <a href="ver-detalles-usuario.php?id=<?php echo $articulo["id_usuario"] ?>"><img src="../../recursos/imagenes/usuario/<?php echo $articulo['imagen_usuario'] ?>" alt="Avatar" class="avatar-post">

                    </a></p>
                <?php if ($articulo['fecha_post_editado'] != NULL) {
                ?>
                    <p class="fecha"><?php echo fecha($articulo['fecha_post_editado']) ?> (Editado)</p><br>
                <?php
                } else { ?>
                    <p class="fecha"><?php echo fecha($articulo['fecha_post']) ?></p>
                <?php
                } ?>
                <div class="thumb">
                    <a href="ver-post.php?id=<?php echo $articulo['id_principal']; ?>">
                        <img src="<?php echo RUTA; ?>/recursos/imagenes/comunidad/<?php echo $articulo['imagen_post'] ?>" alt="">
                    </a>
                </div>
                <p class="descripcion"><?php echo $articulo['descripcion_post'] ?></p>
                <a href="ver-post.php?id=<?php echo $articulo['id_principal']; ?>" class="continuar">Leer post</a>
                <?php if ($login_usuario == $articulo['login_usuario']) { ?>
                    <div class="puntuacion-total">
                        <a class="formulario-boton" href="modificar-post.php?id=<?php echo $articulo['id_principal'] ?>">
                            <i class="fa fa-pen"></i> Modificar post</a>

                        <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <input type="hidden" name="eliminar_post" value="">
                            <input type="hidden" name="ruta_imagen" value="<?php echo $articulo['imagen_post'] ?>">
                            <input type="hidden" name="id_post" value="<?php echo $articulo['id_principal'] ?>">
                            <button type="submit">
                                <i class="fa fa-trash"></i> Eliminar post
                            </button>
                        </form>
                    </div>
                <?php } ?>
            </article>
        </div>
    <?php
    }

    ?>
</div>