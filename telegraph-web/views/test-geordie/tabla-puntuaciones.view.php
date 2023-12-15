<nav class="menu">
    <ul id="horizontal">
        <li><a href="test.php">Test </a></li>
        <i class="fa fa-arrow-right"></i>
        <li><a href="#" class="selected">Mejores puntuaciones</a></li><i class="fa fa-arrow-left"></i>
    </ul>
</nav><br>

<div class="contenedor">
    <h2 class="titulo" style="text-align: center;">¡TOP 10 GEORDIES!</h2><br>
    <div class="post">
        <table class="tabla-puntuaciones">
            <tr style="margin-bottom: 10px;">
                <th>Usuario</th>
                <th>Puntuación Obtenida</th>
            </tr>
            <td colspan="2">&nbsp;</td>
            </tr>
            <?php
            while ($row = $mejoresPuntuaciones->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                if ($contadorFilas == 1) {
                    echo "<td><i class=\"fa fa-trophy\" style=\"color: #ffc933;\"></i>" . " " . $contadorFilas . ". " . $row["usuario_puntuacion"] . "</td>
                    <td>" . $row["puntuacion_total"] . "</td></tr>";
                } else if ($contadorFilas == 2) {
                    echo "<td><i class=\"fa fa-trophy\" style=\"color: #e0e0e0;\"></i>" . " " . $contadorFilas . ". " . $row["usuario_puntuacion"] . "</td>
                    <td>" . $row["puntuacion_total"] . "</td></tr>";
                } else if ($contadorFilas == 3) {
                    echo "<td><i class=\"fa fa-trophy\" style=\"color: #a97a37;\"></i>" . " " . $contadorFilas . ". " . $row["usuario_puntuacion"] . "</td>
                    <td>" . $row["puntuacion_total"] . "</td></tr>";
                } else {
                    echo "<td>" . $contadorFilas . ". " . $row["usuario_puntuacion"] . "</td>
                <td>" . $row["puntuacion_total"] . "</td></tr>";
                }
                $contadorFilas++;
            }
            echo "<td colspan=\"2\">&nbsp;</td></tr>";
            echo "</table>";
            ?>
    </div>
</div>

<footer class="footer-puntuaciones">
    <p class="copyright">Esta web ha sido creada por y para los fans. Todos los derechos reservados © 2023</p>
</footer>
</body>