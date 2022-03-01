-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-03-2022 a las 15:13:22
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `projecto`
--
CREATE DATABASE IF NOT EXISTS `projecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `projecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_carrito` date NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `cerrado` int(11) NOT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `id_carrito` (`id_carrito`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `Nombre`, `contraseña`, `fecha_creacion`, `rol`) VALUES
(1, 'prueba1', 'prueba1', '', 0),
(2, 'prueba2', 'prueba2', '', 0),
(4, '2', '2', '', 0),
(5, '3', '3', '', 0),
(7, 'adad', 'adad', '', 0),
(8, 'a', 'b', '', 0),
(9, 'a', 'v', '', 0),
(15, '1', '2', '', 0),
(17, 'juan', 'juan', '14/0/2022', 0),
(18, 'pepe', 'pepe', '14/1/2022', 0),
(19, 'ahorasi', 'ahorasi', '14/01/2022', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_carrito`
--

CREATE TABLE IF NOT EXISTS `lineas_carrito` (
  `id_linea` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrito` int(11) NOT NULL,
  `c_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_prod` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_linea`,`id_carrito`),
  KEY `id_carrito` (`id_carrito`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miscelaneos`
--

CREATE TABLE IF NOT EXISTS `miscelaneos` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`id_cuenta`),
  UNIQUE KEY `id_cuenta` (`id_cuenta`),
  KEY `id_cuenta_2` (`id_cuenta`),
  KEY `id_cuenta_3` (`id_cuenta`),
  KEY `id_cuenta_4` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreprod` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(11,0) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `foto` longtext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombreprod`, `precio`, `descripcion`, `foto`) VALUES
(1, 'Llaves', '10', 'una llaves', 'd2FsbHBhcGVyMS5qcGc='),
(2, 'Creeper', '0', 'Cuidado un creeper', 'Q3JlZXBlci5wbmc=');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `idcuenta_carrito` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`);

--
-- Filtros para la tabla `lineas_carrito`
--
ALTER TABLE `lineas_carrito`
  ADD CONSTRAINT `lineas_productoid` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `lineas_idcarrito` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`);

--
-- Filtros para la tabla `miscelaneos`
--
ALTER TABLE `miscelaneos`
  ADD CONSTRAINT `idcuenta` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
