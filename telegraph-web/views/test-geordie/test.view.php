<nav class="menu">
    <ul id="horizontal">
        <i class="fa fa-arrow-right"></i>
        <li><a href="#" class="selected">Test </a></li><i class="fa fa-arrow-left"></i>
        <li><a href="tabla-puntuaciones.php">Mejores puntuaciones</a></li>
    </ul>
</nav><br>

<div class="contenedor">
    <div class="post">
        <article>
            <div class="thumb">
                <p>
                    <img class="imagen-test" src="<?php echo RUTA; ?>/recursos/imagenes/recursos/test.jpg" alt="">
                </p>
            </div>
            <p>El test Geordie se trata de un cuestionario sencillo acerca de la banda de rock británico "Dire Straits" cuya estructura se define por las siguientes reglas:</p><br>
            <hr><br>

            <h1 class="titulo">ESTRUCTURA</h1><br>
            <hr><br>


            <p>· El cuestionario estará dividido en <b>11 preguntas</b> que cambiarán aleatoriamente cada vez que se acceda al test</p><br>

            <p>· Dentro de esas 11 preguntas, <b>la dificultad irá aumentando progresivamente</b> siendo las cinco primeras de <b style="color: green">fácil</b> dificultad, las cinco siguientes de dificultad <b style="color: lightsalmon">media</b> y la última pregunta una <b style="color: lightcoral">difícil</b></p><br>

            <p>· Cada pregunta <b>constará de 4 posibles respuestas</b> (excepto si es de verdadero-falso en cuyo caso serán dos). Solo una de ellas es la correcta</p><br>
            <hr><br>

            <h1 class="titulo">SISTEMA DE PUNTUACIONES</h1><br>
            <hr><br>


            <p>El test además constará de un sistema por puntos según dificultad, aciertos, fallos y tiempo invertido en responder cada pregunta:</p><br><br>

            <p><b>DIFICULTAD</b>. Según la dificultad sumará una cantidad de puntos si es correcta pero cuidado, si se contesta mal, también podrá restar el equivalente a la mitad su valor por lo que si no se sabe muy bien la respuesta hay que pensar bien si se desea o no contestar:</p><br>

            <p>· <b style="color: green">Fácil:</b> ACIERTO: <b style="color: green">+ 1000 puntos</b> | FALLO: <b style="color: lightcoral">- 500 puntos</b></p><br>

            <p>· <b style="color: lightsalmon">Medio:</b> ACIERTO: <b style="color: green">+ 5000 puntos</b> | FALLO: <b style="color: lightcoral">- 2500 puntos</b></p><br>

            <p>· <b style="color: lightcoral">Difícil:</b> ACIERTO: <b style="color: green">+ 10000 puntos</b> | FALLO: <b style="color: lightcoral">- 5000 puntos</b></p><br><br>

            <p><b>TIEMPO</b>. Cada pregunta <b>constará de 30 segundos</b> para responder. No hay que preocuparse, aunque se agote el tiempo se podrá responder a la pregunta y se sumará o restará puntos pero responder fuera de tiempo supondrá perder muchos puntos porque <b>el tiempo restante se multiplicará por 100 y se sumará a la puntuación total.</b></p><br>

            <p>Para evitar que el usuario responda rápidamente aunque esté mal solo para asegurarse los puntos del tiempo, <b>el bonus por tiempo quedará anulado si la respuesta está mal.</b></p><br>
            <hr><br>
            
            <?php

            if ($_SESSION['usuario'] != "invitado") {
            ?>
                <form class="formulario-test" action="comienzo-test.php" method="post">
                    <input type="submit" value="¡COMENZAR!">
                </form>
            <?php
            } else {
            ?>
                <p><i>Para poder realizar el test has de <a href="../general/cerrar-sesion.php">iniciar sesión o registrarte</a></i></p>
            <?php
            }
            ?>
        </article>
    </div>
</div>