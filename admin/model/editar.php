<?php session_start();

require 'config.php';
require '../funciones.php';

comprobarSesion();

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: /error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);
    $descripcion = limpiarDatos($_POST['descripcion']);
    $texto = $_POST['texto'];
    $id = limpiarDatos($_POST['id']);
    $thumb_guardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];
    
    if (empty($thumb['name'])) {
        $thumb = $thumb_guardada;
    } else {
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
        $thumb = $_FILES['thumb']['name'];
    }

    $statement = $conexion->prepare(
        'UPDATE comunidad SET titulo_post = :titulo, descripcion_post = :descripcion, post = :post, imagen_post = :thumb WHERE id = :id'
    );

    $statement->execute(array(
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':post' => $texto,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . RUTA . '/admin');

} else {
    $id_articulo = obtenerIdArticulo($_GET['id']);

    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/admin');
    }
    $articulo = obtenerArticuloPorId($conexion, $id_articulo);

    if (empty($articulo)) {
        header('Location: ' . RUTA . '/admin');
    }

    $articulo = $articulo[0];
}

require '../views/editar.view.php';

?>