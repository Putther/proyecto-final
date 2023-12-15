<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../general/error.php');
}

$id_articulo = $_GET["id"];

$articulo = $conexion->prepare("SELECT * FROM comunidad WHERE id_post = '$id_articulo'");
$articulo->execute();
$articulo_resultado = $articulo->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modificar_post'])) {
    $id_articulo = $_POST["id_post"];
    $titulo = limpiarDatos($_POST['titulo']);
    $descripcion = limpiarDatos($_POST['descripcion']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];
    $fecha_actual = date('Y-m-d H:i:s a', time());
    
    if ($thumb != "") {

        $ruta_imagen = $_POST["ruta_imagen"];

        if ($ruta_imagen != "no-knopfler.png") {
            if (file_exists("../../recursos/imagenes/comunidad/" . $ruta_imagen)) {
                unlink("../../recursos/imagenes/comunidad/" . $ruta_imagen);
            }
        }

        $archivo_subido = $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

        move_uploaded_file($thumb, $archivo_subido);

        $statement = $conexion->prepare("UPDATE comunidad SET titulo_post='$titulo', descripcion_post='$descripcion', texto_post='$texto', fecha_post_editado='$fecha_actual', imagen_post='" . $_FILES['thumb']['name'] . "' WHERE id_post = '$id_articulo'");

        $statement->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php?mensaje=success_modificar');
    } else {

        $statement = $conexion->prepare("UPDATE comunidad SET titulo_post='$titulo', descripcion_post='$descripcion', texto_post='$texto', fecha_post_editado='$fecha_actual' WHERE id_post = '$id_articulo'");

        $statement->execute();

        header('Location: ' . RUTA . '/model/principal/principal.php?mensaje=success_modificar');
    }
}

require "../../views/header.php";
require '../../views/principal/modificar-post.view.php';
require "../../views/footer.php";