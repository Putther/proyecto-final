<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);
$login_usuario = $_SESSION["usuario"];

$statement = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$statement->execute();
$usuario = $statement->fetch(PDO::FETCH_ASSOC);

if (!$conexion) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen = $_FILES['imagen']['tmp_name'];
    $nombre = limpiarDatos($_POST['nombre']);
    $login = limpiarDatos($_POST['login']);
    $correo = limpiarDatos($_POST['correo']);
    $sobremi = limpiarDatos($_POST['sobremi']);
    $frase = limpiarDatos($_POST['frase']);

    if ($imagen != "") {

        $ruta_imagen = $_POST["ruta_imagen"];

        if ($ruta_imagen != "default.png") {
            if (file_exists("../../recursos/imagenes/usuario/" . $ruta_imagen)) {
                unlink("../../recursos/imagenes/usuario/" . $ruta_imagen);
            }
        }

        $archivo_subido = $blog_config['carpeta_imagenes_usuarios'] . $_FILES['imagen']['name'];

        move_uploaded_file($imagen, $archivo_subido);

        $statement = $conexion->prepare("UPDATE usuarios SET nombre_usuario='$nombre', login_usuario='$login', imagen_usuario='" . $_FILES['imagen']['name'] . "', correo_usuario='$correo', frase_usuario='$frase', sobremi_usuario='$sobremi' WHERE login_usuario = '$login_usuario'");

        $statement->execute();

        header('Location: ' . RUTA . '/model/personal/personal.php?mensaje=success');
    } else {

        $statement = $conexion->prepare("UPDATE usuarios SET nombre_usuario='$nombre', login_usuario='$login', correo_usuario='$correo', frase_usuario='$frase', sobremi_usuario='$sobremi' WHERE login_usuario = '$login_usuario'");

        $statement->execute();

        header('Location: ' . RUTA . '/model/personal/personal.php?mensaje=success');
    }
}

require "../../views/header.php";
require '../../views/personal/editar-perfil.view.php';
require "../../views/footer.php";
