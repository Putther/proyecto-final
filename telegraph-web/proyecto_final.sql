-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 13:55:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL DEFAULT 0,
  `texto_comentario` varchar(250) NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_comentario_editado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post`, `id_usuario`, `texto_comentario`, `fecha_comentario`, `fecha_comentario_editado`) VALUES
(1, 8, 14, 'Es cierto, yo le solía dedicar esa canción a John Lennon y a Bob Marley también, de hecho', '2023-12-07 12:48:31', NULL),
(2, 8, 15, 'Qué grande que es mi hermano', '2023-12-07 13:23:16', NULL),
(9, 3, 11, 'Un grande Freddy Mercury (Yo también tengo curiosamente a un Freddy de foto de perfil)', '2023-12-07 17:53:51', '2023-12-07 18:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_post` varchar(50) NOT NULL DEFAULT '0',
  `descripcion_post` varchar(200) NOT NULL DEFAULT '0',
  `fecha_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `texto_post` text NOT NULL,
  `imagen_post` varchar(50) NOT NULL DEFAULT '0',
  `fecha_post_editado` timestamp NULL DEFAULT NULL,
  `upvotes_post` int(11) DEFAULT 0,
  `favoritos_post` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id_post`, `id_usuario`, `titulo_post`, `descripcion_post`, `fecha_post`, `texto_post`, `imagen_post`, `fecha_post_editado`, `upvotes_post`, `favoritos_post`) VALUES
(1, 11, 'Camel sigue infravalorado', 'Camel es una banda de rock progresivo fundada en 1971 pero que por desgracia no mucha gente conoce', '2023-10-17 08:55:33', 'Casi todo el mundo conoce o ha oído hablar de Pink Floyd ya que se le consideran los mejores en cuanto a su género, el rock progresivo. Es una lástima que por ello no mucha gente sepa de la existencia de la banda \"Camel\" fundada en el \'71 por Andy Latimer y que se labraron numerosos éxitos durante toda su carrera y que además siguen estando activos a día de hoy.', '3f9436752f7276b9c468f0aed5dbbf2d9c95386f.jpg', NULL, 0, 0),
(2, 11, 'Brian Johnson y Mark Knopfler', 'Dos músicos legendarios hablando un poco de la vida', '2023-10-17 09:04:59', 'Este es mi primer post. Solo quería compartir con vosotros este video que me encontré por YouTube donde podemos ver a dos leyendas del rock, Brian Johnson (AC/DC) y Mark Knopfler (Dire Straits) hablando de todo un poco: https://youtube.com/watch?v=y_pav5sYs5s', 'post2.jpg', NULL, 0, 0),
(3, 14, 'Curiosidad en la película \"Bohemian Rhapsody\"', '\"Bohemian Rhapsody\", protagonizada por Rami Malek es una película dedicada a la memoria y recorrido de Freddie Mercury durante su carrera musical en la banda \"Queen\"', '2023-10-17 09:09:01', 'Si alguna vez véis la película de Bohemian Rhapsody resulta que hay algo muy curioso durante la escena del famoso Wembley Live Aid \'85 y es que justo antes de que Queen entre en escena... ¡podemos oír un poco de la outro del legendario Sultans Of Swing de Dire Straits! Esto es así porque Queen interpretó en directo justo después de ellos. ¡Qué grandes!', 'post3.jpg', NULL, 0, 0),
(4, 15, 'Jack Sonni, te echaremos de menos', 'Jack Sonni fue parte de la banda Dire Straits durante su gira mundial \"Brothers In Arms\"', '2023-10-17 09:12:50', 'Solo quería dedicar este post para honrar la memoria de Jack Sonni, un gran guitarrista y compañero de Mark y los Dire Straits durante su gira \"Brothers In Arms\" que recientemente ha fallecido. Las razones se desconocen por el momento y Mark Knopfler le dedicó unas palabras por redes sociales. Un minuto de silencio por un gran músico, que en paz descanses, Jackie.', 'post4.webp', NULL, 0, 0),
(6, 14, '¡Nuevo material de Dire Straits!', 'Guy Fletcher y UMC llegan con un nuevo pack de canciones e interpretaciones en directo de Dire Straits', '2023-10-18 13:28:27', 'Ya podéis ir apuntando el 3 de noviembre en el calendario porque ese día tendremos un pack de 64 canciones de Dire Straits entre las cuales podremos encontrar un Alchemy extendido, un On The Night de ensueño y un concierto totalmente nuevo del \'79. Thank You, Guy!!!!', '563519.jpg', NULL, 0, 1),
(8, 11, '¿Sabías que...?', 'Tributo a John Lennon', '2023-10-20 07:53:57', '¿Sabías que Mark Knopfler le dedicaba su canción \"News\" a John Lennon cuando falleció en 1980 durante sus conciertos de la gira \"Making Movies\"?', 'the-beatles.jpg', '2023-12-14 11:04:17', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_galeria` varchar(100) NOT NULL,
  `imagen_galeria` varchar(50) NOT NULL,
  `texto_galeria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `id_usuario`, `titulo_galeria`, `imagen_galeria`, `texto_galeria`) VALUES
