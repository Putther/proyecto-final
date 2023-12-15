<?php

require '../../recursos/funciones.php';
require '../../recursos/config.php';
require '../sesion.php';

$login_usuario = $_SESSION["usuario"];
$conexion = conexion($bd_config);

$datos = $conexion->prepare("SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'");
$datos->execute();
$datos_formulario = $datos->fetch(PDO::FETCH_ASSOC);

if (!$conexion) {
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) { //En la variable $_FILES se van a guardar datos de los archivos en formato array
    $comprobar = @getimagesize($_FILES['foto']['tmp_name']); //@ para que no marque error de tipo NOTICE
    if ($comprobar !== false) {
        $carpeta_destino = '../../recursos/imagenes/galeria/';
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        $statement = $conexion->prepare('INSERT INTO galeria (id_usuario, titulo_galeria, imagen_galeria, texto_galeria) VALUES (:usuario, :titulo, :imagen, :texto)');
        $statement->execute(array(
            ':usuario' => $_POST['id_usuario'],
            ':titulo' => $_POST['titulo'],
            ':imagen' => $_FILES['foto']['name'],
            ':texto' => $_POST['texto']
        ));

        header('Location: galeria.php?mensaje=success');
    } else {
        $error = "El archivo no es una imagen o es demasiado grande";
    }

}

require "../../views/header.php";
require '../../views/galeria/subir.view.php';
require "../../views/footer.php";

?>