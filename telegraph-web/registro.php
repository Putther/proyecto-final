<?php session_start(); //session_start() indispensable para trabajar con sesiones

require 'recursos/funciones.php';
require 'recursos/config.php';

if (isset($_SESSION['usuario'])) { //Si ya hay una sesión previamente iniciada, redirige al index
    header('Location: model/principal/principal.php');
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Cuando enviamos los datos desde el view, se inicia esta instrucción
    $usuario = filter_var(strtolower($_POST['usuario']));
    $nombre = $_POST['nombre_usuario'];
    $correo = filter_var(strtolower($_POST['correo']));
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

    if (empty($usuario) or empty($password) or empty($password2)) { //Si alguno de los datos están vacíos dará error
        $errores = '<li>Por favor, rellena todos los datos correctamente</li>';
    } else { //De lo contrario intentará conectarse a la base de datos que se especifique
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=proyecto_final', 'root', '');
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE login_usuario = :usuario LIMIT 1'); //Comprobar si el usuario existe
        $statement->execute(array(':usuario' => $usuario));

        $resultado = $statement->fetch();

        if ($resultado != false) { //Si el usuario ya existe dará error
            $errores .= '<li>El login de usuario introducido ya existe</li>';
        }

        if ($password != $password2) { //Si las dos contraseñas no coinciden dará error
            $errores .= "<li>Las contraseñas no coinciden</li>";
        }
    }

    if ($errores == '') { //Si no hay ningún error, se añadirán los datos a una nueva tabla en la base de datos
        $statement = $conexion->prepare('INSERT INTO usuarios (id_usuario, nombre_usuario, login_usuario, correo_usuario, pass_usuario, tipo_usuario) VALUES (null, :nombre, :usuario, :correo, :pass, :tipo)'); //Aunque no ponga "password" no pasa nada. Es solo para evitar la palabra reservada
        $statement->execute(array(
            ':nombre' => $nombre,
            ':usuario' => $usuario,
            ':correo' => $correo,
            ':pass' => $password,
            ':tipo' => "usuario"
        ));

        header('Location: index.php?mensaje=success');
    }
}

require "views/header-login.php";
require "views/registro.view.php";