(2, 11, 'Mark Knopfler en solitario', '1.jpg', 'Al separarse en el \'95, Mark Knopfler siguió una nueva ruta en solitario'),
(3, 11, 'Entrados los 80s', '2.jpg', 'Foto probablemente tomada en la gira \'Making Movies\' a principios de los 80s'),
(5, 11, 'Mark Knopfler ochentero', '4.jpg', 'Otra foto de MK tomada en la gira \'Brothers In Arms\''),
(6, 14, 'Making Movies on location', '6.jpg', 'Tomada durante principios de los 80s en su gira \'Making Movies\' en blanco y negro'),
(7, 14, 'Mark noventero', '7.jpg', 'La última gira de los Dire Straits antes de su separación oficial'),
(8, 15, 'Todo un veterano', '8.jpg', 'Otra foto tomada durante la época en solitario de MK'),
(9, 15, 'Jack Sonni', '9.jpg', 'Un miembro de DS durante su gira más importante (QEPD)'),
(10, 14, 'El elenco original', '10.jpg', 'La banda original (John, Mark, David y Pick)'),
(12, 11, 'Disco de platino', '12.jpg', 'El álbum \'Brothers In Arms\' recibió numerosos discos de platino'),
(13, 14, 'Mark y John (90s)', '13.jpg', 'Inseparables incluso en su última gira como compañeros'),
(14, 14, 'Happy Mark', '5.jpg', 'Siempre alegre de tocar frente a su público'),
(16, 15, 'El elenco de los 90s', '15.jpg', 'Nueve músicos, una última gira mundial (Alan, Danny, Chris White, John, Mark, Guy, Chris Whitten, Paul y Phil)'),
(17, 11, 'Orgullo escocés', '16.jpg', 'Mark alzando su guitarra frente a las ovaciones de su público (\'91-\'92)'),
(18, 11, 'Dire Straits en el famoso alchemy live', '0d18d4a6d9.jpg', 'Mark Knopfler se arrodilla ante su público justo antes de terminar la canción \"Tunnel Of Love\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `id_puntuacion` int(11) NOT NULL,
  `usuario_puntuacion` varchar(50) NOT NULL,
  `puntuacion_total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`id_puntuacion`, `usuario_puntuacion`, `puntuacion_total`) VALUES
(2, 'josema', 3800),
(3, 'francisco', 68500),
(4, 'francisco', 66000),
(5, 'josema', 3800),
(7, 'josema', 3800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `categoria_reporte` varchar(50) NOT NULL,
  `contenido_reporte` varchar(250) NOT NULL DEFAULT '',
  `estado_reporte` enum('Sin resolver','Resuelto') NOT NULL DEFAULT 'Sin resolver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `id_usuario`, `categoria_reporte`, `contenido_reporte`, `estado_reporte`) VALUES
(1, 11, 'publicaciones', 'El primer post no tiene nada que ver con la música rock', 'Resuelto'),
(2, 7, 'comentarios', 'Prueba', 'Resuelto'),
(3, 20, 'publicaciones', 'La última publicación no tiene nada que ver con el rock', 'Resuelto'),
(4, 11, 'galeria', 'Prueba de reporte', 'Resuelto'),
(5, 20, 'publicaciones', 'Prueba', 'Resuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `enunciado` varchar(250) NOT NULL,
  `respuesta_1` varchar(100) NOT NULL,
  `respuesta_2` varchar(100) NOT NULL,
  `respuesta_3` varchar(100) NOT NULL,
  `respuesta_4` varchar(100) NOT NULL,
  `respuesta_correcta` varchar(100) NOT NULL,
  `info` varchar(250) NOT NULL,
  `dificultad` enum('facil','medio','dificil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `enunciado`, `respuesta_1`, `respuesta_2`, `respuesta_3`, `respuesta_4`, `respuesta_correcta`, `info`, `dificultad`) VALUES
(1, '¿En qué año se separaron definitivamente los Dire Straits?', '2007', '1995', '1988', '1974', '1995', 'Tras 17 años desde su primer disco, Mark decidió disolver el grupo en el \'95 para centrarse en proyectos más personales. Al año siguiente comenzaría su carrera en solitario sacando su primer álbum, \"Golden Heart\".', 'facil'),
(2, '¿Cuál es el primer apellido de Mark? (CUIDADO: Primer apellido)', 'Knopfler', 'Freuder', 'Illsley', 'David', 'Freuder', 'Su nombre completo es Mark Freuder Knopfler.', 'facil'),
(3, '¿De dónde viene el nombre \"Dire Straits\"?', 'De la expresión \"Situación extrema\" o simil', 'Solo es un conjunto de letras sin significado', 'Está inspirado en otra banda de música', 'De ninguna parte', 'De la expresión \"Situación extrema\" o simil', 'El nombre fue una sugerencia de un amigo de Pick (Batería) dada la situación económica y de apuros en la que se encontraba la banda (Dire Straits -> Situación extrema-arriesgada / Pasarlas canutas).', 'facil'),
(4, '¿En cuál de estas películas no compuso Mark?', 'Local Hero (1983)', 'Cal (1984)', 'Titanic (1997)', 'Comfort and Joy (1984)', 'Titanic (1997)', 'Aunque Mark compuso para muchas películas en su día, Titanic no fue una de ellas. Su verdadero compositor fue James Horner.', 'facil'),
(5, '¿En qué año nació Mark?', '1979', '1948', '1949', '2001', '1949', 'Nació en 1949, concretamente el 12 de agosto.', 'facil'),
(6, '¿Cuál ha sido el éxito indiscutible de la banda desde sus inicios?', 'Paradise City', 'Money For Nothing', 'Water Of Love', 'Sultans Of Swing', 'Sultans Of Swing', 'Desde que empezaron como músicos y desde su primer álbum una canción ha destacado siempre: \"Sultans Of Swing\" vendiendo numerosos singles y siendo una de las favoritas del público en general.', 'facil'),
(7, '¿Cuántos bajistas ha tenido la banda en toda su historia?', 'Ninguno. No tenían bajo', '1', '2', '3', '1', 'John Illsley nunca abandonó el grupo y estuvo de principio a fin tocando junto a ellos en los álbumes y en el escenario.', 'facil'),
(8, '¿Cuál de estas canciones fue un tremendo éxito a la par que tuvo algo de polémica?', 'Money For Nothing', 'Walk Of Life', 'On Every Street', 'Single Handed Sailor', 'Money For Nothing', 'Al tratarse de una dura crítica al mundo de la música y tener palabras malsonantes en su día Money For Nothing fue algo polémica pero acabó siendo una de sus canciones más populares gracias en parte a su aparición en la famosa MTV.', 'facil'),
(9, '¿Cuántos miembros tuvo la banda en sus inicios (1978-1979)?', '5', '6', '4', '3', '4', 'En sus inicios, Dire Straits se componía de 4 miembros, siendo Mark Knopfler (Voz y guitarra principal), David Knopfler (Guitarra), John Illsley (Bajo) y Pick Withers (Batería).', 'facil'),
(10, '¿Qué aparecía en la portada del álbum Brothers In Arms frente al fondo de nubes?', 'Un soldado', 'Una avioneta de guerra', 'Una guitarra', 'Nada', 'Una guitarra', 'En la portada de Brothers In Arms salía una de las guitarras más famosas y comunes de Mark, la National Resonator, que sonaba por ejemplo en uno de sus grandes éxitos \"Romeo and Juliet\".', 'facil'),
(11, 'En el famoso Alchemy Live ¿qué dibujo tenía la camiseta que Mark llevaba?', 'Ninguno', 'Unas flechas', 'El logo de la banda', 'La portada del álbum \"Love Over Gold\"', 'Unas flechas', 'Mark iba con su mítica camiseta blanca con flechas negras en el centro; un par de flechas apuntando hacia dentro y otro par hacia fuera. Inspirado en la pintura en la que se basa la portada del álbum Alchemy.', 'facil'),
(12, '¿Quién de estos integrantes era hermano de Mark?', 'John', 'Pick', 'David', 'Alan', 'David', 'David es el hermano menor de Mark, quien le acompañó en los inicios de la banda como guitarrista secundario.', 'facil'),
(13, '¿En qué año salió su primer álbum recopilatorio?', '1995', '2005', '1981', '1988', '1988', 'En 1988, se lanzó el primer álbum recopilatorio de la banda \"Money For Nothing\", que juntaba las mejores canciones del grupo hasta la fecha incluyendo algunos extras como una versión inédita en vivo de su canción \"Portobello Belle\".', 'facil'),
(14, 'Los músicos que tocaban en las giras mundiales siempre eran los mismos que grababan las canciones en estudio', 'Verdadero', 'Falso', '', '', 'Falso', 'No siempre era así. En el \'82 por ejemplo fue el viejo batería Pick Withers quien grabó con el grupo las canciones de su nuevo álbum pero en la gira le sustituyó Terry Williams.', 'facil'),
(15, '¿Cuántos miembros terminó teniendo la banda antes de su disolución en los noventa?', '7', '8', '9', '5', '9', 'Tanto el álbum como la gira \"On Every Street\" fue con la que más miembros contó, teniendo 9 músicos en total: dos guitarras, un bajo, dos teclados, una batería, una percusión, un instrumento de viento y una guitarra de acero con pedal.', 'facil'),
(16, '¿En qué estaba enfocado el videoclip de la canción \"Walk Of Life\"?', 'En la economía', 'En el deporte', 'En el baile', 'No tenía ningún tema en concreto. Solo era la banda tocando', 'En el deporte', 'En el videoclip se podían apreciar sobretodo partidos de distintos deportes como el béisbol o el rugby.', 'facil'),
(17, 'La canción \"Calling Elvis\" está dedicada a Elvis Presley', 'Verdadero', 'Falso', '', '', 'Verdadero', 'Un día, el cuñado de Mark intentó llamarle sin éxito durante horas. Cuando al fin le atendió la llamada, su cuñado bromeó diciéndole que era más difícil de localizar que Elvis Presley. Fue entonces cuando a Mark se le ocurrió componer la canción.', 'facil'),
(18, '¿De qué nacionalidad es Mark?', 'Inglesa', 'Irlandesa', 'Francesa', 'Escocesa', 'Escocesa', 'A pesar de haber vivido la mayor parte de su vida en Londres, Mark nació y se crió en Glasgow, Escocia.', 'facil'),
(19, '¿Cuál era el nombre original de la banda?', 'Telegraph Band', 'The Spanish City', 'The Straits', 'Café Racers', 'Café Racers', 'Como siempre solían tocar en pubs londinenses, en un principio pensaron en llamarse \"Cafe Racers\".', 'medio'),
(20, '¿Por qué se separó el hermano de Mark (David) del grupo en 1979?', 'Se había cambiado de grupo', 'No quiso continuar por la presión que ya acumulaba', 'Quiso formar otra banda por su cuenta', 'Nunca se supo', 'No quiso continuar por la presión que ya acumulaba', 'A finales de 1979, David decidió separarse del grupo porque sabía que en poco tiempo iban a tener demasiado éxito y no sabía si podía soportar la presión que eso conllevaría.', 'medio'),
(21, '¿Qué otra banda formó Mark junto con Guy y otros músicos en 1990?', 'The Notting Hillbillies', 'The Beverly Hillbillies', 'Brewer\'s Droop', 'Rockpile', 'The Notting Hillbillies', 'Mark quiso formar una banda más centada en el country y la llamó \"The Notting Hillbillies\" en referencia a la ciudad inglesa \"Nottingham\".', 'medio'),
(22, 'Mark Knopfler es diestro', 'Verdadero', 'Falso', '', '', 'Falso', 'A pesar de tocar la guitarra de una manera diestra, Mark en realidad es zurdo.', 'medio'),
(23, '¿Cuántos álbumes en directo sacaron?', '3', '4', '2', 'Ninguno', '3', 'Aunque en realidad sacaron 4, uno de ellos solo era una extensión del álbum principal a modo de LP. Por lo que fueron 3: Alchemy, On The Night y Live at The BBC.', 'medio'),
(24, 'Mark asistió a la inducción de la banda en el salón de la fama del rock en 2018', 'Verdadero', 'Falso', '', '', 'Falso', 'A pesar de tratarse de un evento único, Mark no se presentó. Estuvieron John Illsley (Bajo), Guy Fletcher (Teclado) y Alan Clark (Teclado).', 'medio'),
(25, '¿Cuál de las siguientes canciones está inspirada en una banda de música real?', 'Down To The Waterline', 'Sultans Of Swing', 'Brothers In Arms', 'Money For Nothing', 'Sultans Of Swing', 'La mítica canción \"Sultans Of Swing\" se le ocurrió al propio Mark luego de visitar un pub en Londres donde una banda de música con el mismo nombre tocase sin conseguir mucho éxito.', 'medio'),
(26, '¿Con qué otro famoso músico interpretó en varias ocasiones la canción \"Going Home\" en los conciertos de 1985?', 'Brian Johnson (AC/DC)', 'Andy Latimer (Camel)', 'Axl (Guns \'N\' Roses)', 'Hank B. Marvin (The Shadows)', 'Hank B. Marvin (The Shadows)', 'Mark tocaba con uno de sus ídolos e inspiraciones para tocar música de su juventud, Hank B. Marvin, del grupo \"The Shadows\".', 'medio'),
(27, '¿Qué profesión tenía Mark antes de decidir dedicarse a la música?', 'Policía', 'Profesor', 'Camarero', 'No tenía ninguna profesión', 'Profesor', 'Mark estaba licenciado en filología inglesa y solía impartir clases en la universidad poco antes de dedicarse a la música.', 'medio'),
(28, '¿Quién es el artista de la portada del álbum en directo \"Alchemy Live\"?', 'Brett Whiteley', 'Andy Warhol', 'Frida Kahlo', 'Leonardo Da Vinci', 'Brett Whiteley', 'La portada del álbum Alchemy Live se basa en la pintura de mismo nombre (Alchemy) de 1973  realizada por el artista australiano Brett Whiteley. Representa la alquimia, el proceso de convertir las cosas en oro.', 'medio'),
(29, '¿Cúantos conciertos aproximadamente dieron durante su gira más famosa \"Brothers In Arms\"?', '50', '100', '250', '400', '250', 'Casi 250 conciertos durante un periodo de poco más de un año. Toda la banda acabó agotada tras el fin de la gira y Mark, cito textualmente, \"no quería ver una guitarra ni en pintura\".', 'medio'),
(30, '¿Qué solía hacer Mark entre 1982-1992 antes de empezar a tocar Sultans Of Swing?', 'Nada', 'Gritaba al público \"Thank you\" (Gracias)', 'Contaba alguna anécdota del grupo', 'Presentaba a los miembros de la banda', 'Gritaba al público \"Thank you\" (Gracias)', 'Justo antes de empezar el mítico Sultans en los conciertos a partir del \'82, siempre solía gritarle al público \"Thank youu!!\".', 'medio'),
(31, 'La gira \"On Every Street\" en un principio iba a ser más larga durando casi dos años', 'Verdadero', 'Falso', '', '', 'Verdadero', 'La gira iba a constar en un principio de más de 300 conciertos desde el \'91 hasta bien entrados en el \'93 pero por motivos económicos y personales se redujo considerablemente. ', 'medio'),
(32, '¿Dónde terminó no solo la última gira de Dire Straits, sino la que sería su última actuación como banda hasta la fecha?', 'Londres', 'Francia', 'España', 'Estados Unidos', 'España', 'La gira terminó en Zaragoza el 9 de octubre.  Nadie se imaginaba entonces que aquella sería la última vez que se vería a la banda unida.', 'medio'),
(33, '¿Cuál de estas canciones no se trata de una canción inédita?', 'Me and My Friends', 'In My Car', 'Millionaire Blues', 'Bernadette Blues', 'Millionaire Blues', 'A pesar de no ser muy conocida, \"Millionaire Blues\" fue una canción dentro del álbum \"On Every Street\" pero que solo estuvo disponible en varios singles y LPs como el de \"Calling Elvis\" por ejemplo.', 'medio'),
(34, '¿Cómo se llama la banda propia que formaron varios miembros de la banda después de su disolución?', 'The Sultans', 'The Straits', 'The Jubilees', 'Dire Strats', 'The Straits', 'En 2011, Alan Clark formó el grupo \"The Straits\" en el que junto con otros miembros como John Illsley, interpretarían canciones de la vieja banda.', 'medio'),
(35, '¿Qué dos canciones interpretaron en el famoso \"Live Aid\" de 1985?', 'Money For Nothing y Walk Of Life', 'Money For Nothing y Brothers In Arms', 'Walk Of Life y Sultans Of Swing', 'Money For Nothing y Sultans Of Swing', 'Money For Nothing y Sultans Of Swing', 'Prácticamente sus dos himnos más conocidos, el clásico Sultans y el entonces reciente pero increíblemente popular \"Money For Nothing\" contando incluso con la colaboración de Sting.', 'medio'),
(36, '¿Con qué otro famoso músico escribió y grabó la canción \"Money For Nothing\"?', 'Brian Johnson (AC/DC)', 'Sting (The Police)', 'Bob Dylan', 'Eric Clapton', 'Sting (The Police)', 'Sting acompañó a Mark en la canción cantando en su famosa intro y en algunas partes de la letra.', 'medio'),
(37, 'Durante un concierto en directo en 1985, Mark tuvo que detener el comienzo de Money For Nothing porque...', 'Un fan se había desmayado', 'A la guitarra se le rompió una cuerda', 'Un fan le tiró una camiseta', 'Quiso cambiar de canción', 'Un fan le tiró una camiseta', 'En un concierto en Portland, justo después de la intro de Money For Nothing y cuando entraba en escena Mark con su solo, un fan tiró su camiseta al escenario causa de la euforia del momento. El pobrecillo sufrió la vergüenza de su vida.', 'dificil'),
(38, '¿Por qué Jack Sonni (Guitarrista rítmico) no pudo asistir con la banda al concierto tributo a Nelson Mandela en 1988?', 'Estaba hospitalizado', 'Peleas internas con la banda', 'Su mujer acababa de dar a luz', 'Había fallecido', 'Su mujer acababa de dar a luz', 'Durante el concierto tributo a Nelson Mandela, Jack Sonni acababa de tener gemelos y no pudo asistir. Le sustituyó el legendario Eric Clapton en aquella velada.', 'dificil'),
(39, 'En uno de los conciertos de Japón en 1983, Mark se enfadó con un fan porque en todo el directo, en las pausas entre canciones, no hizo más que pedirle una canción ¿Cuál era esa canción?', 'It Never Rains', 'Skateaway', 'Hand In Hand', 'Portobello Belle', 'Skateaway', 'Aquel japonés se dedicó a gritar \"Skateaway\" cada vez que podía a ver si Mark y su banda le hacían caso. Sobra decir que no le funcionó.', 'dificil'),
(40, 'Mark siempre ha sido un fanático de los coches ¿Con qué coche se le veía marchar del Sydney Entertainment Center tras su último concierto de la gira Brothers In Arms (1985-1986)?', 'Ferrari 308 GTS', 'Mercedes-Benz 500SL', 'Lamborghini Jalpa', 'Porsche 911', 'Porsche 911', 'Se marchaba en un Porsche 911 convertible, aparte de la música también tenía una gran pasión por el mundo del motor.', 'dificil'),
(41, 'En los conciertos de la gira Making Movies (1980-1981), interpretaban una canción cuya outro se convertiría años más tarde en Private Investigations. ¿Cuál era esa canción?', 'News', 'Lions', 'Angel Of Mercy', 'Skateaway', 'News', 'En \"News\", la outro de la canción se extendía en lo que en unos años después se convertiría en la outro de \"Private Investigations\", canción también bastante popular.', 'dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL DEFAULT 'No especificado',
  `login_usuario` varchar(50) NOT NULL DEFAULT '',
  `imagen_usuario` varchar(50) NOT NULL DEFAULT 'default.png',
  `correo_usuario` varchar(50) NOT NULL DEFAULT 'No especificado',
  `pass_usuario` varchar(50) NOT NULL,
  `frase_usuario` varchar(50) NOT NULL DEFAULT '¡Viva el rock!',
  `sobremi_usuario` varchar(350) NOT NULL DEFAULT '',
  `tipo_usuario` set('usuario','admin') NOT NULL DEFAULT 'usuario',
  `fecha_registro_usuario` timestamp NOT NULL DEFAULT current_timestamp(),
  `numero_posts_usuario` int(11) NOT NULL,
  `numero_comentarios_usuario` int(11) NOT NULL,
  `numero_favoritos_usuario` int(11) NOT NULL,
  `upvotes_usuario` text NOT NULL DEFAULT '',
  `favoritos_usuario` text NOT NULL DEFAULT '',
  `mejor_puntuacion_usuario` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `login_usuario`, `imagen_usuario`, `correo_usuario`, `pass_usuario`, `frase_usuario`, `sobremi_usuario`, `tipo_usuario`, `fecha_registro_usuario`, `numero_posts_usuario`, `numero_comentarios_usuario`, `numero_favoritos_usuario`, `upvotes_usuario`, `favoritos_usuario`, `mejor_puntuacion_usuario`) VALUES
(1, 'No especificado', 'francisco j', 'default.png', 'No especificado', 'admin', '0', '0', 'admin', '2023-11-20 20:23:04', 0, 0, 0, '', '', 0),
(7, 'No especificado', 'mark knopfler', 'default.png', 'No especificado', 'tickettoheaven98', '0', '0', 'usuario', '2023-11-20 20:23:04', 0, 0, 0, '', '', 0),
(11, 'José Manuel', 'josema', 'josema.webp', 'josemaermaky@hotmail.com', 'ermaky', 'No se me ocurre ninguna frase ahora mismo', 'He abandonado a mi mejor amigo (Modificación)', 'usuario', '2023-11-20 20:23:04', 2, 1, 1, '', '8,', 3800),
(13, 'Bryan Tadeo', 'hymyt', '', 'pikacholo332@gmail.com', 'gromi2005', 'Sample_text.png', 'Me gustan los ponis', 'usuario', '2023-11-29 21:25:24', 0, 0, 0, '', '', 0),
(14, 'Mark Knopfler', 'therealknopfler49', 'default.png', 'markknopfler1949@gmail.com', '1949', '', '', 'usuario', '2023-12-07 12:32:58', 2, 1, 0, '', '', 0),
(15, 'David Knopfler', 'davidknopfler', 'default.png', 'davidknopfler@gmail.com', '1234', '', '', 'usuario', '2023-12-07 13:15:29', 1, 1, 0, '', '', 0),
(18, 'No especificado', 'letty toretto', 'default.png', 'No especificado', 'dom', '¡Viva el rock!', '', 'admin', '2023-12-11 11:47:31', 0, 0, 0, '', '', 0),
(20, 'Francisco Javier', 'francisco', 'dire_straits-1.jpg', 'franciscojavier.valle-jimenez@iesruizgijon.com', 'fran1234', 'Dire Straits 4ever!', 'Prueba', 'usuario', '2023-12-13 08:07:14', 0, 0, 1, '', '6,', 68500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`) USING BTREE,
  ADD KEY `FK_comentarios_comunidad` (`id_post`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id_post`) USING BTREE,
  ADD KEY `FK_comunidad_usuarios` (`id_usuario`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`) USING BTREE;

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`id_puntuacion`) USING BTREE;

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `id_puntuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_comentarios_comunidad` FOREIGN KEY (`id_post`) REFERENCES `comunidad` (`id_post`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD CONSTRAINT `FK_comunidad_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
