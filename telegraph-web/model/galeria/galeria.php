<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$login_usuario = $_SESSION["usuario"];
$conexion = conexion($bd_config);

$datos = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$datos->execute();
$datos_formulario = $datos->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['eliminar-imagen'])) {
    $id_imagen = $_POST["id_imagen"];
    $ruta_imagen = $_POST["ruta_imagen"];

    if (file_exists("../recursos/imagenes/galeria/" . $ruta_imagen)) {
        unlink("../recursos/imagenes/galeria/" . $ruta_imagen);
    }

    $eliminarImagen = $conexion->prepare("DELETE FROM galeria WHERE id_galeria = $id_imagen");
    $eliminarImagen->execute();

    header('Location: ' . RUTA . '/model/galeria/galeria.php?mensaje=success_borrar');
}


$imagenes_por_pagina = 8;
$pagina_actual = 0;
$inicio = 0;

if (isset($_GET['p'])) {
    $pagina_actual = (int)$_GET['p'];
} else {
    $pagina_actual = 1;
}

if ($pagina_actual > 1) {
    $inicio = $pagina_actual * $imagenes_por_pagina - $imagenes_por_pagina;
} else {
    $inicio = 0;
}

$conexion = conexion($bd_config);

if (!$conexion) {
    die();
}

$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM galeria ORDER BY id_galeria DESC LIMIT $inicio, $imagenes_por_pagina");
$statement->execute();
$imagenes = $statement->fetchAll();

if (!$imagenes) {
    header('Location: ../principal/principal.php');
}

$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];

$total_paginas = ceil($total_post / $imagenes_por_pagina);

require "../../views/header.php";
require '../../views/galeria/galeria.view.php';
require "../../views/footer.php";
