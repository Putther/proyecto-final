<?php 

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$comentarios = $conexion->prepare("SELECT * FROM comentarios INNER JOIN comunidad ON comentarios.id_post=comunidad.id_post INNER JOIN usuarios ON comentarios.id_usuario=usuarios.id_usuario");
$comentarios->execute();

if (isset($_POST['eliminar_comentario'])) {
    $id_usuario = $_POST['id_usuario'];
    $id_comentario = $_POST['id_comentario'];

    $eliminaComentario = $conexion->prepare("DELETE FROM comentarios WHERE id_comentario = $id_comentario");
    $eliminaComentario->execute();

    $quitaComentarioUsuario = $conexion->prepare("UPDATE usuarios SET numero_comentarios_usuario = numero_comentarios_usuario - 1 WHERE id_usuario = $id_usuario");
    $quitaComentarioUsuario->execute();

    header('Location: ' . RUTA . '/admin/model/comentarios.php?mensaje=success');
}

require '../views/admin-comentarios.view.php';

?>