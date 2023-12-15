<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Datos actualizados con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_reporte") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Reporte enviado con éxito')";
        echo "</script>";
    }
}

?>

<h1 class="personal_titulo">Mi página personal</h1><br>
<div class="post contenedor">
    <div class="personal footer-post">
        <article class="personal_texto">
            <div class="test-info">
                <div class="puntuacion-total"><a href="cambiar-tema.php?theme=<?php echo ($theme === 'dark') ? 'light' : 'dark'; ?>">
                        <i class="fa <?php echo $iconClass; ?>"></i> <?php echo $toggleText; ?>
                    </a>
                    </a></div>
            </div>

            <img src="../../recursos/imagenes/usuario/<?php echo $usuario['imagen_usuario'] ?>" alt="Avatar" class="avatar">
            <h2><?php echo $usuario["login_usuario"] ?></h2>
            <p><i><?php echo $usuario['frase_usuario'] ?></i></p><br>
            <h1><b>DATOS PERSONALES</b></h1><br>
            <hr><br>
            <p><b>Nombre:</b> <?php echo $usuario["nombre_usuario"] ?></p><br>
            <p><b>Fecha de registro:</b> <?php echo fecha($usuario["fecha_registro_usuario"]) ?></p><br>
            <p><b>Correo electrónico: </b><?php echo $usuario["correo_usuario"] ?></p><br>
            <p><b>Sobre mí: </b><?php echo $usuario['sobremi_usuario'] ?></p><br>
            <form class="formulario" method="get" action="editar-perfil.php">
                <input type="submit" value="Editar perfil"></input>
            </form>
            <h1><b>ACTIVIDAD EN LA PÁGINA</b></h1><br>
            <hr><br>
            <p><b>Nº de posts subidos: </b><?php echo $usuario["numero_posts_usuario"] ?></p><br>
            <p><b>Posts favoritos: </b><?php echo $usuario["numero_favoritos_usuario"] ?> (<a href="favoritos.php?usuario=<?php echo $login_usuario ?>">Ver</a>)</p><br>
            <p><b>Nº de comentarios realizados: </b><?php echo $usuario["numero_comentarios_usuario"] ?></p><br>
            <p><b>Mejor puntuación en el test: </b><?php echo $usuario["mejor_puntuacion_usuario"] ?> puntos</p><br>
            <form class="formulario" method="get" action="nuevo-reporte.php">
                <input type="submit" value="Hacer un reporte"></input>
            </form>
        </article>
    </div>
</div>