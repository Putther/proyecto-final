<audio id="musica" autoplay>
    <source src="admin/test/recursos/sultans.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<div class="contenedor">
    <div class="post">
        <article>
            <div class="test-info">
                <div class="dificultad">Dificultad: <span id="dificultad"></span></div>
                <div class="puntuacion-total">Puntuación total: <span id="puntuacion">0</span></div>
            </div><br>
            <div class="tiempo-restante">Tiempo restante: <span id="contador"></span></div><br>
            <div id="pregunta"></div>
            <button id="siguiente">Responder</button><br><br>
            <button id="saltar">Saltar Pregunta</button>
            <button id="siguiente-pregunta" style="display: none;">Siguiente pregunta</button>
            <input id="continuar" style="display: none;" type="submit" value="Continuar">
            <div class="infoPregunta" id="infoPregunta" style="display: none;"></div>
            <div class="infoPreguntaIncorrecta" id="infoPreguntaIncorrecta" style="display: none;"></div>
        </article>
    </div>
</div>

<footer class="footer-test">
    <p class="copyright">Esta web ha sido creada por y para los fans. Todos los derechos reservados © 2023</p>
</footer>
</body>

</html>

<script type="text/javascript">
    //Música de fondo

    let audio = document.getElementById("musica");
    audio.volume = 0.1;

    // Variables iniciales

    let preguntas = <?php echo json_encode($arrayPreguntas); ?>; // Array resultante de PHP convertido a JavaScript
    let indicePreguntaActual = 0;
    let puntuacion = 0;

    let tiempoRestante = 30; // Tiempo inicial para responder la pregunta (en segundos)
    let temporizador;



    function iniciarContador() {
        tiempoRestante = 30;
        actualizarContador();
        temporizador = setInterval(actualizarContador, 1000);
    }

    function actualizarContador() {
        $('#contador').text(tiempoRestante);
        tiempoRestante--;

        if (tiempoRestante < 0) {
            clearInterval(temporizador);
        }
    }

    // Función para mostrar la pregunta actual
    function mostrarPregunta() {
        if (indicePreguntaActual < preguntas.length) {
            let preguntaActual = preguntas[indicePreguntaActual];
            let htmlPregunta = `
                    <h3>${indicePreguntaActual + 1}. ${preguntaActual.enunciado}</h3><br>
                    <form id="formRespuestas">
                        <input type="radio" name="respuesta" value="${preguntaActual.respuesta_1}"> ${preguntaActual.respuesta_1}<br>
                        <input type="radio" name="respuesta" value="${preguntaActual.respuesta_2}"> ${preguntaActual.respuesta_2}<br>
                `;
            // Verificar si respuesta_3 y respuesta_4 no están vacíos (Preguntas de tipo verdadero-falso)
            if (preguntaActual.respuesta_3.trim() !== '' && preguntaActual.respuesta_4.trim() !== '') {
                htmlPregunta += `
                        <input type="radio" name="respuesta" value="${preguntaActual.respuesta_3}"> ${preguntaActual.respuesta_3}<br>
                        <input type="radio" name="respuesta" value="${preguntaActual.respuesta_4}"> ${preguntaActual.respuesta_4}<br>
                    `;
            }
            htmlPregunta += `</form><br>`;
            $('#pregunta').html(htmlPregunta);

            // Mostrar la dificultad de la pregunta
            let dificultadColor = '';
            switch (preguntaActual.dificultad) {
                case 'facil':
                    dificultadColor = 'facil';
                    break;
                case 'medio':
                    dificultadColor = 'medio';
                    break;
                case 'dificil':
                    dificultadColor = 'dificil';
                    break;
                default:
                    dificultadColor = '';
            }
            $('#dificultad').text(preguntaActual.dificultad).addClass(dificultadColor);

        } else {
            $('#pregunta').html("<h1>Test terminado.</h1>");
            $('.dificultad').hide();
            $('.tiempo-restante').hide();
            $('#siguiente').hide();
            $('#saltar').hide();
            $('#continuar').show();
        }
    }

    // Función para enviar la puntuación a otra página PHP

    function enviarPuntuacion() {
        let puntuacionTest = $('#puntuacion').text();

        $.ajax({
            type: 'POST',
            url: 'puntuacion.php',
            data: {
                puntuacion: puntuacionTest
            },
            success: function(data) {
                alert(data);
                window.location.href = 'tabla-puntuaciones.php';
            },
            error: function(xhr, status, error) {
                // Manejar errores si los hay
                console.error('Error al enviar la puntuación: ' + error);
            }
        });
    }

    // Manejador de evento al hacer clic en "Responder"

    $('#siguiente').on('click', function() {
        // Manejar la selección de la respuesta

        let puntosPorTiempo = tiempoRestante * 100; //Contador de puntos por tiempo

        let respuestaSeleccionada = $('input[name=respuesta]:checked').val();
        let preguntaActual = preguntas[indicePreguntaActual];
        if (respuestaSeleccionada == preguntaActual.respuesta_correcta && preguntaActual.dificultad == "facil") {
            puntuacion += 1100; // Aumentar la puntuación en 1000 puntos por respuesta correcta
            puntuacion += puntosPorTiempo; // Bonificación por tiempo
            $('#infoPregunta').text("¡Correcto! " + preguntaActual.info).show();
            $('#infoPreguntaIncorrecta').hide();
        } else if (respuestaSeleccionada != preguntaActual.respuesta_correcta && preguntaActual.dificultad == "facil") {
            puntuacion -= 500; // Disminuir la puntuación en 500 puntos por respuesta incorrecta
            $('#infoPregunta').hide();
            $('#infoPreguntaIncorrecta').text("¡Has fallado!").show();
        } else if (respuestaSeleccionada == preguntaActual.respuesta_correcta && preguntaActual.dificultad == "medio") {
            puntuacion += 5100; // Aumentar la puntuación en 5000 puntos por respuesta correcta
            puntuacion += puntosPorTiempo; // Bonificación por tiempo
            $('#infoPregunta').text("¡Correcto! " + preguntaActual.info).show();
            $('#infoPreguntaIncorrecta').hide();
        } else if (respuestaSeleccionada != preguntaActual.respuesta_correcta && preguntaActual.dificultad == "medio") {
            puntuacion -= 2500; // Disminuir la puntuación en 2500 puntos por respuesta incorrecta
            $('#infoPregunta').hide();
            $('#infoPreguntaIncorrecta').text("¡Has fallado!").show();
        } else if (respuestaSeleccionada == preguntaActual.respuesta_correcta && preguntaActual.dificultad == "dificil") {
            puntuacion += 10100; // Aumentar la puntuación en 10000 puntos por respuesta correcta
            puntuacion += puntosPorTiempo; // Bonificación por tiempo
            $('#infoPregunta').text("¡Correcto!" + preguntaActual.info).show();
            $('#infoPreguntaIncorrecta').hide();
        } else if (respuestaSeleccionada != preguntaActual.respuesta_correcta && preguntaActual.dificultad == "dificil") {
            puntuacion -= 5000; // Disminuir la puntuación en 5000 puntos por respuesta incorrecta
            $('#infoPregunta').hide();
            $('#infoPreguntaIncorrecta').text("¡Has fallado!").show();
        }
        $('#puntuacion').text(puntuacion);

        let htmlPregunta = ``;
        $('#pregunta').html(htmlPregunta);
        $('.dificultad').hide();
        $('.tiempo-restante').hide();
        $('#siguiente').hide();
        $('#saltar').hide();
        $('#siguiente-pregunta').show();
    });

    $('#siguiente-pregunta').on('click', function() {
        // Pasar a la siguiente pregunta tras responder
        indicePreguntaActual++;
        $('.dificultad').show();
        $('.tiempo-restante').show();
        $('#siguiente').show();
        $('#saltar').show();
        $('#siguiente-pregunta').hide();
        $('#infoPregunta').hide();
        $('#infoPreguntaIncorrecta').hide();
        mostrarPregunta();
        clearInterval(temporizador); // Limpiar el temporizador al pasar a la siguiente pregunta
        iniciarContador();
        //$('#siguiente').prop('disabled', true);
    });

    // Botón "Saltar Pregunta"
    $('#saltar').on('click', function() {
        // Pasar a la siguiente pregunta sin sumar puntos
        indicePreguntaActual++;
        mostrarPregunta();
        clearInterval(temporizador); // Limpiar el temporizador al pasar a la siguiente pregunta
        iniciarContador();
    });

    $('#continuar').on('click', function() {
        enviarPuntuacion();
    });

    // Mostrar la primera pregunta al cargar la página
    mostrarPregunta();
    iniciarContador();


    // Hasta que el usuario no seleccione una de las opciones no podrá responder

    /*function habilitarBotonResponder() {
        $('#siguiente').prop('disabled', false);
    }

    $('input[type=radio][name=respuesta]').on('change', function() {
        habilitarBotonResponder();
    });*/
</script>