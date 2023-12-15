<?php 

require '../views/header-admin.php';

$conexion = conexion($bd_config);

//Comprobar conexión
if (!$conexion) {
    header('Location: ../../model/general/error.php');
}

$preguntas = $conexion->prepare("SELECT * FROM test ORDER BY id DESC");
$preguntas->execute();

if (isset($_POST['nueva_pregunta'])) {
    $dificultad = $_POST['dificultad'];
    $enunciado = $_POST['enunciado'];
    $resp1 = $_POST['resp1'];
    $resp2 = $_POST['resp2'];
    $resp3 = $_POST['resp3'];
    $resp4 = $_POST['resp4'];
    $resp_correcta = $_POST['respcorrecta'];
    $info = $_POST['info'];

    $nuevoAdmin = $conexion->prepare("INSERT INTO test (id, enunciado, respuesta_1, respuesta_2, respuesta_3, respuesta_4, respuesta_correcta, info, dificultad)  VALUES (null, :enunciado, :resp1, :resp2, :resp3, :resp4, :respcorrecta, :info, :dificultad)");
    $nuevoAdmin->execute(array(
        ':enunciado' => $enunciado,
        ':resp1' => $resp1,
        ':resp2' => $resp2,
        ':resp3' => $resp3,
        ':resp4' => $resp4,
        ':respcorrecta' => $resp_correcta,
        ':info' => $info,
        ':dificultad' => $dificultad,
    ));

    header('Location: ' . RUTA . '/admin/model/preguntas.php?mensaje=success');
}

if (isset($_POST['modificar_pregunta'])) {
    $id_pregunta = $_POST['id_pregunta'];
    $dificultad = $_POST['dificultad'];
    $enunciado = $_POST['enunciado'];
    $resp1 = $_POST['resp1'];
    $resp2 = $_POST['resp2'];
    $resp3 = $_POST['resp3'];
    $resp4 = $_POST['resp4'];
    $resp_correcta = $_POST['respcorrecta'];
    $info = $_POST['info'];

    $modificaPregunta = $conexion->prepare("UPDATE test SET dificultad = '$dificultad', enunciado = '$enunciado', respuesta_1 = '$resp1', respuesta_2 = '$resp2', respuesta_3 = '$resp3', respuesta_4 = '$resp4', respuesta_correcta = '$resp_correcta', info = '$info', dificultad = '$dificultad' WHERE id = $id_pregunta");
    $modificaPregunta->execute();

    header('Location: ' . RUTA . '/admin/model/preguntas.php?mensaje=success_modificar');
}

if (isset($_POST['eliminar_pregunta'])) {
    $id_pregunta = $_POST['id_pregunta'];

    $eliminaPregunta = $conexion->prepare("DELETE FROM test WHERE id = $id_pregunta");
    $eliminaPregunta->execute();

    header('Location: ' . RUTA . '/admin/model/preguntas.php?mensaje=success_borrar');
}

require '../views/admin-preguntas.view.php';

?>