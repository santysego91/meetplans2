-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2018 a las 19:22:28
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nombre_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Categoria 1'),
(3, 'Categoria 2'),
(10, 'Categoria 3'),
(11, 'Cat5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE `foros` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_mensajes` bigint(255) NOT NULL DEFAULT '0',
  `cantidad_temas` bigint(255) NOT NULL DEFAULT '0',
  `id_categoria` int(100) NOT NULL DEFAULT '1',
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT '1 es el estado abierto del foro y 0 para crrarlo y solo admin tiene acceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`id`, `nombre`, `descripcion`, `cantidad_mensajes`, `cantidad_temas`, `id_categoria`, `estado`) VALUES
(2, 'Mi primer foro', 'Esta es la descripción', 4, 4, 2, 1),
(5, 'Segundo Foro', 'Descripcion corta del segundo foro', 0, 0, 3, 0),
(6, 'Tercer foro', 'Descripcion corta del tercer foro', 0, 0, 3, 1),
(7, 'Cuarto Foro', 'Descripcion corta del Cuarto Foro', 0, 0, 3, 1),
(8, 'Quinto Foro', 'Descripcion corta del Quinto foro', 0, 0, 3, 1),
(9, 'Sexto foro', 'Descripcion corta del Sexto Foro', 1, 1, 2, 1),
(10, 'Septima Categoria', 'Descripcion cat 7', 0, 0, 2, 1),
(11, 'Hoááa ·$·\"EQW', 'sdf', 0, 0, 10, 1),
(12, '☺☻♥Foro con caracteres Esp♦♣ ♠◙ ♂♀♪♫☼◄↕‼¶§ ▬ ', 'llkñ ); ret ert ernvbmhgjhg', 0, 0, 10, 1),
(13, 'hmjnbjhg', 'jhk', 0, 0, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` bigint(255) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_foro` int(255) NOT NULL,
  `id_dueno` int(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` int(1) NOT NULL DEFAULT '1',
  `fecha` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '11/10/2018',
  `visitas` int(255) NOT NULL DEFAULT '0',
  `respuestas` int(255) NOT NULL DEFAULT '0',
  `id_ultimo` int(255) NOT NULL,
  `fecha_ultimo` varchar(21) COLLATE utf8_unicode_ci NOT NULL DEFAULT '11/10/18 20:56pm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `titulo`, `contenido`, `id_foro`, `id_dueno`, `estado`, `tipo`, `fecha`, `visitas`, `respuestas`, `id_ultimo`, `fecha_ultimo`) VALUES
(9, 'Declaración de privacidad', 'Esta Declaración de privacidad explica nuestras prácticas, incluidas tus preferencias y opciones, en relación con la recogida, utilización y comunicación de determinada información, incluida tu información personal, por parte de las sociedades del grupo Netflix.\r\n\r\nContacto\r\nSi tienes preguntas generales acerca de tu cuenta o sobre cómo contactar con nuestro servicio de atención al cliente, visita nuestro centro de ayuda en línea en https://help.netflix.com. Si tienes dudas concretas acerca de esta Declaración de privacidad, o sobre la utilización de tu información personal, cookies o tecnologías similares, puedes contactar por correo electrónico con nuestro delegado de Protección de Datos en la dirección privacy@netflix.com.\r\n\r\nNetflix International B.V. es el responsable del tratamiento de tu información personal. Ten en cuenta que, si te pones en contacto con nosotros para que te ayudemos, por tu seguridad y por la nuestra, puede que tengamos que comprobar tu identidad antes de atender tu solicitud.', 2, 6, 1, 1, '13/10/18 - 19:09', 0, 0, 6, '13/10/18 - 19:09'),
(10, 'Recogida de información', 'Recibimos y almacenamos información relativa a tu persona como por ejemplo:\r\n\r\nInformación que tú nos facilitas: Obtenemos la información que tú nos facilitas, incluyendo:\r\ntu nombre, dirección de correo electrónico, dirección o código postal, método de pago y número de teléfono. En ciertos países, también recogemos un número de identificación fiscal para fines de facturación o tributarios, entre otros. Obtenemos dicha información de varias maneras, entre ellas cuando la incorporas al utilizar nuestro servicio, al contactar con nuestro servicio de atención al cliente, o al participar en encuestas o promociones de marketing;\r\ninformación obtenida si decides publicar reseñas o puntuaciones, gustos y preferencias, la configuración de tu cuenta (incluidas tus preferencias definidas en el apartado \"Cuenta\" de nuestro sitio web), o cuando nos facilitas información a través de nuestro servicio o de algún otro modo.\r\nInformación que obtenemos automáticamente: Obtenemos información sobre ti y sobre tu uso de nuestro servicio, de tus interacciones con nosotros y nuestra publicidad, así como información relacionada con tu ordenador u otro dispositivo utilizado para acceder a nuestro servicio (como consolas de videojuegos, televisores inteligentes, teléfonos móviles o descodificadores). Esta información incluye:\r\ntu actividad en el servicio Netflix, como selección de títulos, historial de visionados y consultas de búsqueda;\r\ntus interacciones con tu correo electrónico, notificaciones y SMS;\r\ndetalles relacionados con tus interacciones con el Servicio de atención al cliente, como la fecha, la hora y el motivo de contactar con nosotros, transcripciones de cualquier conversación por chat y, si nos llamas, tu número de teléfono y grabaciones de las llamadas;\r\nID de dispositivos u otros identificadores inequívocos;\r\nidentificadores de publicidad, como los de los dispositivos móviles, tabletas y dispositivos de streaming que incluyan dichos identificadores (para más información, véase el apartado \"Cookies y publicidad en Internet\" más abajo);\r\ncaracterísticas de aparatos y programas informáticos (como el tipo y la configuración), información de conexión, estadísticas de vistas de páginas, orígenes de remisiones (las URL de referencia, por ejemplo), dirección IP (que puede indicarnos tu ubicación aproximada), navegador e información estándar del registro del servidor web;\r\ninformación obtenida mediante la utilización de cookies, contadores de visitas a la web y otras tecnologías, que incluye datos de publicidad (tales como información sobre la disponibilidad y entrega de anuncios, la URL del sitio, así como la fecha y hora). (Para más detalles, consulta el apartado \"Cookies y publicidad en Internet\").\r\nInformación proveniente de otras fuentes: también obtenemos datos a través de otras fuentes. Protegemos esos datos conforme a las prácticas descritas en esta Declaración de privacidad, además de cualquier otra restricción impuesta por la fuente de la que proceden los datos. Estas fuentes varían con el transcurso del tiempo, pero podrían incluir las siguientes:\r\nproveedores de servicios que nos ayuden a determinar una ubicación basándose en tu dirección IP con el fin de personalizar nuestro servicio y para otros usos conforme a esta Declaración de privacidad;\r\nsocios que permiten que nuestro servicio esté disponible en su dispositivo o con los que ofrecemos servicios de marca compartida o actividades de marketing conjuntas;\r\nproveedores de servicios de pago que nos proporcionen datos sobre la forma de pago basados en su relación contigo;\r\nproveedores de servicios de Internet, de los que obtenemos datos demográficos, basados en intereses y relacionados con la publicidad online;\r\nfuentes de dominio público tales como las bases de datos gubernamentales.', 2, 6, 1, 1, '13/10/18 - 19:10', 0, 0, 6, '13/10/18 - 19:10'),
(11, 'Utilización de la información', 'Utilizamos la información para analizar, administrar, mejorar, personalizar y prestar nuestros servicios y acciones de marketing, entre otros para procesar tu registro, tus pedidos y tus pagos, así como para comunicarnos contigo en relación con este y otros temas. Por ejemplo:\r\n\r\ndeterminar tu ubicación geográfica general, facilitar contenidos localizados, mostrarte recomendaciones personalizadas de visionado de películas y series de TV que creamos que pueden interesarte, determinar tu proveedor de servicios de Internet y ayudarnos a responder consultas rápida y eficazmente;\r\nprevenir, detectar e investigar actividades potencialmente prohibidas o ilegales, incluido el delito de estafa, y hacer cumplir nuestros términos (tales como establecer los requisitos para pruebas gratuitas);\r\nanalizar y entender nuestra audiencia, mejorar nuestro servicio (incluidas nuestras experiencias de interfaces de usuario) y optimizar la selección de contenido, los algoritmos de recomendaciones y la entrega de nuestros servicios;\r\ncomunicarnos contigo acerca de nuestro servicio (por ejemplo mediante correo electrónico, notificaciones automáticas, SMS y canales de mensajería en línea), para enviarte noticias sobre Netflix, detalles de nuestras nuevas prestaciones y contenidos disponibles en Netflix, y ofertas especiales, anuncios promocionales y encuestas de satisfacción, y para ayudarte en solicitudes operacionales tales como peticiones de cambio de contraseña. Consulta la sección \"Opciones\" de esta Declaración de privacidad para saber cómo configurar o cambiar tus preferencias de comunicación.\r\nNuestra base jurídica para la recopilación y utilización de los datos personales descritos en esta Declaración de privacidad dependerá de los datos personales implicados y del contexto específico en el cual los recojamos y utilicemos. Por regla general, recogemos tus datos personales cuando ejecutamos un contrato contigo (por ejemplo: para prestarte nuestros servicios), cuando el tratamiento de los mismos sea para nuestro interés legítimo, sin que entre en conflicto con tus propios intereses de protección de tus datos ni con tus derechos o libertades fundamentales (por ejemplo: nuestras actividades de marketing directo conformes a tus preferencias), o cuando tenemos tu autorización para hacerlo (por ejemplo: para que participes en actividades de opinión de clientes tales como encuestas y grupos de discusión). En algunos casos, tenemos la obligación legal de recopilar tus datos personales. En otros casos, los necesitamos para proteger tus intereses vitales o los de otra persona (por ejemplo: para impedir una estafa en el pago o para comprobar tu identidad). Si tienes alguna duda sobre cómo utilizamos tus datos personales (incluidas las bases legales y los mecanismos de transferencia de datos que adoptamos), sobre cookies o tecnologías similares, puedes escribir un correo electrónico a nuestro delegado de Protección de Datos (privacy@netflix.com). Encontrarás más información al respecto en nuestro centro de ayuda online: https://help.netflix.com.', 2, 6, 1, 1, '13/10/18 - 19:10', 0, 0, 6, '13/10/18 - 19:10'),
(12, 'Comunicación de la información', 'Proporcionamos tu información a terceros para determinados fines, tal y como se describe a continuación:\r\n\r\nLas sociedades del grupo Netflix: compartimos tu información entre las sociedades del grupo Netflix (https://help.netflix.com/support/2101) cuando es necesario para: tratar y conservar datos; proporcionarte acceso a nuestro servicio; atender al cliente; tomar decisiones acerca de mejoras del servicio y desarrollo de contenidos; y para otros fines descritos en la sección de \"Uso de la información\" de esta Declaración de privacidad.\r\nProveedores de servicios: empleamos a otras compañías, agentes o contratistas (\"Proveedores de servicios\") para prestar servicios en nuestro nombre o para ayudarnos con los servicios que te prestamos. Por ejemplo, contratamos proveedores de servicios para prestar servicios de marketing, publicidad, comunicaciones, infraestructura e informática, para personalizar y optimizar nuestro servicio, para procesar transacciones con tarjetas de crédito u otros métodos de pago, prestar servicios de atención al cliente, cobrar deudas, analizar y mejorar datos (como, por ejemplo, datos sobre interacciones de usuarios con nuestro servicio), y llevar a cabo encuestas de satisfacción. Durante la prestación de tales servicios, estos proveedores pueden acceder a tu información personal o a otro tipo de información. No autorizamos a dichos proveedores a utilizar o comunicar tu información personal excepto la relacionada con la prestación de sus servicios.\r\nOfertas promocionales: en algunos casos, te ofrecemos promociones conjuntas o programas que, para que participes, deberemos compartir tu información con terceros. Para realizar este tipo de promociones, compartiremos tu nombre e información relacionada con el cumplimiento del incentivo. Ten en cuenta que estos terceros son responsables de sus propias prácticas de privacidad.\r\nProtección de Netflix y otros: Netflix y sus proveedores de servicios pueden comunicar o utilizar tu información personal y otros tipos de información si consideran razonablemente que tal comunicación es necesaria para (a) cumplir con cualquier legislación vigente, reglamento, procedimiento, o requisito administrativo, (b) hacer cumplir términos de uso aplicables, incluidas las investigaciones de infracciones, (c) detectar, evitar o por algún otro procedimiento abordar actividades ilegales o sospechosas de ilegalidad (como estafas en el pago), problemas técnicos o de seguridad, o (d) protegerse contra violación de derechos, daños en la propiedad o en la seguridad de Netflix, de sus usuarios o del público, según lo exija o lo permita la legislación.\r\nCesiones societarias: en relación con cualquier reorganización, reestructuración, fusión o venta, u otra transmisión de activos, cederemos información, incluida la de tipo personal, siempre y cuando la parte receptora acepte tratar tu información personal de manera acorde a nuestra Declaración de privacidad.\r\nCuando con ocasión de un intercambio de información transfiramos información personal a países ajenos al Espacio Económico Europeo y a otras zonas que cuenten con leyes integrales de protección de datos, nos aseguraremos de que la información sea transferida de acuerdo con esta Declaración de privacidad y conforme a la legislación vigente en materia de protección de datos.\r\n\r\nTambién puedes optar por comunicar tu información de las siguientes maneras:\r\n\r\ncuando utilices el servicio Netflix, tendrás la oportunidad de mostrar públicamente reseñas u otro tipo de información, y dicha información podría ser usada por terceros;\r\ndeterminadas partes de nuestro servicio pueden contener una herramienta que te da la opción de compartir información por correo electrónico, SMS o aplicaciones de redes sociales o de otro tipo de intercambio, mediante el uso de clientes y aplicaciones en tu dispositivo inteligente.\r\nlos complementos o \"plugins\" de redes sociales te permiten compartir información.\r\nLos complementos o \"plugins\" y las aplicaciones de redes sociales funcionan bajo la dirección de las propias redes sociales, y están sujetos a sus términos de uso y políticas de privacidad.', 2, 6, 1, 1, '13/10/18 - 19:11', 0, 0, 6, '13/10/18 - 19:11'),
(13, 'Acceso a la cuenta y a los perfiles', 'Para tu comodidad, puedes acceder rápidamente con la función \"Recordarme en este dispositivo\" cuando inicies sesión en el sitio web. La tecnología utilizada por esta función nos permite ofrecerte acceso directo a la cuenta y ayudarte a administrar el servicio de Netflix, pues no tendrás que poner la contraseña ni otros identificadores de usuario cuando tu navegador vuelva a visitar el servicio.\r\n\r\nPara eliminar de tus dispositivos el acceso a tu cuenta de Netflix: (a) ve al apartado \"Cuenta\" de nuestro sitio web, selecciona \"Cerrar sesión en todos los dispositivos\" y sigue las instrucciones para desactivar tus dispositivos (ten en cuenta que la desactivación no se produce inmediatamente) o (b) borra la configuración de Netflix en tu dispositivo (los pasos pueden variar según el dispositivo y la opción no está disponible en todos ellos). Siempre que puedan, los usuarios de dispositivos públicos o compartidos deberán cerrar la sesión al finalizar cada visita. Si vendes o devuelves un ordenador o un dispositivo compatible con Netflix, antes deberás cerrar la sesión y desactivar el dispositivo. Si no mantienes la seguridad de tu contraseña o dispositivo, no lo desactivas o no cierras la sesión, los siguientes usuarios podrían acceder a tu cuenta, que incluye tu información personal.\r\n\r\nSi compartes o permites a otros acceder a tu cuenta, estos podrán ver tu información (incluso en algunos casos información de tipo personal) como tu historial de visionados, puntuaciones, reseñas e información de tu cuenta (entre otros, tu dirección de correo electrónico u otra información del apartado \"Cuenta\" de nuestro sitio web). Esto sucede incluso cuando utilizas nuestra función de perfiles.\r\n\r\nGracias a los perfiles, los usuarios pueden disfrutar de una experiencia de Netflix personalizada, basada en las películas y series que les interesan, así como de historiales de visionado independientes. Ten en cuenta que los perfiles son de libre acceso para cualquiera que use tu cuenta de Netflix, de modo que toda persona que pueda acceder a ella puede navegar y/o usar, editar o borrar perfiles. Es tu obligación explicárselo a las demás personas que tengan acceso a tu cuenta y adviérteselo si no quieres que usen o modifiquen tu perfil.', 9, 6, 1, 1, '13/10/18 - 19:18', 0, 0, 6, '13/10/18 - 19:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `user` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` int(1) NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_conexion` int(32) NOT NULL DEFAULT '0',
  `no_leidos` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permiso`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`) VALUES
(4, 'Admin', 'd41d8cd98f00b204e9800998ecf8427e', 'santysego2@gmail.com', 0, 1, '', '', '', 0, ''),
(6, 'User2', 'c0784027b45aa11e848a38e890f8416c', 'santysego@gmail.com', 2, 0, '', '', '', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
