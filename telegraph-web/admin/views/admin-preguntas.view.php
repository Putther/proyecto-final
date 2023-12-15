<style>
    .main-menu-test {
        background-color: #3299b9;
    }

    .main-menu-preguntas {
        background-color: #3299b9;
    }
</style>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Pregunta añadida con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_modificar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Pregunta modificada con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_borrar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Pregunta eliminada con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>PREGUNTAS DEL TEST</h2><br>

<div class="contenedor">
    <button class="boton-admin" id="btnMostrarFormulario">Añadir preguntas</button><br><br>

    <div id="fondoModal"></div>

    <div id="formularioAdmin" class="formularioAdmin" style="display: none;">
        <h2>Nueva pregunta</h2>
        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="nueva_pregunta">
            <label for="dificultad">Dificultad de la pregunta:</label>
            <select id="dificultad" name="dificultad">
                <option value="facil">Fácil</option>
                <option value="medio">Media</option>
                <option value="dificil">Difícil</option>
            </select><br><br>
            <input type="text" name="enunciado" placeholder="Enunciado:">
            <input type="text" name="resp1" placeholder="Respuesta 1:">
            <input type="text" name="resp2" placeholder="Respuesta 2:">
            <input type="text" name="resp3" placeholder="Respuesta 3:">
            <input type="text" name="resp4" placeholder="Respuesta 4:">
            <input type="text" name="respcorrecta" placeholder="Respuesta correcta:">
            <input type="text" name="info" placeholder="Información adicional:">
            <input type="submit" value="REGISTRAR PREGUNTA">
        </form>
    </div>

    <table id="tablaAdmin">
        <thead>
            <tr>
                <th>Dificultad</th>
                <th>Enunciado</th>
                <th>Resp. 1</th>
                <th>Resp. 2</th>
                <th>Resp. 3</th>
                <th>Resp. 4</th>
                <th>Resp. correcta</th>
                <th>Info</th>
                <th></th>
                <th></th>
                <!-- <th></th>
                <th></th> -->
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $preguntas->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['dificultad']}</td>";
                echo "<td>{$row['enunciado']}</td>";
                echo "<td>{$row['respuesta_1']}</td>";
                echo "<td>{$row['respuesta_2']}</td>";
                echo "<td>{$row['respuesta_3']}</td>";
                echo "<td>{$row['respuesta_4']}</td>";
                echo "<td>{$row['respuesta_correcta']}</td>";
                echo "<td>{$row['info']}</td>";
                echo "<td> <button class=\"boton-admin-modificar\">MODIFICAR</button>
                <div id=\"modificaPregunta\" class=\"formularioAdmin\" style=\"display: none;\">
                <h2>Modificar pregunta</h2>
                <form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
                    <input type=\"hidden\" name=\"modificar_pregunta\">
                    <input type=\"hidden\" name=\"id_pregunta\" value=" . $row['id'] . ">
                    <input type=\"hidden\" name=\"dificultad\" value=" . $row['dificultad'] . ">
                    <input type=\"hidden\" name=\"enunciado\" value=" . $row['enunciado'] . ">
                    <input type=\"hidden\" name=\"resp1\" value=" . $row['respuesta_1'] . ">
                    <input type=\"hidden\" name=\"resp2\" value=" . $row['respuesta_2'] . ">
                    <input type=\"hidden\" name=\"resp3\" value=" . $row['respuesta_3'] . ">
                    <input type=\"hidden\" name=\"resp4\" value=" . $row['respuesta_4'] . ">
                    <input type=\"hidden\" name=\"respcorrecta\" value=" . $row['respuesta_correcta'] . ">
                    <input type=\"hidden\" name=\"info\" value=" . $row['info'] . ">

                    <label for=\"dificultad\">Dificultad de la pregunta:</label>
                    <select id=\"dificultad\" name=\"dificultad\">";
                if ($row['dificultad'] == "facil") {
                    echo "<option value=\"facil\" selected=\"selected\">Fácil</option>";
                    echo "<option value=\"medio\">Media</option>";
                    echo "<option value=\"dificil\">Difícil</option>";
                } else if ($row['dificultad'] == "medio") {
                    echo "<option value=\"facil\">Fácil</option>";
                    echo "<option value=\"medio\" selected=\"selected\">Media</option>";
                    echo "<option value=\"dificil\">Difícil</option>";
                } else if ($row['dificultad'] == "dificil") {
                    echo "<option value=\"facil\">Fácil</option>";
                    echo "<option value=\"medio\">Media</option>";
                    echo "<option value=\"dificil\" selected=\"selected\">Difícil</option>";
                }
                echo "</select><br><br>

                    <input type=\"text\" name=\"enunciado\" placeholder=\"Enunciado:\" value=\"{$row['enunciado']}\">
                    <input type=\"text\" name=\"resp1\" placeholder=\"Respuesta 1:\" value=\"{$row['respuesta_1']}\">
                    <input type=\"text\" name=\"resp2\" placeholder=\"Respuesta 2:\" value=\"{$row['respuesta_2']}\">
                    <input type=\"text\" name=\"resp3\" placeholder=\"Respuesta 3:\" value=\"{$row['respuesta_3']}\">
                    <input type=\"text\" name=\"resp4\" placeholder=\"Respuesta 4:\" value=\"{$row['respuesta_4']}\">
                    <input type=\"text\" name=\"respcorrecta\" placeholder=\"Respuesta correcta:\" value=\"{$row['respuesta_correcta']}\">
                    <input type=\"text\" name=\"info\" placeholder=\"Información adicional:\" value=\"{$row['info']}\">
                    <input type=\"submit\" value=\"MODIFICAR\">
                </form>
            </div>
                </td>";
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_pregunta\">
              <input type=\"hidden\" name=\"id_pregunta\" value=\"{$row['id']}\">
              <input type=\"submit\" value=\"ELIMINAR\">
            </form></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php imprimeSidebar();
?>

<script>
    new DataTable('#tablaAdmin', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencias a los botones y a los formularios
        let btnMostrarFormulario = document.getElementById("btnMostrarFormulario");
        let btnMostrarFormularioModificar = document.querySelectorAll(".boton-admin-modificar");

        let fondoModal = document.getElementById("fondoModal"); //Oscurecer fondo

        let formularioAgregar = document.getElementById("formularioAdmin");
        let formularioModificar = document.getElementById("modificaPregunta");



        // Evento click para mostrar el formulario cuando se hace click en el botón
        btnMostrarFormulario.addEventListener("click", function() {
            // Mostrar el formulario cambiando su estilo a "display: block"
            fondoModal.style.display = "block";
            formularioAgregar.style.display = "block";
        });

        btnMostrarFormularioModificar.forEach(function(btn) {
            btn.addEventListener("click", function() {
                let formularioAdmin = this.nextElementSibling;

                document.querySelectorAll('.formularioAdmin').forEach(function(form) {
                    form.style.display = "none";
                });
                // Mostrar el formulario cambiando su estilo a "display: block"
                fondoModal.style.display = "block";
                formularioAdmin.style.display = "block";
            });
        });

        fondoModal.addEventListener("click", function() {
            // Ocultar el fondo oscuro y el formulario si se hace click fuera del formulario
            fondoModal.style.display = "none";
            formularioAgregar.style.display = "none";
            formularioModificar.style.display = "none";
            document.querySelectorAll('.formularioAdmin').forEach(function(form) {
                form.style.display = "none";
            });
        });
    });
</script>