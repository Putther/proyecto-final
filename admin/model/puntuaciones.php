<?php 

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$puntuaciones = $conexion->prepare("SELECT * FROM puntuaciones");
$puntuaciones->execute();

if (isset($_POST['eliminar_puntuacion'])) {
    $id_puntuacion = $_POST['id_puntuacion'];

    $eliminaPuntuacion = $conexion->prepare("DELETE FROM puntuaciones WHERE id_puntuacion = $id_puntuacion");
    $eliminaPuntuacion->execute();

    header('Location: ' . RUTA . '/admin/model/puntuaciones.php?mensaje=success');
}

require '../views/admin-puntuaciones.view.php';

?>