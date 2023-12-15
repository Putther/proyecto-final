<h1 class="personal_titulo">Detalles de: <?php echo $usuario["login_usuario"]?></h1><br>
<div class="post contenedor">
    <div class="personal footer-post">
        <article class="personal_texto">
            <img src="../../recursos/imagenes/usuario/<?php echo $usuario['imagen_usuario'] ?>" alt="Avatar" class="avatar">
            <p><i><?php echo $usuario['frase_usuario'] ?></i></p><br>
            <p><b>Nombre:</b> <?php echo $usuario["nombre_usuario"] ?></p><br>
            <p><b>Fecha de registro:</b> <?php echo fecha($usuario["fecha_registro_usuario"]) ?></p><br>
            <p><b>Correo electrónico: </b><?php echo $usuario["correo_usuario"] ?></p><br>
            <p><b>Sobre mí: </b><?php echo $usuario['sobremi_usuario'] ?></p><br>
            <h1><b>ACTIVIDAD EN LA PÁGINA</b></h1><br>
            <hr><br>
            <p><b>Nº de posts subidos: </b><?php echo $usuario["numero_posts_usuario"] ?></p><br>
            <p><b>Posts favoritos: </b><?php echo $usuario["numero_favoritos_usuario"] ?> (<a href="../personal/favoritos.php?usuario=<?php echo $usuario["login_usuario"] ?>">Ver</a>)</p><br>
            <p><b>Nº de comentarios realizados: </b><?php echo $usuario["numero_comentarios_usuario"] ?></p><br>
            <p><b>Mejor puntuación en el test: </b><?php echo $usuario["mejor_puntuacion_usuario"] ?> puntos</p><br>
        </article>
    </div>
</div>