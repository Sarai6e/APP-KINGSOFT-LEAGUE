-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2024 a las 18:55:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datosks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_robotica`
--

CREATE TABLE `club_robotica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `logo` varchar(200) NOT NULL,
  `nombre_institucion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `club_robotica`
--

INSERT INTO `club_robotica` (`id`, `nombre`, `ciudad`, `pais`, `logo`, `nombre_institucion_id`) VALUES
(1, 'Robot A', 'Huaral', 'Argentina', '2deqfrqvqrtvt', 14),
(2, 'Robot B', 'Lima', 'Perú', 'sdasfdgjmh', 1),
(3, 'Robot C', 'Huaral', 'Aregentina', 'safsdagg', 3),
(4, 'Robot D', 'Huánuco', 'Perú', 'safsaef', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE `competencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_inicio_inscripcion` date DEFAULT NULL,
  `fecha_fin_inscripcion` date DEFAULT NULL,
  `fecha_compentencia` date DEFAULT NULL,
  `tipo_competencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `competencia`
--

INSERT INTO `competencia` (`id`, `nombre`, `fecha_inicio_inscripcion`, `fecha_fin_inscripcion`, `fecha_compentencia`, `tipo_competencia`) VALUES
(1, 'Competencia A', '2024-03-01', '2024-03-16', '2024-03-30', 1),
(2, 'Competencia B', '2024-03-01', '2024-03-09', '2024-03-23', 2),
(3, 'Competencia C', '2024-03-14', '2024-03-16', '2024-03-31', 3),
(4, 'Competencia D', '2024-04-06', '2024-03-12', '2024-03-30', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_estudio`
--

CREATE TABLE `grado_estudio` (
  `id` int(11) NOT NULL,
  `grado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_estudio`
--

INSERT INTO `grado_estudio` (`id`, `grado`) VALUES
(1, 'Secundaria'),
(2, 'Secundaria'),
(3, 'Universidad'),
(4, 'Universidad\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_institucion`
--

CREATE TABLE `nombre_institucion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nombre_institucion`
--

INSERT INTO `nombre_institucion` (`id`, `nombre`) VALUES
(1, 'Institución C'),
(2, 'Institución B'),
(3, 'Institución C'),
(4, 'Institucion C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `participante_genero_id` int(11) DEFAULT NULL,
  `grado_estudio_id` int(11) DEFAULT NULL,
  `año_estudio` int(11) DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `fecha_de_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `robot_id` int(11) DEFAULT NULL,
  `club_robotica_id` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `nombre`, `apellido`, `dni`, `participante_genero_id`, `grado_estudio_id`, `año_estudio`, `especialidad`, `correo`, `clave`, `fecha_de_actualizacion`, `robot_id`, `club_robotica_id`, `fecha_nacimiento`) VALUES
(1, 'Sarai', 'Romero', '77382908', 1, 1, 1, 'a fdhgf', 'gh@gmail.com', '123456789', '2024-03-01 16:37:17', 1, 1, '2024-03-07'),
(2, 'Lourdes', 'Villanueva', '78965412', 2, 2, 2, 'Profesor', 'villa@gmail.com', '123456', '2024-03-23 16:55:12', 2, 2, '2024-03-01'),
(3, 'Luis', 'Rodrigues', '6547895', 3, 3, 3, 'Doctor', 's@gmail.com', '123456789', '2024-03-08 16:51:57', 3, 3, '2024-03-27'),
(4, 'Camila', 'Paulino', '78745874', 4, 4, 4, 'Maestra', 'cami@gmail.com', '23457769', '2024-03-01 16:51:57', 4, 4, '2024-03-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_genero`
--

CREATE TABLE `participante_genero` (
  `id` int(11) NOT NULL,
  `genero` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participante_genero`
--

INSERT INTO `participante_genero` (`id`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Masculino'),
(3, 'Femenino'),
(4, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ip_usuario` varchar(45) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `id_usuario`, `ip_usuario`, `fecha_hora`) VALUES
(1, 1, '::1', '2024-03-22 17:50:04'),
(2, 4, '::1', '2024-03-22 17:51:44'),
(3, 1, '::1', '2024-03-22 18:21:13'),
(4, 1, '::1', '2024-03-22 18:23:36'),
(5, 1, '::1', '2024-03-22 18:27:20'),
(6, 1, '::1', '2024-03-22 18:40:49'),
(7, 2, '::1', '2024-03-23 15:36:45'),
(8, 1, '::1', '2024-03-23 15:53:18'),
(9, 1, '::1', '2024-03-23 16:30:54'),
(10, 1, '::1', '2024-03-23 16:33:13'),
(11, 1, '::1', '2024-03-23 16:34:25'),
(12, 1, '::1', '2024-03-23 16:44:47'),
(13, 1, '::1', '2024-03-23 16:51:14'),
(14, 1, '::1', '2024-03-23 16:53:13'),
(15, 4, '::1', '2024-03-23 16:54:20'),
(16, 1, '::1', '2024-03-23 16:55:50'),
(17, 1, '::1', '2024-03-23 16:59:01'),
(18, 1, '::1', '2024-03-23 17:02:19'),
(19, 1, '::1', '2024-03-23 17:04:39'),
(20, 1, '::1', '2024-03-23 17:58:38'),
(21, 1, '::1', '2024-03-23 18:11:12'),
(22, 1, '::1', '2024-03-23 18:19:35'),
(23, 1, '::1', '2024-03-23 18:22:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robot`
--

CREATE TABLE `robot` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `ancho` decimal(10,2) DEFAULT NULL,
  `alto` decimal(10,2) DEFAULT NULL,
  `Id_participante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `robot`
--

INSERT INTO `robot` (`id`, `nombre`, `peso`, `ancho`, `alto`, `Id_participante`) VALUES
(1, 'war', 0.00, 0.00, 0.00, 1),
(2, 'reter', 0.00, 0.00, 0.00, 2),
(3, 'Robot', 6.20, 35.00, 23.00, 2),
(4, 'Carmen', 1.00, 2.45, 9.34, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robot_competencia`
--

CREATE TABLE `robot_competencia` (
  `id` int(11) NOT NULL,
  `id_robot` int(11) NOT NULL,
  `id_competencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `robot_competencia`
--

INSERT INTO `robot_competencia` (`id`, `id_robot`, `id_competencia`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_competencia`
--

CREATE TABLE `tipo_competencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_competencia`
--

INSERT INTO `tipo_competencia` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Rut', 'asfdb'),
(2, 'Sarai', 'sdagsdfh'),
(3, 'Rut', 'watwet'),
(4, 'amos', 'wfresy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`) VALUES
(1, 'sarai@gmail.com', '123456789'),
(2, 'Camila@gmail.com', '123456'),
(3, 'romero@gmail.com', '123456'),
(4, 'Villanueva@gmail.com', '145638');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `robot`
--
ALTER TABLE `robot`
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
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
