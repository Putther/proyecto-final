<?php $numero_paginas = numeroPaginas($blog_config['articulos_por_pagina'], $conexion); ?>
<section class="paginacion">
    <ul>
        <?php

        if (isset($noResultados) && $noResultados == true) {
            
        } else {
        
        if (paginaActual() == 1) {
            ?><li class="disabled">&laquo;</li><?php
        } else {
        ?> <li><a href="principal.php?p=<?php echo paginaActual() - 1 ?>">&laquo;</a></li><?php
        }

        for ($i=1; $i <= $numero_paginas; $i++) { 
            
            if (paginaActual() === $i) { ?>
                <li class="active">
                    <?php echo $i ?>
                </li> <?php
            } else { ?>
                <li><a href="principal.php?p=<?php echo $i?>"><?php echo $i?></a></li> <?php
            }
        }

        if (paginaActual() == $numero_paginas) {
            ?><li class="disabled">&raquo;</li><?php
        } else {
            ?> <li><a href="principal.php?p=<?php echo paginaActual() + 1 ?>">&raquo;</a></li><?php
        }
    }
        
        ?>


    </ul>
</section>