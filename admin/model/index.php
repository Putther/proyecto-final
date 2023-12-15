<?php 

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$reportes = $conexion->prepare("SELECT * FROM reportes INNER JOIN usuarios ON reportes.id_usuario=usuarios.id_usuario");
$reportes->execute();

if (isset($_POST['resolver_reporte'])) {
    $id_reporte = $_POST['id_reporte'];

    $resolver = $conexion->prepare("UPDATE reportes SET estado_reporte = 'Resuelto' WHERE id_reporte = '$id_reporte'");
    $resolver->execute();

    header('Location: ' . RUTA . '/admin/model/index.php?mensaje=success');
}

require '../views/admin-index.view.php';

?>