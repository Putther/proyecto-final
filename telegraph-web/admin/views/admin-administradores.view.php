<style>
    .main-menu-administradores {
	background-color: #3299b9;
}
</style>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Administrador registrado con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_modificar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Datos actualizados con éxito')";
        echo "</script>";
    } else if ($_GET["mensaje"] == "success_borrar") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Administrador eliminado con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>ADMINISTRADORES</h2><br>

<div class="contenedor">
    <button class="boton-admin" id="btnMostrarFormulario">Añadir administrador</button><br><br>

    <div id="fondoModal"></div>

    <div id="formularioAdmin" class="formularioAdmin" style="display: none;">
        <h2>Nuevo administrador</h2>
        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="nuevo_admin">
            <i class="icono izquierda fa fa-user"></i><input type="text" name="login" placeholder="Login:">
            <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" placeholder="Contraseña:">
            <input type="submit" value="REGISTRAR ADMIN">
        </form>
    </div>

    <table id="tablaAdmin">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $administradores->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['pass_usuario']}</td>";
                echo "<td> <button class=\"boton-admin-modificar\">MODIFICAR</button>
                <div id=\"modificaAdmin\" class=\"formularioAdmin\" style=\"display: none;\">
                <h2>Modificar administrador</h2>
                <form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
                    <input type=\"hidden\" name=\"modificar_admin\">
                    <input type=\"hidden\" name=\"id_usuario\" value=" . $row['id_usuario'] . ">
                    <i class=\"icono izquierda fa fa-user\"></i><input type=\"text\" name=\"login\" placeholder=\"Login:\" value=\"{$row['login_usuario']}\">
                    <i class=\"icono izquierda fa fa-lock\"></i><input type=\"password\" name=\"password\" placeholder=\"Contraseña:\" value=\"{$row['pass_usuario']}\">
                    <input type=\"submit\" value=\"MODIFICAR\">
                </form>
            </div>
                </td>";
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_admin\">
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