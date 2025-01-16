-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2025 a las 03:22:25
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
-- Base de datos: `user_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alojamientos`
--

CREATE TABLE `cat_alojamientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_alojamientos`
--

INSERT INTO `cat_alojamientos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Villa con piscina', 'Villa de lujo con piscina privada y jardín', '0001.jpg'),
(2, 'Estudio céntrico', 'Estudio amueblado en el corazón de la ciudad', '0002.jpg'),
(3, 'Casa de playa', 'Casa frente al mar con acceso directo a la playa', '0003.jpg'),
(4, 'Apartamento familiar', 'Amplio apartamento con capacidad para 6 personas', '0004.jpg'),
(5, 'La campanera', 'Casa recuperada por el regimen de excepción', '0005.jpg'),
(6, 'Barrio la esperanza', 'grupo roble', '0006.jpg'),
(7, 'Prueba 1', 'pruebaaaaa', '0005.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'jorge', '$2y$10$DMKwhQTgc05Hee6qzgYn0OCAsYiTgJxiCtDQpbZv54W5mv0bq63Ru', 'user', '2025-01-11 15:29:23'),
(2, 'prueba', '$2y$10$uGgKZkzfN7w4DmP7EqO9NOP/MCL3EAxDnOhndK0XWnNc2ihCruaDG', 'user', '2025-01-11 17:32:49'),
(3, 'prueba2', '$2y$10$RYUouuWsj.C8bdcZIMXJfeeu6bXaDrSSV/01tWFPgnAKUGsH1QslC', 'user', '2025-01-11 17:38:23'),
(4, 'admin', '$2y$10$QyFG27pZnSDmXyDmu5aRku/HtiTfS10ArM/Xx1HoTBjh5AHnpdMDG', 'admin', '2025-01-11 17:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_alojamientos`
--

CREATE TABLE `user_alojamientos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alojamiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_alojamientos`
--

INSERT INTO `user_alojamientos` (`id`, `user_id`, `alojamiento_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(6, 1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alojamientos`
--
ALTER TABLE `cat_alojamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `user_alojamientos`
--
ALTER TABLE `user_alojamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `alojamiento_id` (`alojamiento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_alojamientos`
--
ALTER TABLE `cat_alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user_alojamientos`
--
ALTER TABLE `user_alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user_alojamientos`
--
ALTER TABLE `user_alojamientos`
  ADD CONSTRAINT `user_alojamientos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_alojamientos_ibfk_2` FOREIGN KEY (`alojamiento_id`) REFERENCES `cat_alojamientos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
