-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 21:54:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dream`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` smallint(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Aba'),
(2, 'Frutas'),
(3, 'Carnes'),
(4, 'Limpieza'),
(5, 'Higiene'),
(6, 'Mascotas'),
(7, 'lacteos'),
(13, 'nueva'),
(14, 'asd'),
(15, 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` smallint(5) UNSIGNED NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` float NOT NULL,
  `id_producto` smallint(5) UNSIGNED NOT NULL,
  `id_venta` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `cantidad`, `subtotal`, `id_producto`, `id_venta`) VALUES
(1, 5, 60, 2, 1),
(2, 2, 22, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` smallint(5) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `imagen`) VALUES
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, 0x30),
(24, 0x30),
(25, 0x30),
(26, 0x30),
(27, 0x30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_persona` smallint(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `salario` float NOT NULL,
  `imagen_personal` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_persona`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha`, `telefono`, `codigo_postal`, `estado`, `ciudad`, `colonia`, `salario`, `imagen_personal`, `cargo`, `sexo`) VALUES
(4, 'Emersson Rodrigo', 'Álvarez ', 'Ordinola', '11/08/2003', '1231564863', 13646, 'Veracruz ', 'Córdoba ', 'Las Almendras ', 1780.96, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691816347_64d7119bc6337.jpg', 'Cajero', 'Masculino'),
(5, 'José ', 'ap', 'am', '08/08/2008', '2139446356', 15369, 'est ', 'ciud', 'col', 17.89, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691816397_64d711cd7431a.jpg', 'cargo', 'Femenino'),
(7, 'Alicia Fernanda', 'Herrera ', 'Luna', '11/08/2003', '2722450886', 94960, 'Veracruz ', 'Atoyac ', 'Loc. La Esperanza ', 1665.38, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691735037_64d5d3fd10886.jpg', 'Cajera', 'Femenino'),
(8, 'Eder', 'Galvez', 'Cuaquehua', '11/08/1995', '9412453698', 12345, 'Veracruz ', 'Nose', 'nose', 1350.6, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691744071_64d5f747659f7.jpg', 'Cajero', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` smallint(5) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `existencia` float NOT NULL,
  `precio` float NOT NULL,
  `imagen_producto` varchar(150) NOT NULL,
  `id_categoria` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre`, `descripcion`, `existencia`, `precio`, `imagen_producto`, `id_categoria`) VALUES
(102, 'awertryghj', 'dszfdgfhg', '<dfhghj', 123, 234, 'q', 1),
(103, '123', 'testproduct', 'testproduct2', 1, 123, '', 1),
(104, '12345678qwertyhbvcdswedc', 'wadfsd', 'wad awd', 123, 0, '', 1),
(107, '34', 'dgdfgd', 'sdgdsfgdsfg', 12, 12, '', 1),
(108, '', '1', '1', 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` smallint(5) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `nombre_distribuidor` varchar(50) NOT NULL,
  `apellido_paterno_distribuidor` varchar(50) NOT NULL,
  `apellido_materno_distribuidor` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `marca`, `rfc`, `nombre_distribuidor`, `apellido_paterno_distribuidor`, `apellido_materno_distribuidor`, `telefono`, `correo_electronico`, `codigo_postal`, `estado`, `ciudad`, `colonia`) VALUES
(1, 'BOING', 'AAA123456S7Q', 'Marcos', 'Burgos', 'Aguilar', '2752563696', 'marcos@gmail.com', 56562, 'Veracruz', 'Cordoba', 'Cordoba'),
(2, 'RICOLINO', 'GGG123656VHO', 'Maria Julieta', 'Perez', 'Vivanco', '2458965471', 'mjulieta@gmail.com', 25253, 'Veracruz', 'Cordoba', 'Cordoba'),
(5, 'Marinela', 'AAA123456S7Q', 'Jorge Alberto ', 'Luna', 'Luna', '1234567890', 'alicia.fehelu@gmail.com', 42312, '42312', 'Cordoba', 'Cordoba'),
(6, 'NESTLE', 'AAA123456S7Q', 'José Manuel', 'León ', 'León ', '1234567809', 'manuel@gmail.com', 12345, '12345', 'Orizaba ', 'Las Lomas'),
(7, 'GAMESA', 'JAK123456DKDK', 'jsjssj', 'dndn', 'dndn', '1234567890', 'alicia.fehelu@gmail.com', 12345, '12345', 'jdsj', 'jswj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` smallint(5) UNSIGNED NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `estado`) VALUES
(1, 'Administrador', 'Activo'),
(2, 'Empleado', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(5) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_persona` smallint(5) NOT NULL,
  `id_rol` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`, `id_persona`, `id_rol`) VALUES
(2, 'Jose', 'milian', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_persona` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
