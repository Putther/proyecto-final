<style>
    .main-menu-galeria {
        background-color: #3299b9;
    }
</style>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Imagen eliminada con éxito')";
        echo "</script>";
    }
}
?>

<h2 style="text-align: center" ;>IMÁGENES</h2><br>

<div class="contenedor">
    <table id="tablaAdmin">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Título</th>
                <th>Imagen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $galeria->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['titulo_galeria']}</td>";
                echo "<td>{$row['imagen_galeria']}</td>";
                echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
              <input type=\"hidden\" name=\"eliminar_imagen\">
              <input type=\"hidden\" name=\"id_galeria\" value=\"{$row['id_galeria']}\">
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
</script>