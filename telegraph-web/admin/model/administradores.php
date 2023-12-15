<?php 

require '../views/header-admin.php';

$conexion = conexion($bd_config);


//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/error.php');
}

$administradores = $conexion->prepare("SELECT * FROM usuarios WHERE tipo_usuario = 'admin'");
$administradores->execute();

if (isset($_POST['nuevo_admin'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $nuevoAdmin = $conexion->prepare("INSERT INTO usuarios (id_usuario, login_usuario, pass_usuario, tipo_usuario)  VALUES (null, :loginUsuario, :pass, :tipo)");
    $nuevoAdmin->execute(array(
        ':loginUsuario' => $login,
        ':pass' => $pass,
        ':tipo' => 'admin',
    ));

    header('Location: ' . RUTA . '/admin/model/administradores.php?mensaje=success');
}

if (isset($_POST['modificar_admin'])) {
    $id_usuario = $_POST['id_usuario'];
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $modificaAdmin = $conexion->prepare("UPDATE usuarios SET login_usuario = '$login', pass_usuario = '$pass' WHERE id_usuario = $id_usuario");
    $modificaAdmin->execute();

    header('Location: ' . RUTA . '/admin/model/administradores.php?mensaje=success_modificar');
}

if (isset($_POST['eliminar_admin'])) {
    $id_usuario = $_POST['id_usuario'];

    $eliminaAdmin = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = $id_usuario");
    $eliminaAdmin->execute();

    header('Location: ' . RUTA . '/admin/model/administradores.php?mensaje=success_borrar');
}

require '../views/admin-administradores.view.php';

?>