-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-09-2020 a las 13:20:44
-- Versión del servidor: 10.3.24-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logocl_dbstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ps_intolerance_allergy`
--

CREATE TABLE `ps_intolerance_allergy` (
  `id` int(10) UNSIGNED NOT NULL,
  `intolerance_allergy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ps_intolerance_allergy`
--

INSERT INTO `ps_intolerance_allergy` (`id`, `intolerance_allergy`) VALUES
  (1, 'ALIMENTOS'),
  (2, 'CHOCOLATES'),
  (3, 'COSMETICA NATURAL'),
  (4, 'LIQUIDOS'),
  (5, 'OFERTAS'),
  (6, 'PACK Y REGALOS'),
  (7, 'PREMEZCLAS'),
  (8, 'APTO PARA VEGANOS'),
  (9, 'BIO / ECO FRIENDLY'),
  (10, 'COMERCIO JUSTO / FAIRTRADE'),
  (11, 'CRUDO / RAW'),
  (12, 'HALAL'),
  (13, 'HECHO EN CHILE'),
  (14, 'KETO'),
  (15, 'KOSHER'),
  (16, 'LIBRE DE CRUELDAD'),
  (17, 'LIBRE DE PARABENOS'),
  (18, 'LIBRE GMO'),
  (19, 'ORGANICO'),
  (21, 'REP - RECICLA ENVASES'),
  (22, 'SIN ALTO EN AZÚCAR'),
  (23, 'SIN ALTO EN CALORÍAS'),
  (24, 'SIN ALTO EN GRASAS SATURADAS'),
  (25, 'SIN ALTO EN SODIO'),
  (26, 'SIN AZUCAR AÑADIDA'),
  (27, 'SIN FRUTOS SECOS'),
  (28, 'SIN GLUTEN'),
  (29, 'SIN HUEVO'),
  (30, 'SIN LACTOSA'),
  (31, 'SIN LEVADURAS'),
  (32, 'SIN PESCADO & MARISCOS'),
  (33, 'SIN SOYA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ps_product_intolerance_allergy`
--

CREATE TABLE `ps_product_intolerance_allergy` (
  `id_product_intolerance_allergy` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_lang` int(10) UNSIGNED NOT NULL,
  `id_shop` int(10) UNSIGNED NOT NULL,
  `id_intolerance_allergy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ps_intolerance_allergy`
--
ALTER TABLE `ps_intolerance_allergy`
  ADD PRIMARY KEY (`id`,`intolerance_allergy`);

--
-- Indices de la tabla `ps_product_intolerance_allergy`
--
ALTER TABLE `ps_product_intolerance_allergy`
  ADD PRIMARY KEY (`id_product_intolerance_allergy`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ps_intolerance_allergy`
--
ALTER TABLE `ps_intolerance_allergy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ps_product_intolerance_allergy`
--
ALTER TABLE `ps_product_intolerance_allergy`
  MODIFY `id_product_intolerance_allergy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
