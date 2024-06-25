-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 02:14:22
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `telo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `numero` int(23) NOT NULL,
  `tipo` varchar(23) NOT NULL,
  `precio` int(23) NOT NULL,
  `capacidad` int(23) NOT NULL,
  `estado` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`numero`, `tipo`, `precio`, `capacidad`, `estado`) VALUES
(3, 'Con terraza', 3000, 4, 'libre'),
(34, 'Con terraza', 3000, 4, 'ocupado'),
(35, 'suite', 7000, 10, 'ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReservas` int(23) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `nombreHuesped` varchar(23) NOT NULL,
  `numero` int(23) NOT NULL,
  `apellido` varchar(23) NOT NULL,
  `mail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReservas`, `fechaEntrada`, `fechaSalida`, `nombreHuesped`, `numero`, `apellido`, `mail`) VALUES
(1, '2024-06-05', '2024-06-08', 'pato', 0, '', ''),
(123, '2024-06-05', '2024-06-08', 'pato', 3, '', ''),
(132, '2024-05-31', '2024-06-09', 'grodo culkia', 3, '', ''),
(133, '2024-05-31', '2024-06-23', 'grodo culkia', 3, '', ''),
(134, '2024-05-31', '2024-06-30', 'pato', 345345, '', ''),
(135, '2024-06-07', '2024-06-02', 'grodo culkia', 34, '', ''),
(136, '2024-05-31', '2024-05-31', 'pato', 34, '', ''),
(137, '2024-05-30', '2024-05-31', 'grodo culkia', 34, '', ''),
(138, '2024-05-31', '2024-06-15', '56565', 565, '', ''),
(139, '2024-05-30', '2024-06-01', 'grodo culkia', 345345, '', ''),
(140, '2024-06-15', '2024-06-29', 'grodo culkia', 34, '', ''),
(141, '2024-05-31', '2024-06-09', 'pato', 34, '', ''),
(142, '2024-06-07', '2024-06-07', 'grodo culkia', 34, '', ''),
(143, '2024-06-07', '2024-06-07', 'pato', 34, '', ''),
(144, '2024-06-07', '2024-06-01', 'grodo culkia', 3, '', ''),
(145, '2024-05-31', '2024-06-02', 'pato', 34, 'rodri', 'pato@gmail.com'),
(146, '2024-05-31', '2024-05-31', 'pato', 35, 'rodri', 'pato@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReservas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `numero` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReservas` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
