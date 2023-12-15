<?php

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
}


$statement1 = $conexion->prepare("SELECT * FROM test WHERE dificultad = 'facil' ORDER BY RAND() LIMIT 5");
$statement1->execute();
$preguntas1 = $statement1->fetchAll();

$statement2 = $conexion->prepare("SELECT * FROM test WHERE dificultad = 'medio' ORDER BY RAND() LIMIT 5");
$statement2->execute();
$preguntas2 = $statement2->fetchAll();

$statementFinal = $conexion->prepare("SELECT * FROM test WHERE dificultad = 'dificil' ORDER BY RAND() LIMIT 1");
$statementFinal->execute();
$preguntaFinal = $statementFinal->fetchAll();

$arrayPreguntas = array_merge($preguntas1, $preguntas2, $preguntaFinal);

?>