-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2018 a las 19:27:30
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(11, 'Cat5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` tinyint(4) NOT NULL,
  `timer` int(80) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `timer`) VALUES
(1, 1539624300);

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
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT '1 es el estado abierto del foro y 0 para crrarlo y solo admin tiene acceso',
  `ultimo_tema` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_ultimo_tema` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`id`, `nombre`, `descripcion`, `cantidad_mensajes`, `cantidad_temas`, `id_categoria`, `estado`, `ultimo_tema`, `id_ultimo_tema`) VALUES
(14, 'PcComponents', 'descripcion del foro', 3, 3, 2, 1, 'Envíos', 22),
(15, 'Netflix', 'Descripcion del foro netflix', 1, 1, 2, 1, 'Prueba BBcode 1', 20),
(16, 'hbo', 'Descripcion del foro hbo', 0, 0, 2, 1, '', 0);

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
(15, 'Tu información y tus derechos', 'Puedes solicitar acceso a tu información personal, y corregir o actualizar aquellos datos relativos a tu persona que se hayan quedado desactualizados.\r\n\r\nPara hacerlo, visita el apartado "Cuenta" de nuestro sitio web. Desde allí, puedes acceder a una amplia variedad de información sobre tu cuenta y actualizarla, incluida tu información de contacto, tu información de pagos a Netflix, e información relacionada con tu cuenta (como los contenidos que hayas visionado y valorado y tus reseñas). Para acceder a "Cuenta", debes iniciar sesión. También puedes solicitar que borremos información personal que tengamos sobre ti.\r\n\r\nSi tienes alguna consulta o solicitud acerca de nuestras prácticas de privacidad, escríbenos un correo a nuestro delegado de Protección de Datos (privacy@netflix.com). Contestamos a todas las solicitudes de individuos que deseen ejercer sus derechos de protección de datos según la legislación de protección de datos aplicable. Consulta también el apartado "Opciones" de esta Declaración de privacidad para conocer más opciones relacionadas con tus datos.\r\n\r\nPuedes oponerte al tratamiento de tus datos personales por parte de Netflix, pedirnos que limitemos su tratamiento o solicitar su portabilidad. Si hemos recogido y tratado tus datos personales con tu consentimiento, podrás retirar tu consentimiento cuando quieras, y eso no afectará a la legalidad de ningún tratamiento de datos que hayamos hecho antes de que hayas retirado tu consentimiento, ni afectará al tratamiento de tus datos personales realizado sobre bases legales distintas a las de tu consentimiento. Tienes el derecho de reclamar a autoridades u organismos públicos de protección de datos sobre nuestra recogida y utilización de tus datos personales. Nuestra sede principal en la Unión Europea se encuentra en los Países Bajos. Encontrarás más información al respecto en nuestro centro de ayuda online: https://help.netflix.com.\r\n\r\nPodemos retener información requerida o permitida por las leyes y normativas vigentes, incluso para respetar tus elecciones, para facturación o registros y para cumplir los propósitos descritos en esta Declaración de privacidad. Cuando no sea necesario retener tus datos personales, tomaremos las medidas correspondientes para suprimirlos o hacerlos anónimos.', 6, 6, 1, 1, '13/10/18 - 21:35', 0, 0, 6, '13/10/18 - 21:35'),
(18, 'Nuevo tema (seg foro test)', 'En 2005 nace PcComponentes, dentro del grupo YF Networks, y, desde el primer momento, apostamos por el canal online como nuestro principal foco de negocio. Algo que en aquellos años era todavía difícil de asimilar, pronto se convirtió en nuestra principal seña de identidad.\r\n\r\nEl espíritu por el que se crea PcComponentes es para poder ofrecer a todos los amantes de la tecnología los mejores componentes a precios asequibles, sin renunciar a la calidad ni a un buen servicio postventa.', 5, 6, 1, 1, '15/10/18 - 14:08', 0, 0, 6, '15/10/18 - 14:08'),
(19, 'Quienes somos', 'Somos PcComponentes\r\nEn 2005 nace PcComponentes, dentro del grupo YF Networks, y, desde el primer momento, apostamos por el canal online como nuestro principal foco de negocio. Algo que en aquellos años era todavía difícil de asimilar, pronto se convirtió en nuestra principal seña de identidad.\r\n\r\nEl espíritu por el que se crea PcComponentes es para poder ofrecer a todos los amantes de la tecnología los mejores componentes a precios asequibles, sin renunciar a la calidad ni a un buen servicio postventa.', 14, 6, 1, 1, '15/10/18 - 14:56', 0, 0, 6, '15/10/18 - 14:56'),
(20, 'Prueba BBcode 1', 'BBCode\r\n- <b>Negrita</b>\r\n- <u>Subrayar</u>\r\n- <i>Cursiva</i>\r\n- <s>Tachado</s>\r\n- <span style="font-size: 18px;">Tamaño 18</span>\r\n- <span style="color: "coral";">Coral</span>\r\n- <span style="font-family: "Wingdings";">Wingdings</span>\r\n- <img src="imagen.jpg" />\r\n- [url]http://google.com[/url]\r\n- [quote="James"]Texto que quiero citar.[/quote]\r\n- <h1>Cursiva</h1>\r\n- <h2>Cursiva</h2>\r\n- <h3>Cursiva</h3>\r\n- <h4>Cursiva</h4>\r\n- <h5>Cursiva</h5>\r\n- <h6>Cursiva</h6>', 15, 7, 1, 1, '15/10/18 - 16:56', 0, 0, 7, '15/10/18 - 16:56'),
(21, 'Condiciones de compra', '<b><u>Titular y condiciones generales de contratación</u></b>\r\n\r\n\r\n[i]Las presentes Condiciones Generales de Contratación - ahora en adelante CGC -, regulan las condiciones de compra de los diferentes productos ofrecidos en nuestra web: www.pccomponentes.pt, de propriedad de PC COMPONENTES Y MULTIMEDIA, S.L.U. (ahora en adelante PC COMPONENTES), sociedad española, con NIF B73347494, y ubicado en Av. Europa, 2-5, 2.6, Pol. Ind. Las Salinas, 30840, Alhama de Murcia, Murcia – España.[/s]\r\n\r\n<s>Los usuarios que realicen compras en www.pccomponentes.com aceptan plenamente las presentes CGC y quedaran vinculados por estas, tal y como si fueran escritas en el momento de contratación/compra.</s>\r\n\r\n<s>Sera requisito indispensable la lectura y la aceptación de las CGC, con carácter previo a la compra de cualquier producto a través de [url]www.pccomponentes.com[/url]</s>\r\n\r\nConforme a la legislación vigente, se puede proceder a la devolución de productos, por el motivo que sea, en un plazo de 14 días naturales desde la recepción de la mercancía por el cliente. Para ello se deben cumplir las condiciones expuestas en este documento. Lo podrá hacer cumplimentando el formulario de desistimiento accediendo con su usuario y contraseña.\r\n\r\nPC COMPONENTES Y MULTIMEDIA, S.L.U. se reserva el derecho de modificar las CGC en cualquier momento y sin previo aviso. Las CGC estarán siempre accesibles a partir del sitio web, para que el usuario pueda consultarlas o imprimirlas en cualquier momento.\r\n\r\nLos precios y condiciones de venta tienen un carácter meramente informativo y pueden ser modificados en atención a las fluctuaciones del mercado. No obstante, la realización del pedido mediante la cumplimentación del formulario de compra, implica la conformidad con el precio ofertado y con las condiciones generales de venta vigentes en ese concreto momento. Una vez formalizado el pedido, se entenderá perfeccionada la compra de pleno derecho, con todas las garantías legales que amparan al consumidor adquirente y, desde ese instante, los precios y condiciones tendrán carácter contractual y no podrán ser modificados sin el expreso acuerdo de ambos contratantes. El castellano será la lengua utilizada para formalizar el contrato. El documento electrónico en que se formalice el contrato se archivará y el usuario tendrá acceso a él en su zona de cliente.', 14, 7, 1, 2, '15/10/18 - 18:53', 4, 0, 7, '15/10/18 - 18:53'),
(22, 'Envíos', 'Los plazos de entrega oscilan entre las 24 y las 72 horas a elección del cliente. No podemos garantizar estos plazos de entrega, si bien intentamos que las empresas de transporte los cumplan siempre que sea posible. En poblaciones rurales alejadas de núcleos urbanos no es posible garantizar en ningún caso la entrega en 24 horas.\r\nLos plazos de entrega dependerán de la disponibilidad de cada producto, la cual se encuentra indicada en todos y cada uno de los productos ofertados. En los pedidos que incluyan varios artículos se hará un único envío y el plazo de entrega se corresponderá con el artículo cuyo plazo de entrega sea mayor.\r\nEl cliente dispondrá de 72 horas para comprobar la integridad de todos los componentes del pedido y para comprobar que se incluye todo lo que debe en los productos incluidos. Pasadas estas 72 horas se dará por aceptado el envío y no se aceptarán reclamaciones por desperfectos o fallos con el envío.\r\nSe considerará entregado un pedido cuando sea firmado el recibo de entrega por parte del cliente. Es en las próximas 24 horas cuando el cliente debe verificar los productos a la recepción de los mismos y exponer todas las objeciones que pudiesen existir.\r\nEn caso de recibir un producto dañado por el transporte es recomendable contactarnos dentro de las primeras 24 horas para poder reclamar la incidencia a la empresa de transporte. De la misma forma es conveniente dejar constancia a la empresa de transporte:\r\nRedyser: 902 060 118\r\nTourline: 902 34 33 22\r\nSeur: 902 10 10 10\r\nCorreos (Ceuta y Melilla): 902 19 71 97\r\nPuedes consultar todo lo relativo a gastos de envío haciendo click aquí.', 14, 7, 1, 1, '15/10/18 - 18:56', 0, 0, 7, '15/10/18 - 18:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `user` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` int(1) NOT NULL DEFAULT '0' COMMENT '0=Usuario normal,  1= moderador  2=admin',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_conexion` int(80) NOT NULL DEFAULT '1539558829',
  `no_leidos` text COLLATE utf8_unicode_ci NOT NULL,
  `img_perfil` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noavatar.gif',
  `firma` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Esta es la firma de usuario',
  `rango` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Usuario',
  `edad` int(3) NOT NULL DEFAULT '18',
  `fecha_reg` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '15/10/2018',
  `biografia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Biografía del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permiso`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`, `img_perfil`, `firma`, `rango`, `edad`, `fecha_reg`, `biografia`) VALUES
(4, 'Admin', 'd41d8cd98f00b204e9800998ecf8427e', 'santysego2@gmail.com', 0, 1, '', '', '', 1539558829, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario    [url=http://google.com]URL[/url] [center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario'),
(6, 'User2', 'c0784027b45aa11e848a38e890f8416c', 'santysego@gmail.com', 2, 1, '', '', '', 1539608190, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario    [url=http://google.com]URL[/url] [center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario'),
(7, 'User3', 'c0784027b45aa11e848a38e890f8416c', 'email@email.es', 2, 1, '', '', '', 1539624300, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario  \r\n\r\n[url=http://google.com]URL[/url]\r\n[center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
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
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
