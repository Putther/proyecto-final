<style>
    .main-menu-comunidad {
        background-color: #3299b9;
    }
</style>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Publicación eliminada con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>PUBLICACIONES</h2><br>

<div class="contenedor">
    <table id="tablaPublicaciones">
        <thead>
            <tr>
                <th>Creador del post</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $publicaciones->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['titulo_post']}</td>";
                echo "<td>{$row['descripcion_post']}</td>";
                echo "<td>{$row['fecha_post']}</td>";
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_publicacion\">
              <input type=\"hidden\" name=\"id_usuario\" value=\"{$row['id_usuario']}\">
              <input type=\"hidden\" name=\"id_post\" value=\"{$row['id_post']}\">
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
    new DataTable('#tablaPublicaciones', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
</script>