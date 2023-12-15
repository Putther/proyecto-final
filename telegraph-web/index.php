<?php session_start();

require 'recursos/funciones.php';
require 'recursos/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $frase = fraseHeader();
    $errores = "";

    $conexion = conexion($bd_config);

    if (!$conexion) {
        header('Location: general/error.php');
    }

    $statement = $conexion->prepare("SELECT tipo_usuario FROM usuarios WHERE login_usuario = '$usuario'");
    $statement->execute();
    $usuarioLogin = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($usuarioLogin['tipo_usuario']) && $usuarioLogin['tipo_usuario'] == 'admin') {
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE login_usuario = :usuario AND pass_usuario = :pass'); //Comprobar si el usuario y contraseña existen
        $statement->execute(array(
            ':usuario' => $usuario,
            ':pass' => $password
        ));

        $resultado = $statement->fetch();
        if ($resultado) {
            $_SESSION['admin'] = $usuario;
            header('Location:' . RUTA . '/admin/model/index.php');
        } else {
            $errores = "El usuario o contraseña introducido/a es incorrecto/a ";
        }
    } else {
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE login_usuario = :usuario AND pass_usuario = :pass'); //Comprobar si el usuario y contraseña existen
        $statement->execute(array(
            ':usuario' => $usuario,
            ':pass' => $password
        ));

        $resultado = $statement->fetch();
        if ($resultado) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['frase'] = $frase;

            $cookie = json_encode(array(
                "usuario" => $_SESSION["usuario"],
                "frase" => $_SESSION["frase"]
            ));

            setcookie('cookie_sesion', $cookie, time() + (86400 * 30), "/");
            header('Location: ' . RUTA . '/model/principal/principal.php');
        } else {
            $errores = "El usuario o contraseña introducido/a es incorrecto/a ";
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST'  && !isset($_POST['usuario']) && !isset($_POST['password'])) {
    $_SESSION['usuario'] = "invitado";
    header('Location: ' . RUTA . '/model/principal/principal.php');
}

require "views/header-login.php";
require "views/index.view.php";
