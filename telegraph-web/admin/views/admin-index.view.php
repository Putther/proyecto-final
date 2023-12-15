<style>
    .main-menu-index {
	background-color: #3299b9;
}
</style>

<div id="mensaje"></div>

<?php

if (isset($_GET["mensaje"])) {
    if ($_GET["mensaje"] == "success") {
        echo "<script>";
        echo "mostrarMensaje('success', 'Estado actualizado con éxito')";
        echo "</script>";
    }
}
?>
<h2 style="text-align: center" ;>REPORTES</h2><br>
<div class="contenedor">
    <table id="tablaReportes">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Categoría</th>
                <th>Reporte</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = $reportes->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['login_usuario']}</td>";
                echo "<td>{$row['categoria_reporte']}</td>";
                echo "<td>{$row['contenido_reporte']}</td>";
                if ($row['estado_reporte'] == "Sin resolver") {
                    echo "<td style='color: red;'>{$row['estado_reporte']}</td>";
                    echo "<td><form class=\"formulario\" action=" . $_SERVER['PHP_SELF'] . " method=\"post\">
                    <input type=\"hidden\" name=\"resolver_reporte\">
                    <input type=\"hidden\" name=\"id_reporte\" value=\"{$row['id_reporte']}\">
                    <input type=\"submit\" value=\"RESOLVER\">
                  </form></td>";
                    echo "</tr>";
                } else {
                    echo "<td style='color: green;'>{$row['estado_reporte']}</td>";
                    echo "<td></td>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php imprimeSidebar();
?>

<script>
    new DataTable('#tablaReportes', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
</script>