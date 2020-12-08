-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2020 a las 05:09:57
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `magiccomponentsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_comprador` varchar(20) NOT NULL,
  `ID_producto` varchar(4) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID_comprador`, `ID_producto`, `Cantidad`, `Total`) VALUES
('MKaiju', '1345', 7, 10500),
('MKaiju', '1547', 14, 140000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `ID_Registro` int(4) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contraseña` varchar(12) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`ID_Registro`, `Nombres`, `Apellidos`, `Email`, `Usuario`, `Contraseña`, `Telefono`) VALUES
(1, 'Luis', 'Ibarra', 'luisibarra@gmail.com', 'LuisIbarra', 'Luis123', 713313131),
(1010, 'Admin', 'Admin', 'admin@gmail.com', 'Admin', '0000', 0),
(1013, 'Mario Alberto', 'Vázquez Anaya', 'marioavazquez2011@hotmail.com', 'MarioKaiju', 'Gearsofwar3', 2147483647),
(1014, 'Mario Alberto', 'Vázquez Anaya', 'marioavazquez2011@gmail.com', 'MKaiju', 'Gearsofwar3', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `ID` varchar(4) NOT NULL,
  `nombre_producto` text NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`ID`, `nombre_producto`, `precio`, `cantidad`) VALUES
('1345', 'Mouse Logitech g203 RGB', 1500, 24),
('1547', 'Intel Core I9', 10000, 7),
('4539', 'Monitor Gigabyte 4K', 6500, 8),
('7812', 'Disco duro de estado sólido SanDisk', 1600, 29),
('9414', 'Teclado mecánico RGB Hyper X', 1200, 18),
('9471', 'Headset Hyper X Cloud', 2500, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_producto`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`ID_Registro`),
  ADD UNIQUE KEY `ID_Registro` (`ID_Registro`) USING BTREE,
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `ID_Registro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Id_producto` FOREIGN KEY (`ID_producto`) REFERENCES `stock` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
