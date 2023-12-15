<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../general/error.php');
}

$login_usuario = $_SESSION["usuario"];
$usuario = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$usuario->execute();
$usuario_resultado = $usuario->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login_usuario'];
    $titulo = limpiarDatos($_POST['titulo']);
    $descripcion = limpiarDatos($_POST['descripcion']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    if ($thumb != "") {

        $archivo_subido = $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

        move_uploaded_file($thumb, $archivo_subido);

        $statement = $conexion->prepare('INSERT INTO comunidad (id_post, id_usuario, titulo_post, descripcion_post, texto_post, imagen_post) 
    VALUES (null, :usuario, :titulo, :descripcion, :texto, :thumb)');

        $statement->execute(array(
            ':usuario' => $login,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':texto' => $texto,
            ':thumb' => $_FILES['thumb']['name'],
        ));

        $incrementaPosts = $conexion->prepare("UPDATE usuarios SET numero_posts_usuario = numero_posts_usuario + 1 WHERE id_usuario = '$login'");
        $incrementaPosts->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php?mensaje=success');
    } else {
        $statement = $conexion->prepare('INSERT INTO comunidad (id_post, id_usuario, titulo_post, descripcion_post, texto_post, imagen_post) 
        VALUES (null, :usuario, :titulo, :descripcion, :texto, :thumb)');

        $statement->execute(array(
            ':usuario' => $login,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':texto' => $texto,
            ':thumb' => 'no-knopfler.png',
        ));

        $incrementaPosts = $conexion->prepare("UPDATE usuarios SET numero_posts_usuario = numero_posts_usuario + 1 WHERE id_usuario = '$login'");
        $incrementaPosts->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php?mensaje=success');
    }
}

require "../../views/header.php";
require '../../views/principal/nuevo-post.view.php';
require "../../views/footer.php";
