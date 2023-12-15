<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);
$noResultados = false;

if (!$conexion) {
    header('Location: ../general/error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    $busqueda = limpiarDatos($_GET['busqueda']);

    $statement = $conexion->prepare('SELECT * FROM comunidad INNER JOIN usuarios ON comunidad.id_usuario=usuarios.id_usuario WHERE titulo_post LIKE :busqueda OR titulo_post LIKE :busqueda');

    $statement->execute(array(':busqueda' => "%$busqueda%"));
    $resultado = $statement->fetchAll();

    if (empty($resultado)) {
        $titulo = 'No se encontraron artículos con la búsqueda: ' . $busqueda;
        $noResultados = true;
    } else {
        $titulo = 'Resultados de la búsqueda: ' . $busqueda;
    }
} else {
    header('Location: ' . RUTA . '/model/principal/principal.php');
}

require "../../views/header.php";
require '../../views/principal/buscar.view.php';
require "../../views/footer.php";

?>