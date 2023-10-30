-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2021 a las 11:51:02
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualmarket`
--
CREATE DATABASE IF NOT EXISTS `virtualmarket` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `virtualmarket`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrador` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dniCliente`, `nombre`, `direccion`, `email`, `pwd`, `administrador`) VALUES
('1', 'Admin', 'Avda Correos 132', 'admin@midominio.es', 'Admin\r\n', 'true'),
('10', 'Victor', 'Avda Correos 132', 'victor@midominio.es', 'Victor', 'false'),
('15', 'Laura', 'C/ Admin', 'admin@gmail.com', 'Laura', 'false'),
('44444444', 'Marta', 'C/ Valeras 4', 'marta@midominio.es', 'Marta', 'false'),
('7777777', 'Miguel', 'C/Santoña15', 'manuel@midominio.es', 'Miguel', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(4) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lineaspedidos`
--

INSERT INTO `lineaspedidos` (`idPedido`, `nlinea`, `idProducto`, `cantidad`) VALUES
(1, 1, 2, 5),
(1, 2, 1, 3),
(1, 3, 3, 3),
(1, 4, 4, 3),
(2, 1, 5, 10),
(2, 2, 7, 10),
(5, 1, 5, 3),
(5, 2, 5, 3),
(5, 3, 2, 4),
(5, 4, 9, 4),
(6, 1, 1, 3),
(6, 2, 7, 2),
(6, 3, 9, 2),
(6, 4, 6, 200),
(10, 1, 6, 2),
(10, 2, 1, 2),
(10, 3, 9, 4),
(10, 4, 4, 10),
(11, 1, 11, 200),
(12, 1, 2, 3),
(12, 2, 9, 2),
(12, 3, 5, 10),
(12, 4, 4, 1),
(13, 1, 8, 3),
(13, 2, 9, 3),
(13, 3, 1, 200),
(13, 4, 3, 4),
(13, 5, 4, 10),
(14, 1, 1, 1),
(14, 2, 7, 1),
(14, 3, 8, 4),
(15, 1, 3, 1),
(15, 2, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nTarjeta` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `matriculaRepartidor` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `fecha`, `dirEntrega`, `nTarjeta`, `fechaCaducidad`, `matriculaRepartidor`, `dniCliente`) VALUES
(1, '1111-01-01', 'C/ Valeras, 22', '111111', '2020-02-02', 'pbf-1144', '10'),
(2, '2021-11-16', 'C/ Princesa, 15', '333333', '2020-02-02', 'bbc-2589', '10'),
(5, '2020-11-09', '', NULL, NULL, NULL, '10'),
(6, '1010-11-16', '', NULL, NULL, NULL, '10'),
(10, '2020-11-17', '', NULL, NULL, NULL, '15'),
(11, '2020-11-17', '', NULL, NULL, NULL, '32'),
(12, '2020-11-18', '', NULL, NULL, NULL, '15'),
(13, '2020-11-19', '', NULL, NULL, NULL, '10'),
(14, '2020-11-23', '', NULL, NULL, NULL, '10'),
(15, '2020-11-23', '', NULL, NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(6) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` enum('niño','hombre','mujer') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidades` int(5) NOT NULL,
  `precio` int(4) DEFAULT NULL
  `cantidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `foto`, `marca`, `categoria`, `unidades`, `precio`,`cantidad`) VALUES
(1, 'One million', 'Perfume singular donde se combinan notas frescas, efluvios aromáticos y especiados, sensación de fruta jugosa, pero también notas de flores, de maderas cálidas y una impronta de cuero suave.', '../public/img/oneMillion.png', 'Paco Rabanne', 'hombre', 100, 79, 200),
(2, 'Light blue', 'Una fragancia florida y frutal con salida de notas frescas y refinadas (manzana Granny Smith, cedro de Sicilia y jacintos silvestres). El corazón, muy femenino, se compone de jazmín, rosa blanca y bambú. El fondo amaderado y suave está constituido por madera de cedro, ámbar y almizcles.', '../public/img/ligthblue.png', 'Dolce & Gabanna', 'mujer', 100, 90, 200),
(3, 'Escalè a portofino', 'Un agua hespéride que se abre con “una farándula de cítricos”. La fragancia desvela luego notas de almendra amarga, de azahar, de bayas de enebro y toques amaderados de ciprés y de cedro. Un crucero olfativo en tierra italiana.', '../public/img/escale.png', 'Carolina Herrera', 'mujer', 100, 140, 125),
(4, '212', 'Con su color malva rosado, 212 desprende una estela floral con acentos orientales, realzada con toques frutales y deliciosos.', '../public/img/212.png', 'Carolina Herrera', 'mujer', 100, 83, 80),
(5, '1881 Fairplay', 'La salida fresca está hecha de notas de limón, pimienta blanca y cilantro. El corazón aromático revela una asociación de albahaca, romero y nuez moscada. El fondo, más amaderado, combina pachulí, sándalo y haba tonka.', '../public/img/1881.png', 'Cerruti', 'hombre', 100, 22, 100),
(6, 'Fideos', 'Italia', 'fideos.jpg', 'gallo', 'mujer', 100, 1, 200),
(7, 'Galletas Cuadradas', 'Francia', 'galletas.jpg', 'gullon', 'mujer', 100, 1, 200),
(8, 'Barquillos', 'España', 'barquillos.jpg', 'cuetara', 'mujer', 100, 1, 200),
(9, 'Barquillos', 'España', 'barquillos.jpg', 'cuetara', 'mujer', 100, 1, 200),
(10, 'Leche entera', 'España', 'leche.jpg', 'pascual', 'niño', 100, 1, 200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dniCliente`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`nlinea`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
