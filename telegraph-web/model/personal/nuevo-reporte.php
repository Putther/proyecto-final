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
    $categoria = $_POST['categoria'];
    $texto = $_POST['texto'];

    $statement = $conexion->prepare('INSERT INTO reportes (id_reporte, id_usuario, categoria_reporte, contenido_reporte) 
    VALUES (null, :usuario, :categoria, :texto)');

    $statement->execute(array(
        ':usuario' => $login,
        ':categoria' => $categoria,
        ':texto' => $texto,
    ));

    header('Location: ' . RUTA . '/model/personal/personal.php?mensaje=success_reporte');
}

require "../../views/header.php";
require '../../views/personal/nuevo-reporte.view.php';
require "../../views/footer.php";