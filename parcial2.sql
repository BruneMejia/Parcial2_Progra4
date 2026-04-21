-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2026 a las 23:34:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `clasificacion` varchar(20) NOT NULL,
  `fecha_estreno` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `genero`, `clasificacion`, `fecha_estreno`) VALUES
(1, 'Minecraft Movie', 'Aventura', 'Todo publico', '2026-04-10'),
(2, 'Capitan America', 'Accion', 'Mayores de 13', '2026-04-12'),
(3, 'Blanca Nieves', 'Fantasia', 'Todo publico', '2026-04-15'),
(4, 'Godzilla x Kong', 'Ciencia ficcion', 'Mayores de 13', '2026-04-18'),
(5, 'IntensaMente 3', 'Animacion', 'Todo publico', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `cantidad_boletos` int(11) NOT NULL,
  `tipo_sala` varchar(50) NOT NULL,
  `formato` varchar(20) NOT NULL,
  `fecha_funcion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre_cliente`, `cantidad_boletos`, `tipo_sala`, `formato`, `fecha_funcion`) VALUES
(1, 'Francisca Bonilla', 2, 'Sala tradicional', '2D', '2026-04-21'),
(2, 'Freddy Vasquez', 4, 'Sala VIP', '3D', '2026-04-22'),
(3, 'Madeline Mejia', 1, 'Sala tradicional', '2D', '2026-04-23'),
(4, 'Jose Ramirez', 3, 'Sala XD', '3D', '2026-04-24'),
(5, 'Lucia Hernandez', 5, 'Sala VIP', '2D', NULL),
(6, 'Carmen Argueta', 3, 'Sala VIP', '3D', '2026-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'Administrador', 'admin@cinemark.com', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
