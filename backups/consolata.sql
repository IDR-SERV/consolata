-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2017 a las 20:51:31
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consolata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE `espacio` (
  `id` int(11) NOT NULL,
  `glosa_espacio` varchar(100) DEFAULT NULL,
  `capacidad` int(4) DEFAULT NULL,
  `id_prm_tipo` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_noticia`
--

CREATE TABLE `imagen_noticia` (
  `id` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilino`
--

CREATE TABLE `inquilino` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(70) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_prm_sexo` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilino_espacio`
--

CREATE TABLE `inquilino_espacio` (
  `id` int(11) NOT NULL,
  `id_inquilino` int(11) DEFAULT NULL,
  `id_espacio` int(11) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_bienvenida`
--

CREATE TABLE `mensajes_bienvenida` (
  `id` int(11) NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mensaje` text COLLATE utf8_spanish_ci,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes_bienvenida`
--

INSERT INTO `mensajes_bienvenida` (`id`, `imagen`, `mensaje`, `created`, `updated`) VALUES
(1, 'Cristo.png', 'No tengais miedo', '2017-01-28 17:31:41', '0000-00-00 00:00:00'),
(2, 'PapaFrancisco.png', 'Estamos llamados a formar las conciencias, pero no a pretender sustiruirlas', '2017-01-28 17:31:41', '0000-00-00 00:00:00'),
(3, 'sanFelipeNeri.jpg', 'En la Comunión debemos pedir la curación de aquel vicio a que estamos sujetos', '2017-02-09 00:00:00', NULL),
(4, 'sanJuanPabloII.jpg', 'La peor prisión es un corazón cerrado', '2017-02-09 00:00:00', NULL),
(5, 'sanJosemariaEscriva.jpg', 'Sin la oración, pasan y pesan más cosas', '2017-02-09 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `clase` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `order_menu` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `parentId`, `path`, `clase`, `icon`, `order_menu`) VALUES
(1, 'Escritorio', NULL, NULL, 'glyphicon glyphicon-dashboard', NULL, 1),
(2, 'Gestión', NULL, NULL, 'glyphicon glyphicon-th-large', NULL, 2),
(3, 'Noticias', 2, 'noticias', 'glyphicon glyphicon-info-sign', NULL, 1),
(4, 'Galería', 2, NULL, 'glyphicon glyphicon-picture', NULL, 3),
(6, 'Usuarios', 2, 'usuario', 'glyphicon glyphicon-user', NULL, 2),
(7, 'Artículos', 1, NULL, 'glyphicon glyphicon-th-list', NULL, 1),
(8, 'Solicitudes', 1, 'solicitud', 'glyphicon glyphicon-shopping-cart', NULL, 2),
(9, 'Apostolado', NULL, '', 'glyphicon glyphicon-globe', NULL, 3),
(10, 'Catequesis', 9, '#', 'glyphicon glyphicon-book', NULL, 1),
(11, 'Homilías', 9, '#', 'glyphicon glyphicon-book', NULL, 2),
(12, 'Eucaristía', 9, '#', 'glyphicon glyphicon-book', NULL, 3),
(13, 'Confesiones', 9, '#', 'glyphicon glyphicon-book', NULL, 4),
(14, 'Comedor', 9, '#', 'glyphicon glyphicon-book', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_29_021005_tb_permiso', 1),
('2016_11_29_022107_tb_perfil', 1),
('2016_11_29_022725_tb_seccion', 1),
('2016_11_29_023032_tb_menu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `nombre`, `created`, `updated`) VALUES
(1, 'ADMINISTRADOR', '2017-01-28 17:37:11', NULL),
(2, 'EDITOR', '2017-02-11 00:00:00', NULL),
(3, 'LECTOR', '2017-04-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_menu`
--

CREATE TABLE `nivel_menu` (
  `id` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_menu`
--

INSERT INTO `nivel_menu` (`id`, `id_nivel`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 1, 6),
(10, 1, 7),
(11, 1, 8),
(12, 2, 7),
(13, 2, 8),
(14, 3, 7),
(15, 3, 8),
(16, 1, 9),
(17, 1, 10),
(18, 1, 11),
(19, 1, 12),
(20, 1, 13),
(21, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` text,
  `id_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `contenido`, `id_usuario`, `imagen`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(15, 'Prueba de noticias', 'Se probó el crud completo de las noticias. Además se probó la edición de fotos y el redireccionamiento desde el formulario de edición de noticias. Adicionalmente, se validó que, en caso de que no haya post en el formilario, el método en el controlador no se ejecute. ', 1, 'MiHija.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prm_sexo`
--

CREATE TABLE `prm_sexo` (
  `id` int(11) NOT NULL,
  `glosa_sexo` varchar(20) DEFAULT NULL,
  `abrev_sexo` varchar(5) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prm_sexo`
--

INSERT INTO `prm_sexo` (`id`, `glosa_sexo`, `abrev_sexo`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'FEMENINO', 'F', '2017-03-31 10:00:00', NULL),
(2, 'MASCULINO', 'M', '2017-03-31 12:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prm_tipo`
--

CREATE TABLE `prm_tipo` (
  `id` int(11) NOT NULL,
  `glosa_tipo` varchar(100) DEFAULT NULL,
  `restriccion_sexo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `glosa_servicio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `glosa_servicio`) VALUES
(1, 'CONVIVENCIAS'),
(2, 'RETIROS'),
(3, 'CHARLAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `id_usuario_solicitante` int(11) DEFAULT NULL,
  `id_usuario_validador` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `cantidad_personas` int(11) DEFAULT NULL,
  `parroquia` varchar(150) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `id` int(10) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` datetime DEFAULT '0000-00-00 00:00:00',
  `foto_perfil` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle_biografia` text COLLATE utf8_spanish_ci,
  `usuario_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_perfil`
--

INSERT INTO `tb_perfil` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `foto_perfil`, `detalle_biografia`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'JEMEL', 'DAVALILLO', '1982-02-10 00:00:00', 'foto.png', 'DESARROLLADOR WEB', 1, '2017-01-28 03:00:00', '0000-00-00 00:00:00'),
(2, 'SAMIR ', 'CASTILLO', '1981-05-05 00:00:00', 'Lion_-_o.png', 'ING. ELECTRONICO', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nick` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_id` int(11) NOT NULL,
  `activado` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `nick`, `pass`, `nivel_id`, `activado`, `created`, `updated`) VALUES
(1, 'JEMEL.DAVALILLO@GMAIL.COM', 'J21D', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '2017-01-28 17:31:41', '0000-00-00 00:00:00'),
(2, 'cuantico56@gmail.com', 'MIN', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, '2017-01-28 00:00:00', '2017-04-07 03:43:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_noticia`
--
ALTER TABLE `imagen_noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inquilino_espacio`
--
ALTER TABLE `inquilino_espacio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_bienvenida`
--
ALTER TABLE `mensajes_bienvenida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_menu`
--
ALTER TABLE `nivel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `prm_sexo`
--
ALTER TABLE `prm_sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prm_tipo`
--
ALTER TABLE `prm_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario_validador` (`id_usuario_validador`),
  ADD KEY `id_usuario_solicitante` (`id_usuario_solicitante`);

--
-- Indices de la tabla `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `usuario_ibfk_1` (`nivel_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen_noticia`
--
ALTER TABLE `imagen_noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inquilino_espacio`
--
ALTER TABLE `inquilino_espacio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes_bienvenida`
--
ALTER TABLE `mensajes_bienvenida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `nivel_menu`
--
ALTER TABLE `nivel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `prm_sexo`
--
ALTER TABLE `prm_sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prm_tipo`
--
ALTER TABLE `prm_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_noticia`
--
ALTER TABLE `imagen_noticia`
  ADD CONSTRAINT `imagen_noticia_ibfk_1` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD CONSTRAINT `tb_perfil_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
