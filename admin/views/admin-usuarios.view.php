<style>
    .main-menu-usuarios {
        background-color: #3299b9;
    }
</style>


<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Usuario eliminado con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>USUARIOS</h2><br>

<div class="contenedor">

    <table id="tablaUsuarios">
        <thead>
            <tr>
                <th>Login</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $administradores->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['nombre_usuario']}</td>";
                echo "<td>{$row['correo_usuario']}</td>";
                echo "<td>{$row['pass_usuario']}</td>";
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_usuario\">
              <input type=\"hidden\" name=\"id_usuario\" value=\"{$row['id_usuario']}\">
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
    new DataTable('#tablaUsuarios', {
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
        let formularioModificar = document.getElementById("modificaAdmin");



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