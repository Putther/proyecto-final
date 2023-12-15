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
        echo "mostrarMensaje('success', 'Comentario eliminado con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>COMENTARIOS</h2><br>

<div class="contenedor">
    <table id="tablaComentarios">
        <thead>
            <tr>
                <th>Post</th>
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $comentarios->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['titulo_post']}</td>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['texto_comentario']}</td>";
                if ($row['fecha_comentario_editado'] != NULL) {
                    echo "<td>{$row['fecha_comentario_editado']}</td>";
                } else {
                    echo "<td>{$row['fecha_comentario']}</td>";
                }
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_comentario\">
              <input type=\"hidden\" name=\"id_comentario\" value=\"{$row['id_comentario']}\">
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
    new DataTable('#tablaComentarios', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
</script>