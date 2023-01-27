-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-01-2023 a las 20:22:51
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommercephp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE IF NOT EXISTS `ordenes` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tarjeta` int(11) NOT NULL,
  `costo_envio` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `numero_de_cuotas` int(11) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `id_producto`, `precio`, `id_usuario`, `tarjeta`, `costo_envio`, `total`, `cantidad`, `numero_de_cuotas`) VALUES
(1, 1, 1000, 1, 2, 1000, 1000, 3, 1000),
(2, 1, 2000, 1, 2, 0, 2780, 3, 3),
(3, 1, 2000, 1, 2, 0, 2780, 3, 3),
(4, 1, 2000, 3, 2, 0, 2780, 6, 3),
(5, 1, 2000, 3, 2, 0, 2780, 6, 3),
(6, 1, 2000, 3, 2, 0, 2780, 6, 3),
(7, 1, 2000, 3, 2, 0, 2780, 6, 3),
(8, 1, 2000, 3, 2, 0, 2780, 6, 3),
(9, 1, 2000, 3, 2, 0, 2780, 6, 3),
(10, 1, 2000, 3, 2, 0, 2780, 6, 3),
(11, 1, 2000, 3, 2, 0, 2780, 6, 3),
(12, 1, 2000, 3, 2, 0, 2780, 6, 3),
(13, 1, 2000, 3, 2, 0, 2780, 6, 3),
(14, 1, 2000, 3, 2, 0, 2780, 6, 3),
(15, 1, 2000, 3, 2, 0, 2780, 6, 3),
(16, 2, 2000, 3, 2, 0, 2780, 6, 3),
(17, 2, 2000, 3, 2, 0, 2780, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productTitle` text NOT NULL,
  `productPrice` text NOT NULL,
  `productImage` text NOT NULL,
  `productoDescription` text,
  `productCategory` text NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`productId`, `productTitle`, `productPrice`, `productImage`, `productoDescription`, `productCategory`) VALUES
(1, 'Camiseta Argentina', '1000', 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes'),
(2, 'Camiseta Argentina', '1000', 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes'),
(3, 'Camiseta Argentina', '1000', 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes'),
(4, 'Camiseta Argentina', '1000', 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes'),
(5, 'Camiseta Argentina', '1000', 'img/camiseta.jpg', 'La camiseta titular del equipo campeon', 'Deportes'),
(6, '', '', '', NULL, ''),
(7, '', '', '', NULL, ''),
(8, '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
CREATE TABLE IF NOT EXISTS `tarjetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `marca`) VALUES
(1, 'Master Card'),
(2, 'AMEX'),
(3, 'Uala'),
(4, 'Visa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
