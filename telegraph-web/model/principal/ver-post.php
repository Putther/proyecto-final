<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

$login_usuario = $_SESSION["usuario"];

$datos = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$datos->execute();
$datos_formulario = $datos->fetch(PDO::FETCH_ASSOC);

// Hacer un comentario en un post

if (isset($_POST['crear_comentario'])) {

    $comentario_texto = limpiarDatos($_POST['comentario_texto']);
    $id_post = $_POST['id_post'];

    $statement = $conexion->prepare('INSERT INTO comentarios (id_comentario, id_post, id_usuario, texto_comentario, fecha_comentario) 
    VALUES (null, :post, :usuario, :texto, null)');

    $statement->execute(array(
        ':post' => $id_post,
        ':usuario' => $datos_formulario['id_usuario'],
        ':texto' => $comentario_texto
    ));

    $incrementaComentarios = $conexion->prepare("UPDATE usuarios SET numero_comentarios_usuario = numero_comentarios_usuario + 1 WHERE id_usuario = '" . $datos_formulario['id_usuario'] . "'");
    $incrementaComentarios->execute();

    header('Location: ' . RUTA . '/model/principal/ver-post.php?id=' . $id_post . '&mensaje=success');
    die();
}

// Borrar un comentario en un post

if (isset($_POST['borrar_comentario'])) {
    $id_comentario = $_POST["id_comentario"];
    $id_post = $_POST['id_post'];

    $statement = $conexion->prepare("DELETE FROM comentarios WHERE id_comentario = '$id_comentario'");
    $statement->execute();

    $disminuyeComentarios = $conexion->prepare("UPDATE usuarios SET numero_comentarios_usuario = numero_comentarios_usuario - 1 WHERE id_usuario = '" . $datos_formulario['id_usuario'] . "'");
    $disminuyeComentarios->execute();

    header('Location: ' . RUTA . '/model/principal/ver-post.php?id=' . $id_post . '&mensaje=success_borrar');
    die();
}

// Modificar un comentario en un post

if (isset($_POST['modificar_comentario'])) {
    $comentario_texto = $_POST["comentario_texto_modificado"];
    $id_comentario = $_POST["id_comentario"];
    $id_post = $_POST['id_post'];
    $fecha_actual = date('Y-m-d H:i:s a', time());

    $statement = $conexion->prepare("UPDATE comentarios SET texto_comentario = '$comentario_texto', fecha_comentario_editado = '$fecha_actual' WHERE id_comentario = '$id_comentario'");
    $statement->execute();

    header('Location: ' . RUTA . '/model/principal/ver-post.php?id=' . $id_post . '&mensaje=success_modificar');
    die();
}

$id_post = obtenerIdArticulo($_GET['id']);

if (!$conexion) {
    header('Location: error.php');
}

if (empty($id_post)) {
    header('Location: /model/principal/principal.php');
}

$articulo = obtenerArticuloPorId($conexion, $id_post);


$articulo = $articulo[0];

$comentarios = $conexion->prepare("SELECT * FROM comentarios INNER JOIN comunidad ON comentarios.id_post=comunidad.id_post INNER JOIN usuarios ON comentarios.id_usuario=usuarios.id_usuario WHERE comentarios.id_post = $id_post ORDER BY fecha_comentario DESC");
$comentarios->execute();
$comentarios_resultado = $comentarios->fetchAll();

require "../../views/header.php";
require '../../views/principal/ver-post.view.php';
require "../../views/footer.php";
