<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);
$noResultados = false;

$usuario = $_GET['usuario'];

$statement = $conexion->prepare("SELECT * FROM comunidad INNER JOIN usuarios ON FIND_IN_SET(comunidad.id_post, usuarios.favoritos_usuario) > 0 AND usuarios.login_usuario = '$usuario'");

$statement->execute();
$resultado = $statement->fetchAll();

if (empty($resultado)) {
    $titulo = 'No tienes posts favoritos';
    $noResultados = true;
} else {
    $titulo = 'Tus posts favoritos: ';
}

require "../../views/header.php";
require '../../views/personal/favoritos.view.php';
require "../../views/footer.php";
