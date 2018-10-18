-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2018 a las 00:03:21
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
(12, 'Cat 1'),
(13, 'Cat 2'),
(14, 'Cat 3');

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
(1, 1539813202);

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
(20, 'Foro 1 (CAT1)', 'Descripción Foro 1 (CAT1)', 1, 1, 12, 1, 'tema 2', 7),
(21, 'Foro 2 (CAT1)', 'Descripción Foro 2 (CAT1)', 0, 0, 12, 1, '', 0),
(22, 'Foro 3 (CAT1)', 'Descripción Foro 3 (CAT1)', 0, 0, 12, 1, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` bigint(255) NOT NULL,
  `id_dueno` bigint(255) NOT NULL,
  `id_tema` bigint(255) NOT NULL,
  `id_foro` bigint(255) NOT NULL,
  `contenido` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado 0 es cerrado 1 abierto',
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
(7, 'tema 2  EDITADO', 'BBCode\r\n- <b>Negrita</b>\r\n- <u>Subrayar</u>\r\n- <i>Cursiva</i>\r\n- <s>Tachado</s>\r\n- <span style="font-size: 18px;">Tamaño 18</span>\r\n- <span style="color: "coral";">Coral</span>\r\n- <span style="font-family: "Wingdings";">Wingdings</span>\r\n- <img src="imagen.jpg" />\r\n- [url]http://google.com[/url]\r\n- [quote="James"]Texto que quiero citar.[/quote]\r\n- <h1>Cursiva</h1>\r\n- <h2>Cursiva</h2>DSGV\r\n- <h3>Cursiva</h3>\r\n- <h4>Cursiva</h4>\r\n- <h5>Cursiva</h5>\r\n- <h6>Cursiva</h6>', 20, 4, 1, 1, '17/10/18 - 23:51', 3, 0, 4, '17/10/18 - 23:51');

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
  `biografia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Biografía del usuario.',
  `mensajes` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permiso`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`, `img_perfil`, `firma`, `rango`, `edad`, `fecha_reg`, `biografia`, `mensajes`) VALUES
(4, 'User1', 'c0784027b45aa11e848a38e890f8416c', 'santysego2@gmail.com', 2, 1, '', '', '', 1539813202, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario    [url=http://google.com]URL[/url] [center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario', 1),
(6, 'User2', 'c0784027b45aa11e848a38e890f8416c', 'santysego@gmail.com', 1, 1, '', '', '', 1539734300, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario    [url=http://google.com]URL[/url] [center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario', 0),
(7, 'User3', 'c0784027b45aa11e848a38e890f8416c', 'email@email.es', 0, 1, '', '', '', 1539637991, '', 'noavatar.gif', 'Esta es la [b]firma[/b] del usuario  \r\n\r\n[url=http://google.com]URL[/url]\r\n[center][img]http://i65.tinypic.com/2ryg9pg.png[/img][/center]', 'Usuario', 18, '15/10/2018', 'Esta es la biografia del usuario', 0);

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
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
