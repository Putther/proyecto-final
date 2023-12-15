<nav class="menu">
    <ul id="horizontal">
        <li><a href="info.php">Información sobre la web </a></li>
        <i class="fa fa-arrow-right"></i>
        <li><a href="#" class="selected">Manual de uso</a></li><i class="fa fa-arrow-left"></i>
    </ul>
</nav><br>

<div class="contenedor">
    <div class="post">
        <h1 class="titulo-manual">MANUAL DEL USUARIO</h1><br>
        <h2 class="titulo">Aprende las funciones básicas de la web con esta sencilla guía paso a paso<br><br></h2>
        <hr><br>

        <h2 class="titulo">ÍNDICE</h2>
        <p style="font-size: small;"><b>(Pulsa sobre los enlaces para ir directamente)</b></p><br>

        <article class="manual-enlaces">
            <a href="#inicio">
                <p><b>0. Inicio: Login/Registro</b></p>

            </a>
            <a href="#login">
                <p style="margin-left: 10px" ;><b>0.1.</b> Login</p>
            </a>

            <a href="#registro">
                <p style="margin-left: 10px" ;><b>0.2.</b> Registro</p><br>
            </a>

            <a href="#comunidad">
                <p><b>1. Página principal: Comunidad</b></p>

            </a>

            <a href="#header">
                <p style="margin-left: 10px" ;><b>1.1.</b> Header</p>
            </a>

            <a href="#header-usuario">
                <p style="margin-left: 10px" ;><b>1.2.</b> Header > Usuario</p>
            </a>

            <a href="#comunidad-2">
                <p style="margin-left: 10px" ;><b>1.3.</b> Comunidad: Otros</p>
            </a><br>

            <a href="#historia-dire">
                <p><b>2. Historia de Dire Straits</b></p>
            </a>

            <a href="#biografia">
                <p style="margin-left: 10px" ;><b>2.1.</b> Biografía</p>
            </a>

            <a href="#discografia">
                <p style="margin-left: 10px" ;><b>2.2.</b> Discografía</p>
            </a>

            <a href="#integrantes">
                <p style="margin-left: 10px" ;><b>2.3.</b> Integrantes</p>
            </a><br>

            <a href="#galeria">
                <p><b>3. Galería</b></p>
            </a><br>

            <a href="#test">
                <p><b>4. Test Geordie</b></p>
            </a>

            <a href="#test-instrucciones">
                <p style="margin-left: 10px" ;><b>4.1.</b> Test</p>
            </a>

            <a href="#test-puntuaciones">
                <p style="margin-left: 10px" ;><b>4.2.</b> Puntuaciones</p>
            </a><br>

            <a href="#acerca">
                <p><b>5. Acerca de</b></p>
            </a><br>

            <a href="#pagina-personal">
                <p><b>6. Página personal</b></p>
            </a><br>

            <a href="#formularios">
                <p><b>7. Formularios de subida (Comunidad y Galería)</b></p>
            </a><br>

        </article>
        <hr><br><br>

        <article class="manual">

            <p>Telegraph Web se divide en varios apartados con funcionalidades distintas:<br><br></p>

            <h3 id="inicio" class="titulo">0. Inicio: Login/Registro</h3>

            <h3 id="login" class="subtitulo">0.1. Login</h3><br>

            <p>Empezando por el inicio de la web se encuentra el login donde el usuario podrá iniciar sesión rellenando un simple formulario con sus credenciales. Si alguno de los valores está vacío o es incorrecto no se podrá acceder a la página:
            </p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/1.jpg" alt="">
                </p>
            </div>

            <p><b>1. Barra de login:</b> Nombre del login que tenga el usuario. (<b>CUIDADO: No confundir con el nombre real</b>)</p><br>

            <p><b>2. Barra de contraseña:</b> Contraseña del usuario.</p><br>

            <p><b>3. Botón "Iniciar sesión":</b> Una vez se hayan introducido los credenciales ya se podrá acceder a la web. También se puede pulsar la tecla "Enter" en su lugar.</p><br>

            <p><b>4. Botón "Entrar como invitado":</b> Si no se desea ingresar a la página web usando una cuenta, este botón sirve para acceder directamente a la web <b>aunque con ciertas limitaciones</b> como no poder crear posts, comentarios, interactuar con la comunidad, etcétera.

            </p><br>
            <p><b>5. Botón "Regístrate aquí":</b> Si el usuario no dispone de una cuenta y quiere crearla tan solo tiene que pulsar este botón y será redireccionado a un formulario de registro:</p><br>

            <h3 id="registro" class="subtitulo">0.2. Registro</h3><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/2.jpg" alt="">
                </p>
            </div>

            <p>Si no se dispone de una cuenta, se ha de crear una nueva haciendo click en el enlace "Registrate aquí" del login. Dicha acción llevará al usuario a un nuevo formulario para registrarse:
            </p><br>

            <p><b>1. Barra de usuario (login):</b> En este campo hay que introducir el nombre con el que se quiere identificar el usuario dentro de la web tanto para iniciar sesión como para interactuar con el resto de usuarios.</p><br>

            <p><b>2. Barra de nombre:</b> Si el usuario lo desea puede introducir su nombre completo para darse un poco más a conocer. <i>(Este campo es opcional)</i></p><br>

            <p><b>3. Barra de correo electrónico:</b> También se puede introducir un correo electrónico. <i>(Este campo es opcional)</i></p><br>

            <p><b>4. Barra de contraseña:</b> Aquí el usuario debe introducir la contraseña por la cual iniciará sesión dentro de la web. <b>Se recomienda una contraseña segura que utilice caracteres numéricos y alfanuméricos.</b>
            </p><br>

            <p><b>5. Repetir contraseña:</b> Aquí se debe introducir de nuevo la contraseña. En caso de que no coincidan habrá que repetir el proceso.</p><br>

            <p><b>6. Barra de usuario (login):</b> Una vez se hayan rellenado correctamente los datos se creará la cuenta y se redirigirá al login donde el usuario ya podrá iniciar sesión en la web. También se puede pulsar la tecla "Enter" en su lugar.</p><br>

            <p><b>7. Botón "Inicia sesión aquí":</b> Si por el contrario el usuario ya dispone de una cuenta puede pulsar este botón para redirigirse al login y ahí iniciar sesión.</p><br>

            <!--Para completar este apartado se necesita el proyecto final de casa-->

            <h3 id="comunidad" class="titulo">1. Página principal: Comunidad</h3>
            <p>Una vez se haya ingresado en la página desde el formulario, será redirigido a la comunidad, que es la página principal de la web. Aquí se encuentran las publicaciones de la web por orden cronológico del más reciente al más antiguo. Más detalles a continuación:
            </p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/3.jpg" alt="">
                </p>
            </div>

            <p id="header"><b>1.1. Header:</b> Aquí se encuentra la navegación principal de la web, que se divide en varias categorías:</p><br>

            <p style="margin-left: 10px" ;><b>1.1.a. Historia de Dire Straits:</b> Apartado donde el usuario podrá aprender acerca de la biografía, la discografía y los integrantes de la banda a lo largo de su existencia. Todo de forma resumida y accesible para cualquier persona sea fan o no.</p><br>

            <p style="margin-left: 10px" ;><b>1.1.b. Galería:</b> Aquí se encuentra una colección de imágenes aportadas por los usuarios de la comunidad divididas en páginas y todas relacionadas con el mundo del rock.<br><br>

            <p style="margin-left: 10px" ;><b>1.1.c. Test Geordie:</b> En este apartado se puede realizar un test acerca de Dire Straits cuya puntuación sirve para competir amistosamente con el resto de la comunidad. </p><br>

            <p style="margin-left: 10px" ;><b>1.1.d. Acerca de:</b> Información extra acerca de la estructuración de la página web y su uso: </p><br>

            <p id="header-usuario"><b>1.2. Usuario: </b>El usuario que tiene la sesión iniciada actualmente. Si se pasa el cursor por encima del texto se abrirá un menú desplegable con algunas opciones:<br><br>

            <p style="margin-left: 10px" ;><b>*1.2.a. Página personal:</b> Desde aquí se podrán consultar los datos personales del usuario así como algunos datos de la página web. También se pueden modificar.</p><br>

            <p style="margin-left: 10px" ;><b>*1.2.b. Nuevo post:</b> Desde este apartado y con un formulario sencillo se pueden publicar posts nuevos a la página web.</p><br>

            <p style="margin-left: 10px" ;><b>1.2.c. Cerrar sesión:</b> Cierra la sesión actual. (<b>NOTA:</b> Si se ha entrado en la página usando la opción "modo invitado" esta opción se llamará "Salir de modo invitado" en su lugar) </p><br>

            <p id="comunidad-2"><b>1.3. Logo Telegraph Web: </b>Aparte de ser un logo sirve también como botón para regresar a la página principal (Comunidad).<br><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/4.jpg" alt="">
                </p>
            </div>

            <p><b>1.4. Paginación:</b> Por último abajo del todo de la página y justo antes del footer se encuentra la paginación, donde se puede navegar entre todos los posts de los que disponga la página. La paginación también se encuentra en el apartado de la galería</p><br>

            <h3 id="historia-dire" class="titulo">2. Historia de Dire Straits</h3>

            <p>Esta página muestra en tres categorías distintas toda la historia resumida del grupo de rock británico Dire Straits: Biografía, Discografía e Integrantes.</p><br>

            <h3 id="biografia" class="subtitulo">2.1. Biografía</h3><br>

            <p>La página estará ubicada en esta categoría por defecto: </p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/5.jpg" alt="">
                </p>
            </div>

            <p><b>2.1.1. Navegador:</b> Contiene los tres apartados de la página. Según se haga click se redirigirá al apartado deseado</p><br>

            <p><b>2.1.2. Artículos:</b> Una lista de las distintas etapas de la biografía de Dire Straits (Un total de seis etapas distintas por orden cronológico desde 1977 hasta 1995). Para dirigirse a una etapa concreta basta con hacer click a la etapa deseada.</p><br>

            <p>Después de haber seleccionado alguna de las etapas disponibles, se visualizará la siguiente página:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/6.jpg" alt="">
                </p>
            </div>

            <p>Cada uno de los seis apartados anteriormente mencionados se dividen en una página con cuatro apartados distintos cada uno acompañado con una imagen y un texto según qué momento de la historia de Dire Straits se esté explicando. Para navegar entre ellos basta con ir haciendo scroll (mover hacia arriba o hacia abajo la ruedecita) con el ratón.</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/7.jpg" alt="">
                </p>
            </div>

            <p>En el último apartado, en la esquina superior derecha como se puede ver en la imagen, aparecerá un borón para continuar la lectura desde ese punto en adelante, es decir, que se irá redirigiendo automáticamente y por orden a todas las etapas de la banda desde el punto que se haya escogido.</p><br>

            <h3 id="discografia" class="subtitulo">2.2. Discografía</h3><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/8.jpg" alt="">
                </p>
            </div>

            <p>Esta página es similar a la de biografía pero en lugar de la historia en general se trata de los álbumes musicales que han sacado los Dire Straits a lo largo de su carrera. Son un total de doce álbumes divididos en cuatro apartados distintos (Principales, en directo, EPs y recopilatorio). Además, tal como se puede apreciar en la imagen, pasando el cursor por encima de cualquiera de los álbumes se produce una animación que revela la lista de canciones que contiene ese álbum y su duración.</p><br>

            <h3 id="integrantes" class="subtitulo">2.3. Integrantes</h3><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/9.jpg" alt="">
                </p>
            </div>

            <p>Esta página contiene la lista de integrantes que han formado parte de Dire Straits durante su recorrido. Un total de 18 músicos dividido también en varias categorías. De manera similar al apartado de biografía, basta con ir haciendo scroll con el ratón e irán saliendo los distintos músicos con una foto y algo de información al estilo de una tarjeta.</p><br>

            <h3 id="galeria" class="titulo">3. Galería</h3>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/10.jpg" alt="">
                </p>
            </div>

            <p>Pasamos al siguiente apartado de la web, la galería. Aquí podremos observar una colección de imágenes aportadas por la comunidad que se dividen en ocho imágenes por página.</p><br>

            <p>Para acceder a alguna imagen deseada basta con hacer click en ella y se redirigirá a una página donde se podrán ver más detalles de la imagen como un nombre y una descripción:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/11.jpg" alt="">
                </p>
            </div>

            <h3 id="test" class="titulo">4. Test Geordie</h3>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/12.jpg" alt="">
                </p>
            </div>

            <p>Aquí se podrá realizar un test para poner a prueba el nivel de conocimiento que se tiene acerca de Dire Straits y competir de forma amistosa con el resto de la comunidad. Se divide en dos apartados: Test y Puntuaciones.</p><br>

            <p id="test-instrucciones"><b>4.1. Test: </b>Aquí se encuentran las instrucciones a tener en cuenta a la hora de realizar el test. Para comenzar el test se ha de hacer scroll con el ratón hasta abajo del todo y pulsar el botón "COMENZAR" <b>(1)</b>:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/13.jpg" alt="">
                </p>
            </div>

            <p>Una vez comenzado el test, serán un total de once preguntas donde se irán sumando o restando puntos. Para contestar cada pregunta basta con marcar la casilla que se crea conveniente en cada caso. Si no se desea contestar, se puede hacer click al botón "Saltar pregunta":</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/14.jpg" alt="">
                </p>
            </div>
            <p id="test-puntuaciones"><b>4.2. Puntuaciones: </b>Al terminar el test o accediendo desde el menú, se accederá a esta página donde se mostrará una tabla con un top 10 de las mejores puntuaciones de la página:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/15.jpg" alt="">
                </p>
            </div>

            <h3 id="acerca" class="titulo">5. Acerca de</h3>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/16.jpg" alt="">
                </p>
            </div>

            <p>Te encuentras en este apartado ahora mismo. Aquí puedes consultar con un simple navegador (similar al del apartado de "Historia de Dire Straits") de qué trata la página web <b>(1)</b> y cómo se usa. <b>(2)</b></p><br>

            <h3 id="pagina-personal" class="titulo">6. Página personal</h3>

            <p>Como ya se explicó anteriormente, se accede a esta página desde el menú desplegable del usuario en el header. Una vez dentro se puede observar una página con datos personales del usuario y algo de información sobre la actividad dentro de la página:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/17.jpg" alt="">
                </p>
            </div>

            <p>Pulsando el botón de cambiar tema <b>(1)</b> se actualizará la página web con un tema claro u oscuro dependiendo de cuál tenga seleccionado el usuario.</p><br>

            <p>Pulsando el botón "Editar perfil" <b>(2)</b> se redirigirá a un formulario similar en estructura al apartado de datos personales para poder editarlos:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/18.jpg" alt="">
                </p>
            </div>

            <p>Pulsando el botón "Hacer un reporte" <b>(3)</b> se redirigirá a un formulario para escribir un reporte acerca de algún problema con la página que será enviado al panel de control de administradores para que se hagan cargo:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/19.jpg" alt="">
                </p>
            </div>

            <h3 id="formularios" class="titulo">7. Formularios de subida (Comunidad y Galería)</h3>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/20.jpg" alt="">
                </p>
            </div>

            <p><b>*</b>Por último, en la comunidad y en la galería se pueden subir posts <b>(1)</b> o imágenes <b>(2)</b> respectivamente.<br><br>

            <p>Incluso también se pueden poner comentarios <b>(3)</b>:</p><br>

            <div class="thumb-manual">
                <p>
                    <img class="imagen-info" src="<?php echo RUTA; ?>/recursos/imagenes/manual/21.jpg" alt="">
                </p>
            </div>

            <p>Cuando se seleccione alguna de las opciones ya sea "Nuevo post", "Subir imagen" o "Hacer un comentario" se abrirá un formulario para rellenar con los datos necesarios.</p><br>

            <p style="font-size: small;"><b>* No se puede acceder desde el "Modo invitado"</b></p>

        </article>
    </div>
</div>