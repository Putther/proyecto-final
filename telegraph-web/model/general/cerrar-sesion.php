<?php session_start();

require '../../recursos/config.php';

session_destroy();
$_SESSION = array();
setcookie('cookie_sesion', '', time() - 3600, '/');

header('Location: ' . RUTA . '/index.php');
die();

?>