<?php

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$publicaciones = $conexion->prepare("SELECT * FROM comunidad INNER JOIN usuarios ON comunidad.id_usuario=usuarios.id_usuario");
$publicaciones->execute();

if (isset($_POST['eliminar_publicacion'])) {
    $id_usuario = $_POST['id_usuario'];
    $id_post = $_POST['id_post'];

    $eliminaPublicacion = $conexion->prepare("DELETE FROM comunidad WHERE id_post = $id_post");
    $eliminaPublicacion->execute();

    $quitaPublicacionUsuario = $conexion->prepare("UPDATE usuarios SET numero_posts_usuario = numero_posts_usuario - 1 WHERE id_usuario = $id_usuario");
    $quitaPublicacionUsuario->execute();

    header('Location: ' . RUTA . '/admin/model/publicaciones.php?mensaje=success');
}

require '../views/admin-publicaciones.view.php';

?>