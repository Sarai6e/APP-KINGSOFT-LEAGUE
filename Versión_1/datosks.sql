-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2024 a las 17:18:42
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`) VALUES
(1, 'Amateur'),
(2, 'Beginner'),
(3, 'Novato'),
(4, 'Junior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_competencia`
--

CREATE TABLE `categoria_competencia` (
  `id_competencia` int(11) NOT NULL,
  `id_tipo_competencia` int(11) DEFAULT NULL,
  `id_categoria_jugador` int(11) DEFAULT NULL,
  `reglas` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_competencia`
--

INSERT INTO `categoria_competencia` (`id_competencia`, `id_tipo_competencia`, `id_categoria_jugador`, `reglas`, `precio`) VALUES
(1, 1, 1, 'https://www.example.com/reglas_amateur', 20.00),
(2, 1, 2, 'https://www.example.com/reglas_senior', 30.00),
(3, 2, 3, 'https://www.example.com/reglas_master', 50.00),
(4, 2, 4, 'https://www.example.com/reglas_junior', 25.00);

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
(1, 'Competencia A', '2024-03-01', '2024-03-16', '2024-03-30', 4),
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
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `id_categoria_competencia` int(11) DEFAULT NULL,
  `id_robot` int(11) DEFAULT NULL,
  `boucher` varchar(255) DEFAULT NULL,
  `confirmacion` tinyint(1) DEFAULT NULL,
  `puntaje` decimal(10,2) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `descalificacion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `id_categoria_competencia`, `id_robot`, `boucher`, `confirmacion`, `puntaje`, `posicion`, `descalificacion`) VALUES
(1, 1, 101, 'https://www.example.com/boucher_90vj.jpg', 1, 85.50, 2, 0),
(2, 2, 102, 'https://www.example.com/boucher_2.jpg', 1, 78.00, 3, 0),
(3, 3, 103, 'https://www.example.com/boucher_3.jpg', 1, 90.25, 1, 0);

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
  `id` int(20) NOT NULL,
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
  `club_robotica_id` varchar(100) DEFAULT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `nombre`, `apellido`, `dni`, `participante_genero_id`, `grado_estudio_id`, `año_estudio`, `especialidad`, `correo`, `clave`, `fecha_de_actualizacion`, `robot_id`, `club_robotica_id`, `id_institucion`, `id_competencia`, `fecha_nacimiento`) VALUES
(1, 'Sara', 'Romero', '77382908', 1, 1, 1, 'Profesor', 'sarai@gmail.com', '123456', '2024-04-12 14:34:28', 1, '1', 2, 2, '2014-04-08'),
(3, 'Gimena', ' Vargas', '7896541', 2, 2, 1, 'Ingeniero de sotware con I:A', 'gimena@gmail.com', '1234', '2024-04-08 01:03:50', 2, '2', 1, 1, '2024-04-02');

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
  `id_usuario` int(11) DEFAULT NULL,
  `ip_usuario` varchar(45) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 2, 3),
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
(1, 'Zumo', 'asfdb'),
(2, 'zumo', 'sdagsdfh'),
(3, 'zumo', 'watwet'),
(4, 'zumo', 'wfresy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_competencia`
--
ALTER TABLE `categoria_competencia`
  ADD PRIMARY KEY (`id_competencia`),
  ADD KEY `id_categoria_jugador` (`id_categoria_jugador`);

--
-- Indices de la tabla `club_robotica`
--
ALTER TABLE `club_robotica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grado_estudio`
--
ALTER TABLE `grado_estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria_competencia` (`id_categoria_competencia`);

--
-- Indices de la tabla `nombre_institucion`
--
ALTER TABLE `nombre_institucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participante_genero`
--
ALTER TABLE `participante_genero`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `robot_competencia`
--
ALTER TABLE `robot_competencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_competencia`
--
ALTER TABLE `tipo_competencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria_competencia`
--
ALTER TABLE `categoria_competencia`
  MODIFY `id_competencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_competencia`
--
ALTER TABLE `categoria_competencia`
  ADD CONSTRAINT `categoria_competencia_ibfk_1` FOREIGN KEY (`id_categoria_jugador`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_categoria_competencia`) REFERENCES `categoria_competencia` (`id_competencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
