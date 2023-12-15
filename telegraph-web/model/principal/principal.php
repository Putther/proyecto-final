<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../general/error.php');
}

$articulos = obtenerArticulos($blog_config["articulos_por_pagina"], $conexion);

if (!$articulos) {
    header('Location: ../general/error.php');
}

//Dar upvote o favoritos

$login_usuario = $_SESSION["usuario"];

if (isset($_POST['action']) && $_POST['action'] == 'like') {
    $id_post = $_POST["id_post"];

    $comprobarUpvote = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario' AND upvotes_usuario LIKE '%$id_post,%'");
    $comprobarUpvote->execute();
    $tieneUpvote = $comprobarUpvote->rowCount();

    // Si la query no obtiene resultados, el usuario aún no le ha dado upvote al post seleccionado

    if ($tieneUpvote == 0) {

        // Registrar voto en el post

        $upvote = $conexion->prepare("UPDATE comunidad SET upvotes_post = upvotes_post + 1 WHERE id_post = '$id_post'");
        $upvote->execute();

        // Registrar voto al usuario

        $upvoteUsuario = $conexion->prepare("UPDATE usuarios SET upvotes_usuario = CONCAT(upvotes_usuario, '$id_post,') WHERE login_usuario = '$login_usuario'");
        $upvoteUsuario->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php');

        // Si por el contrario ya le ha dado un upvote, se quitará dicho upvote tanto del usuario como del post

    } else {
        $upvote = $conexion->prepare("UPDATE comunidad SET upvotes_post = upvotes_post - 1 WHERE id_post = '$id_post'");
        $upvote->execute();

        $upvoteUsuario = $conexion->prepare("UPDATE usuarios SET upvotes_usuario = REPLACE(upvotes_usuario, '$id_post,', '') WHERE login_usuario = '$login_usuario'");
        $upvoteUsuario->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php');
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'fav') {
    $id_post = $_POST["id_post"];

    $comprobarFavorito = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario' AND favoritos_usuario LIKE '%$id_post,%'");
    $comprobarFavorito->execute();
    $tieneFavorito = $comprobarFavorito->rowCount();

    // Si la query no obtiene resultados, el usuario aún no le ha dado favorito al post seleccionado

    if ($tieneFavorito == 0) {

        // Registrar favorito en el post

        $upvote = $conexion->prepare("UPDATE comunidad SET favoritos_post = favoritos_post + 1 WHERE id_post = '$id_post'");
        $upvote->execute();

        // Registrar favorito al usuario

        $upvoteUsuario = $conexion->prepare("UPDATE usuarios SET numero_favoritos_usuario = numero_favoritos_usuario + 1, favoritos_usuario = CONCAT(favoritos_usuario, '$id_post,') WHERE login_usuario = '$login_usuario'");
        $upvoteUsuario->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php');

        // Si por el contrario ya le ha dado a favoritos, se quitará dicho upvote tanto del usuario como del post

    } else {
        $upvote = $conexion->prepare("UPDATE comunidad SET favoritos_post = favoritos_post - 1 WHERE id_post = '$id_post'");
        $upvote->execute();

        $upvoteUsuario = $conexion->prepare("UPDATE usuarios SET numero_favoritos_usuario = numero_favoritos_usuario - 1, favoritos_usuario = REPLACE(favoritos_usuario, '$id_post,', '') WHERE login_usuario = '$login_usuario'");
        $upvoteUsuario->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php');
    }
}

if (isset($_POST['eliminar_post'])) {
    $id_post = $_POST['id_post'];
    $ruta_imagen = $_POST["ruta_imagen"];

    if ($ruta_imagen != "no-knopfler.png") {
        if (file_exists("../../recursos/imagenes/comunidad/" . $ruta_imagen)) {
            unlink("../../recursos/imagenes/comunidad/" . $ruta_imagen);
        }
    }

    $eliminarPost = $conexion->prepare("DELETE FROM comunidad WHERE id_post = $id_post");
    $eliminarPost->execute();

    $quitarPostUsuario = $conexion->prepare("UPDATE usuarios SET numero_posts_usuario = numero_posts_usuario - 1 WHERE login_usuario = '$login_usuario'");
    $quitarPostUsuario->execute();

    $quitarUpvotes = $conexion->prepare("UPDATE usuarios SET upvotes_usuario = REPLACE(upvotes_usuario, '$id_post,', '') WHERE upvotes_usuario LIKE '%" . $id_post . ",%'");
    $quitarUpvotes->execute();

    $quitarFavoritosCantidad = $conexion->prepare("UPDATE usuarios SET numero_favoritos_usuario = numero_favoritos_usuario - 1 WHERE favoritos_usuario LIKE '%" . $id_post . ",%'");
    $quitarFavoritosCantidad->execute();

    $quitarFavoritos = $conexion->prepare("UPDATE usuarios SET favoritos_usuario = REPLACE(favoritos_usuario, '$id_post,', '') WHERE favoritos_usuario LIKE '%" . $id_post . ",%'");
    $quitarFavoritos->execute();

    header('Location: ' . RUTA . '/model/principal/principal.php?mensaje=success_borrar');
}

require "../../views/header.php";
require "../../views/principal/principal.view.php";
require "paginacion.php";
require "../../views/footer.php";
