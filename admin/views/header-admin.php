<?php session_start();

require '../../recursos/config.php';
require '../../recursos/funciones.php';
include_once "../../recursos/funciones.php";

comprobarSesion();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/recursos/css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../recursos/css/bootstrap.min.css">
    <script src="../../recursos/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../../recursos/js/funciones.js"></script>
    <title>Telegraph Web - Panel de control</title>
</head>

<body>
    <header>
        <div class="derecha">
            <div class="logo">
                <p>PANEL DE CONTROL</p>
            </div>
        </div>

        <div class="contenedor">
            <div class="logo">
                <p><a href="<?php echo RUTA . "/admin/model/index.php"; ?>"><img src="../../recursos/imagenes/recursos/logo-light.png" width="35%"></a></p>
            </div>
        </div>
    </header>