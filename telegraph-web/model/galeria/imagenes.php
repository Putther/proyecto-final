<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    die();
}

$id = 0;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    $id = false;
}

if (!$id) {
    header ('Location: principal.php');
}

$statement = $conexion->prepare('SELECT * FROM galeria WHERE id_galeria = :id');
$statement->execute(array(':id' => $id));

$imagen = $statement->fetch();

if (!$imagen) {
    header('Location: principal.php');
}

require "../../views/header.php";
require '../../views/galeria/imagenes.view.php';


?>