-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 21-03-2019 a las 12:03:00
-- Versión del servidor: 5.5.42
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_toro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cost_price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `name`, `cost_price`) VALUES
(1, 'Tomato', 0.5),
(2, 'Sliced mushrooms', 0.5),
(3, 'Feta cheese', 1),
(4, 'Sausages', 1),
(5, 'Sliced onion', 0.5),
(6, 'Mozzarella cheese', 1),
(7, 'Oregano', 1),
(8, 'Bacon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza`
--

CREATE TABLE `pizza` (
  `id_pizza` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizza`
--

INSERT INTO `pizza` (`id_pizza`, `name`, `img`) VALUES
(1, 'Fun Pizza', 'fun-pizza.jpg'),
(2, 'Super Mushroom Pizza', 'sausage-and-mushroom.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza_ingredients`
--

CREATE TABLE `pizza_ingredients` (
  `id_pizza_ingredient` int(11) NOT NULL,
  `id_pizza` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizza_ingredients`
--

INSERT INTO `pizza_ingredients` (`id_pizza_ingredient`, `id_pizza`, `id_ingredient`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 8),
(10, 2, 6),
(11, 2, 7),
(12, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`);

--
-- Indices de la tabla `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_pizza`);

--
-- Indices de la tabla `pizza_ingredients`
--
ALTER TABLE `pizza_ingredients`
  ADD PRIMARY KEY (`id_pizza_ingredient`),
  ADD KEY `id_ingredient` (`id_ingredient`),
  ADD KEY `id_pizza` (`id_pizza`),
  ADD KEY `id_pizza_2` (`id_pizza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pizza_ingredients`
--
ALTER TABLE `pizza_ingredients`
  MODIFY `id_pizza_ingredient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pizza_ingredients`
--
ALTER TABLE `pizza_ingredients`
  ADD CONSTRAINT `pizza_ingredients_ibfk_1` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id_pizza`),
  ADD CONSTRAINT `pizza_ingredients_ibfk_2` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id_ingredient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
