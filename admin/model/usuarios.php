<?php 
require '../views/header-admin.php';

$conexion = conexion($bd_config);

comprobarSesion();

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$administradores = $conexion->prepare("SELECT * FROM usuarios WHERE tipo_usuario = 'usuario'");
$administradores->execute();

if (isset($_POST['eliminar_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $eliminaUsuario = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = $id_usuario");
    $eliminaUsuario->execute();

    header('Location: ' . RUTA . '/admin/model/usuarios.php?mensaje=success');
}

require '../views/admin-usuarios.view.php';

?>