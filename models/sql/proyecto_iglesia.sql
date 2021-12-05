-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2021 a las 00:19:44
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_iglesia`
--
CREATE DATABASE IF NOT EXISTS `proyecto_iglesia` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto_iglesia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comedor`
--

CREATE TABLE `comedor` (
  `id_comedor` int(11) NOT NULL,
  `nom_comedor` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `status_comedor` tinyint(4) NOT NULL,
  `created_comedor` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comedor`
--

INSERT INTO `comedor` (`id_comedor`, `nom_comedor`, `status_comedor`, `created_comedor`) VALUES
(1, 'Comedor de la iglesia', 1, '2021-11-22 18:36:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario`
--

CREATE TABLE `detalle_inventario` (
  `product_id_ope` int(11) NOT NULL,
  `invent_id_ope` int(11) NOT NULL,
  `fecha_vencimiento_ope` datetime DEFAULT NULL,
  `precio_product_ope` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_inventario`
--

INSERT INTO `detalle_inventario` (`product_id_ope`, `invent_id_ope`, `fecha_vencimiento_ope`, `precio_product_ope`) VALUES
(1, 1, '2021-12-22 00:00:00', 1000),
(1, 2, '2021-12-16 00:00:00', 100),
(1, 3, '2021-12-16 00:00:00', 2.57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nom_grupo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `status_grupo` tinyint(4) NOT NULL,
  `created_grupo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nom_grupo`, `status_grupo`, `created_grupo`) VALUES
(3, 'HARINASFFF', 1, '2021-11-03 20:43:11'),
(19, 'ENLATADOS', 1, '2021-11-24 11:19:48'),
(20, 'FRUTAS', 1, '2021-11-24 11:19:56'),
(21, 'VERDURAS', 1, '2021-11-24 11:20:08'),
(22, 'BEBIDAS', 1, '2021-11-24 11:20:30'),
(23, 'GHJGHJGHGHJGHJGJ', 1, '2021-12-02 10:12:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_invent` int(11) NOT NULL,
  `orden_invent` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_invent` int(11) NOT NULL,
  `status_invent` tinyint(4) NOT NULL,
  `created_invent` datetime DEFAULT NULL,
  `type_operacion_invent` enum('E','S') COLLATE utf8_spanish_ci NOT NULL,
  `concept_invent` enum('C','D','O','V','R') COLLATE utf8_spanish_ci DEFAULT NULL,
  `person_id_invent` int(11) DEFAULT NULL,
  `comedor_id_invent` int(11) NOT NULL,
  `user_id_invent` int(11) NOT NULL,
  `observacion_invent` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_invent`, `orden_invent`, `cantidad_invent`, `status_invent`, `created_invent`, `type_operacion_invent`, `concept_invent`, `person_id_invent`, `comedor_id_invent`, `user_id_invent`, `observacion_invent`) VALUES
(1, '654646464', 8, 1, '2021-12-05 18:39:44', 'E', 'D', 1, 1, 1, 'FASDFASDFASDFADSFASDFASDFA'),
(2, '4654654', 5, 1, '2021-12-05 18:44:02', 'E', 'C', 1, 1, 1, 'FASDFASDFASDFASDF'),
(3, '523523452', 7, 1, '2021-12-05 19:15:09', 'E', 'C', 1, 1, 1, 'FASDFASDFASDFASDFASDFADS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nom_marca` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `status_marca` tinyint(4) NOT NULL,
  `created_marca` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nom_marca`, `status_marca`, `created_marca`) VALUES
(2, 'POLAR', 1, '2021-11-16 22:31:47'),
(3, 'MASECA', 1, '2021-11-16 22:32:00'),
(4, 'PEPSI', 1, '2021-11-24 11:20:50'),
(5, 'COCACOLA', 1, '2021-11-24 11:20:58'),
(6, 'SIN MARCA', 1, '2021-11-24 11:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_alimentos`
--

CREATE TABLE `menu_alimentos` (
  `id_product` int(11) NOT NULL,
  `nom_product` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `med_product` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `valor_product` double NOT NULL,
  `status_product` tinyint(4) NOT NULL,
  `created_product` datetime NOT NULL,
  `stock_product` int(11) NOT NULL,
  `marca_id_product` int(11) NOT NULL,
  `grupo_id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu_alimentos`
--

INSERT INTO `menu_alimentos` (`id_product`, `nom_product`, `med_product`, `valor_product`, `status_product`, `created_product`, `stock_product`, `marca_id_product`, `grupo_id_product`) VALUES
(1, 'HARINA DE MAIZ ', 'KL', 1, 1, '2021-12-05 18:38:54', 12, 3, 3),
(2, 'REFRESCO', 'LT', 1, 1, '2021-12-05 18:57:24', 0, 2, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_person` int(11) NOT NULL,
  `cedula_person` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_person` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nom_person` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `sexo_person` enum('F','M') COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_movil_person` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_casa_person` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion_person` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `correo_person` varchar(130) COLLATE utf8_spanish_ci DEFAULT NULL,
  `if_proveedor` tinyint(1) NOT NULL,
  `if_user` tinyint(1) NOT NULL,
  `status_person` tinyint(1) NOT NULL,
  `created_person` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_person`, `cedula_person`, `tipo_person`, `nom_person`, `sexo_person`, `telefono_movil_person`, `telefono_casa_person`, `direccion_person`, `correo_person`, `if_proveedor`, `if_user`, `status_person`, `created_person`) VALUES
(1, '26587968', 'V', 'ALFREDO MENDEZ', 'M', '0424 5198398', '', 'GASGSDFGSDFGSDFGSDFGSDFGSFGD', 'MENDEZ23_FASDFASD@GMAIL.COM', 1, 1, 1, '2021-11-18 22:38:38'),
(2, '14887880', 'V', 'ALFONSO MEDINA', 'M', '0424 5589669', '0255 6846698', 'FFASDFASDFASDFASDFASDFASDFASDFASDFASDF', 'ALFONSOMEDINA23@GMAIL.COM', 1, 0, 1, '2021-11-24 09:59:47'),
(3, '30400100', 'V', 'RONALDO PEREZ', 'M', '0424 5198396', '', 'FASDFASDFASDFASDFASDFASDFASDF', 'FASDFASDFASDFADS@GMAIL.COM', 0, 1, 1, '2021-12-05 10:58:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `nom_rol` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_permisos_rol` int(11) NOT NULL,
  `status_rol` tinyint(1) NOT NULL,
  `created_rol` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles_usuario`
--

INSERT INTO `roles_usuario` (`id`, `nom_rol`, `nivel_permisos_rol`, `status_rol`, `created_rol`) VALUES
(1, 'SUPER ADMIN', 3, 1, '2021-12-02 00:00:00'),
(2, 'ADMIN', 2, 1, '2021-12-02 00:00:00'),
(3, 'GENERAL', 1, 1, '2021-12-05 16:28:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `person_id_user` int(11) NOT NULL,
  `password_user` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `created_user` datetime NOT NULL,
  `pregun1_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pregun2_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta1_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta2_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `person_id_user`, `password_user`, `status_user`, `id_rol`, `created_user`, `pregun1_user`, `pregun2_user`, `respuesta1_user`, `respuesta2_user`) VALUES
(1, 1, '$2y$12$pjpx67b6tIofE81f5S773OSscmB3W6g/A3Iubx5V8uFJk8uN7t5ci', 1, 1, '2021-11-23 02:08:10', 'nada', 'nada', 'nada', 'nada'),
(2, 3, '$2y$12$GJZI2qWrdzg3r4XGpjA8zuiEkR7Hd.IOpj10EKxr7oQHqtIB2Cfo2', 1, 3, '2021-12-05 11:08:09', 'nada', 'nada', 'nada', 'nada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comedor`
--
ALTER TABLE `comedor`
  ADD PRIMARY KEY (`id_comedor`);

--
-- Indices de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  ADD KEY `product_id_ope` (`product_id_ope`),
  ADD KEY `invent_id_ope` (`invent_id_ope`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_invent`),
  ADD KEY `person_id_invent` (`person_id_invent`),
  ADD KEY `comedor_id_invent` (`comedor_id_invent`),
  ADD KEY `user_id_invent` (`user_id_invent`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `menu_alimentos`
--
ALTER TABLE `menu_alimentos`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `marca_id_product` (`marca_id_product`),
  ADD KEY `grupo_id_product` (`grupo_id_product`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `cedula_person` (`cedula_person`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `person_id_user` (`person_id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comedor`
--
ALTER TABLE `comedor`
  MODIFY `id_comedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_invent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu_alimentos`
--
ALTER TABLE `menu_alimentos`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  ADD CONSTRAINT `detalle_inventario_ibfk_1` FOREIGN KEY (`product_id_ope`) REFERENCES `menu_alimentos` (`id_product`),
  ADD CONSTRAINT `detalle_inventario_ibfk_2` FOREIGN KEY (`invent_id_ope`) REFERENCES `inventario` (`id_invent`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`person_id_invent`) REFERENCES `personas` (`id_person`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`comedor_id_invent`) REFERENCES `comedor` (`id_comedor`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`user_id_invent`) REFERENCES `usuarios` (`id_user`);

--
-- Filtros para la tabla `menu_alimentos`
--
ALTER TABLE `menu_alimentos`
  ADD CONSTRAINT `menu_alimentos_ibfk_1` FOREIGN KEY (`marca_id_product`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `menu_alimentos_ibfk_2` FOREIGN KEY (`grupo_id_product`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `roles_fk` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuario` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`person_id_user`) REFERENCES `personas` (`id_person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
