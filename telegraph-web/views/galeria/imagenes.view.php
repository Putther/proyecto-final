 <div class="contenedor">
     <h1 class="titulo-galeria"><?php

                                if (!empty($imagen['titulo_galeria'])) {
                                    echo $imagen['titulo_galeria'];
                                } else {
                                    echo $imagen['imagen_galeria'];
                                }
                                ?></h1>
 </div>
 <div class="contenedor">
     <div class="foto"><img src="../../recursos/imagenes/galeria/<?php echo $imagen['imagen_galeria']; ?>" alt="">
         <p class="texto"><?php echo $imagen['texto_galeria']; ?></p>
         <a href="galeria.php" class="regresar"><i class="fa fa-arrow-left"></i> Volver a la galería</a>
     </div>
 </div>

 <footer class="footer-imagenes">
    <p class="copyright">Esta web ha sido creada por y para los fans. Todos los derechos reservados © 2023</p>
</footer>
</body>

</html>