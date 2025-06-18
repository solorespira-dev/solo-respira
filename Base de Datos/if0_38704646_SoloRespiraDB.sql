-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql303.infinityfree.com
-- Tiempo de generación: 09-05-2025 a las 09:16:23
-- Versión del servidor: 10.6.19-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_38704646_SoloRespiraDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `donante_nombre` varchar(100) NOT NULL,
  `donante_email` varchar(100) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `proyecto_id` int(11) DEFAULT NULL,
  `metodo_pago` enum('tarjeta','transferencia','efectivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`id`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`) VALUES
(51, 'Mi Primera Prueba', 'teal', '2021-07-07', '2021-07-08'),
(52, 'Mi Segunda Prueba', 'amber', '2021-07-17', '2021-07-18'),
(53, 'Mi Tercera Prueba', 'orange', '2021-07-03', '2021-07-04'),
(57, 'Aleluya', '#009688', '2025-04-10', '2025-04-10'),
(58, 'Dd', '#2196F3', '2025-04-15', '2025-04-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigaciones`
--

CREATE TABLE `investigaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `investigaciones`
--

INSERT INTO `investigaciones` (`id`, `titulo`, `contenido`, `imagen`, `autor`, `fecha_publicacion`) VALUES
(2, 'Ensayo Clínico Internacional en Tratamientos Avanzados', 'Investigadores de Europa y América Latina se han unido para realizar un ensayo clínico en tratamientos avanzados para Fibrosis Quística. Este estudio espera optimizar la dosificación y minimizar efectos secundarios, ofreciendo una nueva esperanza a pacientes de alto riesgo.', 'OIP (1).jpeg', 'Dra. Mariana Rodríguez', '2025-04-10 00:52:44'),
(3, 'Innovación en el Manejo de Infecciones Pulmonares', 'Se ha desarrollado un nuevo enfoque terapéutico que combina antibióticos con terapias de apoyo para combatir infecciones pulmonares complicadas en pacientes con Fibrosis Quística. Los resultados preliminares apuntan a una reducción en la frecuencia de exacerbaciones.', 'OIP.jpeg', 'Dr. Carlos Mendoza', '2025-04-10 00:52:44'),
(4, 'Estudio Local sobre Factores Ambientales y Fibrosis Quística', 'Un estudio realizado en Aragua analiza el impacto de factores ambientales en la severidad de la Fibrosis Quística en pacientes locales. Los resultados sugieren que la calidad del aire y otros contaminantes pueden influir en el curso de la enfermedad.', 'R.jpeg', 'Dra. Lucía Torres', '2025-04-10 00:52:44'),
(5, 'Tecnologías Digitales en el Seguimiento de Pacientes', 'Se implementa un sistema digital que permite el monitoreo remoto de pacientes con Fibrosis Quística. Esta herramienta facilita la comunicación entre médicos y pacientes, optimizando el seguimiento y adaptando tratamientos de manera personalizada.', NULL, 'Ing. Roberto Gómez', '2025-04-10 00:52:44'),
(6, 'Nuevas Oportunidades de Financiamiento para la Investigación', 'Diversas entidades internacionales han anunciado fondos destinados a la investigación en Fibrosis Quística. Este impulso económico permitirá avanzar en estudios innovadores que buscan transformar el tratamiento y mejorar la calidad de vida de los afectados.', NULL, 'Dr. Alejandro Cruz', '2025-04-10 00:52:44'),
(7, 'Nueva Terapia Génica en Fibrosis Quística', 'Un equipo internacional ha desarrollado una terapia génica innovadora que apunta a corregir las mutaciones del gen CFTR. Los ensayos clínicos preliminares muestran mejoras significativas en la función pulmonar de los pacientes.', '1744256992_depositphotos_16169027-stock-photo-clinical-study.jpg', 'Manuel', '2025-04-10 03:49:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--

CREATE TABLE `mensajes_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` enum('activo','finalizado','en_pausa') DEFAULT 'activo',
  `presupuesto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('admin','miembro') DEFAULT 'miembro',
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contraseña`, `rol`, `fecha_registro`) VALUES
(3, 'Manuel', 'manuel@manuel.com', '$2y$10$sTrgKottQce78LjSBIi0MeXCJfIwtQuCouHmYcWfPRP1sVCwb7Lpy', 'admin', '2025-04-09 23:59:54'),
(4, 'Manuel', 'manuel@miembro.com', '$2y$10$AcaUXbgV1zUeuUAb19W0aOh0iApz2gYCKNDQBqH.Jg1w.3TD/4tl.', 'miembro', '2025-04-10 00:46:40'),
(5, 'Sebastian A. Zapata P.', 'sebastianzapatap@hotmail.com', '$2y$10$tOTNIRnqoDyS0R6jKCv2y.gW8GVDjb1XIlN0P1cwKLc5iyy5Ji.hq', 'admin', '2025-04-10 01:16:22'),
(6, 'Michell', 'zharickmichell8@gmail.com', '$2y$10$nCR5ngw13lHlAwjHwCMZduJE2ZkQgIBdQ1Tg6KIaE2TTQYHTeM9my', 'admin', '2025-04-10 04:54:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`);

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
