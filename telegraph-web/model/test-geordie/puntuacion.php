<?php session_start();

require '../../recursos/funciones.php';
require '../../recursos/config.php';

if (isset($_COOKIE['cookie_sesion'])) {
    $data = json_decode($_COOKIE['cookie_sesion'], true);
    
    $_SESSION["usuario"] = $data["usuario"];
    $_SESSION["frase"] = $data["frase"];
}

comprobarSesionUsuario();

$usuario = $_SESSION["usuario"];

$conexion = conexion($bd_config);

if (isset($_POST['puntuacion'])) {
    $puntuacion = $_POST['puntuacion'];
    $puntuacionRecibida = intval($puntuacion); // Convertir a entero

    $guardarPuntuacion = $conexion->prepare("INSERT INTO puntuaciones (usuario_puntuacion, puntuacion_total) VALUES ('$usuario', '$puntuacionRecibida')");
    $guardarPuntuacion->execute();

    $mejorPuntuacion = $conexion->prepare("SELECT mejor_puntuacion_usuario FROM usuarios WHERE login_usuario = '$usuario'");
    $mejorPuntuacion->execute();
    $mejorPuntuacionDatos = $mejorPuntuacion->fetch(PDO::FETCH_ASSOC);
    $mejorPuntuacionTotal = intval($mejorPuntuacionDatos["mejor_puntuacion_usuario"]);

    if ($mejorPuntuacionTotal < $puntuacionRecibida) {
        $actualizaPuntuacion = $conexion->prepare("UPDATE usuarios SET mejor_puntuacion_usuario = '$puntuacionRecibida' WHERE login_usuario = '$usuario'");
        $actualizaPuntuacion->execute();
    }

    echo "Puntuación recibida: " . $puntuacionRecibida;
} else {
    echo "Ha ocurrido un error al enviar ";
}
