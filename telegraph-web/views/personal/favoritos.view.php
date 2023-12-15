<div class="contenedor">

<h2 class="titulo busqueda"><?php echo $titulo?></h2> <?php

    foreach ($resultado as $articulo) { ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="../principal/ver-post.php?id=<?php echo $articulo['id_post']; ?>"><?php echo $articulo['titulo_post']?></a></h2>
                <p class="fecha"><?php echo fecha($articulo['fecha_post'])?></p>
                <div class="thumb">
                    <a href="../principal/ver-post.php?id=<?php echo $articulo['id_post'];?>">
                        <img src="<?php echo RUTA; ?>/recursos/imagenes/comunidad/<?php echo $articulo['imagen_post']?>" alt="">
                    </a>
                </div>
                <p class="descripcion"><?php echo $articulo['descripcion_post']?></p>
                <a href="../principal/ver-post.php?id=<?php echo $articulo['id_post'];?>" class="continuar">Leer post</a>
            </article>
        </div>
    <?php
    }

    ?>
    
</div>