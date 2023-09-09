-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-08-2020 a las 14:08:01
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS u326062959_listasuper;
USE u326062959_listasuper;

--
-- Base de datos: `u326062959_listasuper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listasuper`
--

CREATE TABLE `listasuper` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `preciounitario` decimal(65,2) NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `listasuper`
--

INSERT INTO `listasuper` (`id`, `nombre`, `cantidad`, `preciounitario`, `user`, `comprado`) VALUES
(113, 'Merca', 200, '0.00', 'gwar', ''),
(147, 'Leche', 6, '0.00', 'Diego88', ''),
(149, 'azucar', 1, '0.00', 'Natalia', ''),
(380, 'Caca de koki', 0, '0.00', 'zendell', ''),
(555, 'coco rallado', 1, '0.00', 'Natalia', ''),
(556, 'manteca', 1, '0.00', 'Natalia', ''),
(557, 'yogur', 1, '0.00', 'Natalia', ''),
(558, 'crema', 1, '0.00', 'Natalia', ''),
(559, 'lavandina', 1, '0.00', 'Natalia', ''),
(560, 'virulana', 1, '0.00', 'Natalia', ''),
(561, 'esponja', 1, '0.00', 'Natalia', ''),
(562, 'caja de torta', 1, '0.00', 'Natalia', ''),
(563, 'tapitas de alfajores', 1, '0.00', 'Natalia', ''),
(567, 'Leche', 3, '200.00', 'Agustinpochelu', 'activo'),
(758, 'caca', 1, '0.00', 'guille2', 'activo'),
(759, 'a', 1, '0.00', 'guille2', 'activo'),
(760, 'a', 1, '0.00', 'guille2', 'activo'),
(761, 'pera', 1, '0.00', 'guille2', 'activo'),
(793, 'Leche', 1, '0.00', 'crispas1', ''),
(804, 'Latas cerveza ', 2, '238.00', 'cristianbdb', ''),
(808, 'Fernet', 1, '349.00', 'cristianbdb', ''),
(814, 'Compu ', 1, '0.00', 'Lautaro Adrian Rios', ''),
(820, 'Drogas varias', 1, '0.00', 'Nicolas Baron', ''),
(898, 'gelatinas', 4, '0.00', 'Mary', ''),
(903, 'Tes', 12, '0.00', 'Paulo', 'activo'),
(910, 'servilletas', 1, '0.00', 'Mary', ''),
(911, 'broches para engrampador 24/6', 1, '0.00', 'Mary', ''),
(912, 'papel higienico', 4, '0.00', 'Mary', ''),
(913, 'amargo', 3, '0.00', 'Mary', ''),
(914, 'espirales', 1, '0.00', 'Mary', ''),
(915, 'cif', 1, '0.00', 'Mary', ''),
(920, 'Pasta larga', 3, '0.00', 'Carloserr', 'activo'),
(921, 'Pasta corta ', 3, '0.00', 'Carloserr', 'activo'),
(922, 'Azucar', 3, '0.00', 'Carloserr', 'activo'),
(923, 'Harina de trigo', 2, '0.00', 'Carloserr', 'activo'),
(924, 'Granos', 2, '0.00', 'Carloserr', ''),
(925, 'Aceite', 1, '0.00', 'Carloserr', 'activo'),
(926, 'Cafe', 1, '0.00', 'Carloserr', 'activo'),
(927, 'Pollo', 1, '0.00', 'Carloserr', ''),
(928, 'Carne', 1, '0.00', 'Carloserr', ''),
(929, 'Jabon', 2, '0.00', 'Carloserr', 'activo'),
(930, 'Desodorante', 2, '0.00', 'Carloserr', 'activo'),
(931, 'Pasta dental', 2, '0.00', 'Carloserr', 'activo'),
(932, 'Crema', 1, '0.00', 'Carloserr', 'activo'),
(933, 'Afeitadoras', 1, '0.00', 'Carloserr', ''),
(967, 'leche', 2, '1500.00', 'cesar', 'activo'),
(969, 'cafe dolca', 1, '1500.00', 'cesar', 'activo'),
(1003, 'leche entera', 1, '0.00', 'alelazcano', ''),
(1004, 'pan rallado', 12, '0.00', 'alelazcano', ''),
(1035, 'qwertyu', 1, '0.00', 'Jack Andersonn', ''),
(1044, 'Tirabuzon', 3, '28.00', 'Cristian Basso', ''),
(1045, 'Rollo de papel', 1, '50.00', 'Cristian Basso', ''),
(1046, 'Papel higinico', 4, '50.00', 'Cristian Basso', ''),
(1047, 'Jabon liquido', 1, '66.80', 'Cristian Basso', ''),
(1048, 'Papas', 1, '119.00', 'Cristian Basso', ''),
(1049, 'Cerveza', 1, '290.00', 'Cristian Basso', ''),
(1050, 'Salchichas', 3, '36.90', 'Cristian Basso', ''),
(1051, 'Tofi', 1, '146.20', 'Cristian Basso', ''),
(1052, 'Yogur', 2, '53.00', 'Cristian Basso', ''),
(1053, 'Pescao', 1, '183.00', 'Cristian Basso', ''),
(1054, 'Hamburguesas', 2, '52.90', 'Cristian Basso', ''),
(1055, 'Matecocido', 1, '65.00', 'Cristian Basso', ''),
(1056, 'Cafe', 1, '230.39', 'Cristian Basso', ''),
(1057, 'Chocolatada', 1, '34.00', 'Cristian Basso', ''),
(1058, 'Mermelada', 1, '100.00', 'Cristian Basso', ''),
(1059, 'Polenta', 1, '72.80', 'Cristian Basso', ''),
(1060, 'Arroz', 3, '68.00', 'Cristian Basso', ''),
(1061, 'Pure de tomate ', 4, '31.99', 'Cristian Basso', ''),
(1062, 'Spagetti', 3, '28.78', 'Cristian Basso', ''),
(1063, 'Sal', 2, '30.90', 'Cristian Basso', ''),
(1064, 'Pollo', 1, '206.00', 'Cristian Basso', ''),
(1065, 'Costeletas', 1, '138.00', 'Cristian Basso', ''),
(1066, 'Bifed', 1, '210.13', 'Cristian Basso', ''),
(1067, 'Bifes2', 1, '239.40', 'Cristian Basso', ''),
(1068, 'Jabon asepxia', 1, '192.00', 'Cristian Basso', ''),
(1069, 'lipstick', 2, '0.00', 'Patricia Shepardberg', ''),
(1070, 'er', 3, '0.00', 'Donna Bowerssen', ''),
(1071, 'bat', 2, '23.00', 'Donna Bowerssen', ''),
(1072, 'icecream', 23, '22.00', 'Donna Bowerssen', ''),
(1074, 'Pqn', 1, '0.00', 'guille', ''),
(1076, 'Dentrifico', 2, '0.00', 'guille', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userfb` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idfb` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `pass`, `foto`, `userfb`, `idfb`) VALUES
(1, 'guille', 'guille', '', '', ''),
(4, 'cristianbdb', '3512149481', '', '', ''),
(5, 'Skun', 'kokipetero', '', '', ''),
(6, 'crispas1', 'koki', '', '', ''),
(7, 'gwar', 'kokiputo', '', '', ''),
(8, 'AgustinPochelu', '525125', '', '', ''),
(9, 'payasobrondo', 'sts107', '', '', ''),
(11, 'Agos', 'rulitomacarena', '', '', ''),
(12, 'Diego88', 'asd321', '', '', ''),
(13, 'Natalia', 'lala4', '', '', ''),
(14, 'julieta', 'bruno1908', '', '', ''),
(15, 'gallego', 'koki', '', '', ''),
(16, 'Dani', '123456', '', '', ''),
(26, 'NicoTejeda', 'Nico6426', '', '', ''),
(28, 'zendell', 'macgerva2019', '', '', ''),
(29, 'uebeats', '123456', '', '', ''),
(30, 'Diego', '321asd', '', '', ''),
(32, 'mary', 'mary', '', '', ''),
(35, 'Guille Peralta', '', '', 'Guille Peralta', '3123153501038372'),
(42, 'Agos Brunetti', '', '', 'Agos Brunetti', '2776049525794177'),
(43, 'Agustin Pochelu', '', '', 'Agustin Pochelu', '10221332367122647'),
(44, 'Cristian Grillo', '', '', 'Cristian Grillo', '3334470033291515'),
(45, 'Lautaro Adrian Rios', '', '', 'Lautaro Adrian Rios', '2976504202384060'),
(46, 'Skun Karg', '', '', 'Skun Karg', '505040496790001'),
(47, 'Martin Brondo', '', '', 'Martin Brondo', '10162925413845154'),
(48, 'Daniel Espindola Carp', '', '', 'Daniel Espindola Carp', '3932197580131152'),
(49, 'Nicolas Baron', '', '', 'Nicolas Baron', '2830808963609239'),
(50, 'Cristian Basso', '', '', 'Cristian Basso', '1528371680661971'),
(51, 'Joao Junior Cardoso', '', '', 'Joao Junior Cardoso', '2984202678279335'),
(52, 'Paulo', 'hidro4321', '', '', ''),
(53, 'Carloserr', '96026851', '', '', ''),
(54, 'Memi', 'lisandro162017', '', '', ''),
(55, 'cesar', 'pepepepe', '', '', ''),
(56, 'alelazcano', '123456', '', '', ''),
(57, 'Jack Andersonn', '', '', 'Jack Andersonn', '10150083731371414'),
(58, 'Patricia Shepardberg', '', '', 'Patricia Shepardberg', '10150000494034898'),
(59, 'Donna Bowerssen', '', '', 'Donna Bowerssen', '10150000495444460');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listasuper`
--
ALTER TABLE `listasuper`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listasuper`
--
ALTER TABLE `listasuper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1077;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
