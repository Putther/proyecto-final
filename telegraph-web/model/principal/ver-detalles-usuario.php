<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
}

$login_usuario = $_SESSION["usuario"];
$id_usuario = $_GET["id"];

$statement = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
$statement->execute();
$usuario = $statement->fetch(PDO::FETCH_ASSOC);

require "../../views/header.php";
require '../../views/principal/ver-detalles-usuario.view.php';
require "../../views/footer.php";

?>