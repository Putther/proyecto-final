<?php
if (isset($_GET['theme'])) {
    $theme = $_GET['theme']; // Obtener el estado del tema actual (claro u oscuro)

    // Establecer una cookie para almacenar la preferencia del tema
    setcookie('siteTheme', $theme, time() + (86400 * 30), '/'); // Cookie válida por 30 días

    header('Location: personal.php');
    exit();
}
?>
