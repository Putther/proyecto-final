<h1 class="personal_titulo">GALERÍA</h1><br>

<?php
if ($_SESSION['usuario'] != "invitado") {
?>
    <p class="enlace-galeria"><a href="subir.php">Subir imagen a la galería</a></p>
<?php
}
?>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Imagen subida con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_borrar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Imagen eliminada con éxito')";
        echo "</script>";
    }
}
?>

<section class="fotos">
    <div class="contenedor">
        <?php

        foreach ($imagenes as $imagen) {
        ?><div class="preview">
                <a href="imagenes.php?id=<?php echo $imagen['id_galeria']; ?>">
                    <img src="../../recursos/imagenes/galeria/<?php echo $imagen['imagen_galeria']; ?>" alt="">
                </a><br>
                <?php if ($_SESSION["usuario"] != "invitado" && $datos_formulario["id_usuario"] == $imagen["id_usuario"]) {
                ?>
                    <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="hidden" name="eliminar-imagen" value="">
                        <input type="hidden" name="ruta_imagen" value="<?php echo $imagen["imagen_galeria"] ?>">
                        <input type="hidden" name="id_imagen" value="<?php echo $imagen["id_galeria"] ?>">
                        <button type="submit">
                            <i class="fa fa-trash"></i> Eliminar imagen
                        </button>
                    </form>
                <?php
                } ?>
            </div><?php
                }
                    ?>

        <div class="paginacion-galeria">
            <?php
            if ($pagina_actual > 1) {
            ?><a href="galeria.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fa fa-arrow-left"></i> Página anterior </a><?php
                                                                                                                                            }
                                                                                                                                            if ($total_paginas != $pagina_actual) {
                                                                                                                                                ?><a href="galeria.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha"> Página siguiente <i class="fa fa-arrow-right"></i></a><?php
                                                                                                                                                                                                                                                                                } ?>
        </div>
    </div>
</section>