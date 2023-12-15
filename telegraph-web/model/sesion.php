<?php session_start();

if (isset($_COOKIE['cookie_sesion'])) {
    $data = json_decode($_COOKIE['cookie_sesion'], true);

    $_SESSION["usuario"] = $data["usuario"];
    $_SESSION["frase"] = $data["frase"];
}

comprobarSesionUsuario();

//Cambiar de tema en la página personal del usuario

$theme = isset($_COOKIE['siteTheme']) ? $_COOKIE['siteTheme'] : 'light'; // Tema predeterminado: claro
$toggleText = ($theme === 'dark') ? 'Cambiar a tema claro' : 'Cambiar a tema oscuro';
$iconClass = ($theme === 'dark') ? 'fa-sun' : 'fa-moon';

?>