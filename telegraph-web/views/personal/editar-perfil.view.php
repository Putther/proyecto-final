<h1 class="personal_titulo">Editar perfil</h1><br>
<div class="post contenedor">
    <div class="personal footer-post">
        <article class="personal_texto">
            <form class="formulario-editar" enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="subir-imagen">
                    <b>Imagen de perfil:</b> <img src="../../recursos/imagenes/usuario/<?php echo $usuario['imagen_usuario'] ?>" alt="Avatar" class="preview">
                    <input type="file" name="imagen" />
                </div><br>
                <b>Nombre:</b> <input type="text" value="<?php echo $usuario["nombre_usuario"] ?>" name="nombre"><br>
                <b>Login de usuario:</b> <input type="text" value="<?php echo $usuario['login_usuario'] ?>" name="login"><br>
                <b>Correo electrónico:</b> <input size="50" type="email" value="<?php echo $usuario["correo_usuario"] ?>" name="correo"></h2><br>
                <b>Sobre mí:</b> <textarea placeholder="Introduce texto" name="sobremi"><?php echo $usuario["sobremi_usuario"] ?></textarea><br>
                <b>Frase:</b> <input type="text" value="<?php echo $usuario["frase_usuario"] ?>" name="frase"><br>
                <input type="hidden" name="ruta_imagen" value="<?php echo $usuario["imagen_usuario"] ?>">
                <input type="submit" value="Editar perfil"></input>
            </form>
        </article>
    </div>
</div>