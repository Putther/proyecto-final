<?php

function conexion($bd_config)
{
  try {
    $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['base_de_datos'], $bd_config['usuario'], $bd_config['pass']);
    return $conexion;
  } catch (PDOException $e) {
    return false;
  }
}

function limpiarDatos($datos)
{
  $datos = trim($datos); //Quita los espacios sobrantes
  $datos = stripslashes($datos); //Quitar las barras e impide la inyección de código
  $datos = htmlspecialchars($datos);
  return $datos;
}


function paginaActual()
{
  if (isset($_GET['p'])) {
    return (int)$_GET['p'];
  } else {
    return 1;
  }
}

function numeroPaginas($articulos_por_pagina, $conexion)
{
  $total_articulo = $conexion->prepare('SELECT COUNT(id_post) as total FROM comunidad');
  $total_articulo->execute();
  $total_articulo = $total_articulo->fetch()['total'];

  $numero_paginas = ceil($total_articulo / $articulos_por_pagina);
  return $numero_paginas;
}

function obtenerArticulos($articulos_por_pagina, $conexion)
{
  if (paginaActual() > 0) {
    $inicio = paginaActual() * $articulos_por_pagina - $articulos_por_pagina;
    $statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS comunidad.id_post AS id_principal, comunidad.id_usuario, comunidad.titulo_post, comunidad.descripcion_post, comunidad.fecha_post, comunidad.fecha_post_editado, comunidad.imagen_post, comunidad.upvotes_post, comunidad.favoritos_post, usuarios.login_usuario, usuarios.imagen_usuario, COUNT(comentarios.id_comentario) AS total_comentarios FROM comunidad INNER JOIN usuarios ON comunidad.id_usuario=usuarios.id_usuario LEFT JOIN comentarios ON comunidad.id_post=comentarios.id_post GROUP BY comunidad.id_post ORDER BY fecha_post DESC LIMIT $inicio, $articulos_por_pagina");
    $statement->execute();
    return $statement->fetchAll();
  } else {
    $inicio = 0;
  }
}

function obtenerIdArticulo($id)
{
  return (int)limpiarDatos($id);
}

function obtenerArticuloPorId($conexion, $id)
{
  $resultado = $conexion->query("SELECT * FROM comunidad WHERE id_post = $id");
  $resultado = $resultado->fetchAll();
  if ($resultado) {
    return $resultado;
  } else {
    return false;
  }
}

function fecha($fecha)
{
  $timestamp = strtotime($fecha);
  $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

  $dia = date('d', $timestamp);
  $mes = date('m', $timestamp) - 1;
  $year = date('Y', $timestamp);

  $fecha = "$dia de " . $meses[$mes] . " del $year";
  return $fecha;
}

function comprobarSesion()
{
  if (!isset($_SESSION['admin'])) {
    header('Location: ' . RUTA);
  }
}

function comprobarSesionUsuario()
{
  if (!isset($_SESSION['usuario'])) {
    header('Location: ' . RUTA);
  }
}

function fraseHeader()
{
  $frases = array("On the bass", "On guitar", "On the saxophone", "Flute and saxophone", "On the keyboard", "On the drums", "On percussion", "On the pedal steel guitar");
  $fraseAleatoria = $frases[rand(0, count($frases) - 1)];
  return $fraseAleatoria;
}

function imprimeSidebar()
{
  print("<html>
  <head>
 
  </head>
  <body><div class=\"area\"></div><nav class=\"main-menu\">
            <ul>
                <li>
                    <a class=\"main-menu-index\" href=\"index.php\">
                        <i class=\"fa fa-solid fa-flag\"></i>
                        <span class=\"nav-text\">
                           Reportes
                        </span>
                    </a>
                  
                </li>
                <li class=\"has-subnav\">
                    <a class=\"main-menu-administradores\" href=\"administradores.php\">
                        <i class=\"fa fa-solid fa-key\"></i>
                        <span class=\"nav-text\">
                            Administradores
                        </span>
                    </a>
                    
                </li>
                <li class=\"has-subnav\">
                    <a class=\"main-menu-usuarios\" href=\"usuarios.php\">
                       <i class=\"fa fa-solid fa-users\"></i>
                        <span class=\"nav-text\">
                            Usuarios
                        </span>
                    </a>
                    
                </li>
                <li class=\"has-subnav\">
                    <a class=\"main-menu-comunidad\" data-bs-toggle=\"collapse\" data-bs-target=\"#menu_item1\" href=\"#\">
                       <i class=\"fa fa-home\"></i>
                       <span class=\"nav-text\">
                       Comunidad
                       <ul id=\"menu_item1\" class=\"submenu collapse\" data-bs-parent=\"#nav_accordion\">
                       <li>
                    <a class=\"submenu main-menu-publi\" href=\"publicaciones.php\">
                        <i class=\"fa fa-solid fa-newspaper-o\"></i>
                        <span class=\"nav-text\">
                           Publicaciones
                        </span>
                    </a>
                  
                </li>
                <li class=\"has-subnav\">
                    <a class=\"submenu main-menu-comentarios\" href=\"comentarios.php\">
                        <i class=\"fa fa-solid fa-comment\"></i>
                        <span class=\"nav-text\">
                            Comentarios
                        </span>
                    </a>
                    
                </li>
                     </ul>
                   </span>
                    </a>
                   
                </li>
                <li>
                    <a class=\"main-menu-galeria\" href=\"galeria.php\">
                        <i class=\"fa fa-solid fa-image\"></i>
                        <span class=\"nav-text\">
                            Galería
                        </span>
                    </a>
                </li>
                <li>
                    <a class=\"main-menu-test\" data-bs-toggle=\"collapse\" data-bs-target=\"#menu_item2\" href=\"#\">
                    <i class=\"fa fa-clipboard\"></i>
                        <span class=\"nav-text\">
                           Test
                           <ul id=\"menu_item2\" class=\"submenu collapse\" data-bs-parent=\"#nav_accordion\">
                       <li>
                    <a class=\"submenu main-menu-preguntas\" href=\"preguntas.php\">
                        <i class=\"fa fa-solid fa-pencil\"></i>
                        <span class=\"nav-text\">
                           Preguntas
                        </span>
                    </a>
                  
                </li>
                <li class=\"has-subnav\">
                    <a class=\"submenu main-menu-puntuaciones\" href=\"puntuaciones.php\">
                        <i class=\"fa fa-solid fa-list\"></i>
                        <span class=\"nav-text\">
                            Puntuaciones
                        </span>
                    </a>
                    
                </li>
                     </ul>
                        </span>
                    </a>
                </li>
            </ul>

            <ul class=\"logout\">
                <li>
                   <a href=\"cerrar-sesion.php\">
                         <i class=\"fa fa-power-off fa-2x\"></i>
                        <span class=\"nav-text\">
                            Cerrar sesión
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
  </body>
    </html>");
}
