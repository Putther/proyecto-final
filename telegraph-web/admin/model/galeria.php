<?php

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$galeria = $conexion->prepare("SELECT * FROM galeria INNER JOIN usuarios ON galeria.id_usuario=usuarios.id_usuario");
$galeria->execute();

if (isset($_POST['eliminar_imagen'])) {
    $id_imagen = $_POST['id_galeria'];

    $eliminaImagen = $conexion->prepare("DELETE FROM galeria WHERE id_galeria = $id_imagen");
    $eliminaImagen->execute();

    header('Location: ' . RUTA . '/admin/model/galeria.php?mensaje=success');
}

require '../views/admin-galeria.view.php';

?>