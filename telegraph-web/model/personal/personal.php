<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
}

$login_usuario = $_SESSION["usuario"];

$statement = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$statement->execute();
$usuario = $statement->fetch(PDO::FETCH_ASSOC);

require "../../views/header.php";
require '../../views/personal/personal.view.php';
require "../../views/footer.php";

?>