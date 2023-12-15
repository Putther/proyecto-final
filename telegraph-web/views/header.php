<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA; ?><?php echo ($theme === 'dark') ? '/recursos/css/estilo-dark.css' : '/recursos/css/estilo.css'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <title>Telegraph Web</title>
</head>

<script src="../../recursos/js/jquery-3.7.1.js"></script>
<script src="../../recursos/js/funciones.js"></script>

<body>
    <header>
        <p id="acordeon"><i class="fa fa-bars fa-xl"></i></p>
        <nav id="menu-acordeon">
            <nav class="menu">
                <ul>
                    <li>
                        <a href="../dire-straits/biografia.php">Historia de Dire Straits</a>
                    </li>
                    <li>
                        <a href="../galeria/galeria.php">Galería</a>
                    </li>
                    <li>
                        <a href="../test-geordie/test.php">Test Geordie</a>
                    </li>
                    <li>
                        <a href="../acerca-de/info.php">Acerca de Telegraph Web</a>
                    </li>
                </ul>
            </nav>
            <ul class="menu nav">
                <?php if ($_SESSION['usuario'] != "invitado") { ?>
                    <li>
                        <a href="#"><?php echo $_SESSION['frase'] ?>, <?php echo $_SESSION['usuario'] ?>!</a>
                        <ul>
                            <li>
                                <a style="margin-left: -100px" href="../personal/personal.php">Página personal</a>
                            </li>
                            <li>
                                <a href="<?php echo RUTA . "/model/principal/nuevo-post.php"; ?>">Nuevo post</a>
                            </li>
                            <li>
                                <a href="<?php echo RUTA . "/model/general/cerrar-sesion.php"; ?>">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                    <p class="separacion"></p>
                <?php } else { ?>
                    <li>
                        <a href="#">Modo invitado</a>
                        <ul>
                            <li>
                                <a href="<?php echo RUTA . "/model/general/cerrar-sesion.php"; ?>">Salir de modo invitado</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="contenedor-header">
            <div class="izquierda">
                <nav class="menu">
                    <ul>
                        <li>
                            <a href="../dire-straits/biografia.php">Historia de Dire Straits</a>
                        </li>
                        <li>
                            <a href="../galeria/galeria.php">Galería</a>
                        </li>
                        <li>
                            <a href="../test-geordie/test.php">Test Geordie</a>
                        </li>
                        <li>
                            <a href="../acerca-de/info.php">Acerca de Telegraph Web</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="derecha">
                <ul class="menu nav">
                    <?php if ($_SESSION['usuario'] != "invitado") { ?>
                        <li>
                            <a href="#"><?php echo $_SESSION['frase'] ?>, <?php echo $_SESSION['usuario'] ?>!</a>
                            <ul>
                                <li>
                                    <a style="margin-left: -100px" href="../personal/personal.php">Página personal</a>
                                </li>
                                <li>
                                    <a href="<?php echo RUTA . "/model/principal/nuevo-post.php"; ?>">Nuevo post</a>
                                </li>
                                <li>
                                    <a href="<?php echo RUTA . "/model/general/cerrar-sesion.php"; ?>">Cerrar sesión</a>
                                </li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="#">Modo invitado</a>
                            <ul>
                                <li>
                                    <a href="<?php echo RUTA . "/model/general/cerrar-sesion.php"; ?>">Salir de modo invitado</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="contenedor">
                <div class="logo">
                    <p><a href="<?php echo RUTA . "/model/principal/principal.php"; ?>"><img src="../../recursos/imagenes/recursos/logo-light.png" width="35%"></a></p>
                </div>
            </div>
        </div>
    </header>

    <script>
        const botonAcordeon = document.getElementById('acordeon');
        const acordeon = document.getElementById('menu-acordeon');

        botonAcordeon.addEventListener('click', function() {
            if (acordeon.style.display == 'block') {
                acordeon.style.display = 'none';
                this.querySelector('i').classList.remove('fa-chevron-up');
                this.querySelector('i').classList.add('fa-bars');
            } else {
                acordeon.style.display = 'block';
                this.querySelector('i').classList.remove('fa-bars');
                this.querySelector('i').classList.add('fa-chevron-up');
            }
        });
    </script>