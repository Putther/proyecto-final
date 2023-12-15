<?php 

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../general/error.php');
}

$mejoresPuntuaciones = $conexion->prepare("SELECT * FROM puntuaciones ORDER BY puntuacion_total DESC LIMIT 10");
$mejoresPuntuaciones->execute();

$contadorFilas = 1;

require "../../views/header.php";
require '../../views/test-geordie/tabla-puntuaciones.view.php';

?>