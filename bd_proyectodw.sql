-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 04:58:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyectodw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID_med` int(11) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `colegiado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`ID_med`, `especialidad`, `colegiado`, `id_usuario`) VALUES
(10, 'Cardiologia ', 8905, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `dpi` varchar(13) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `id_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo_usuario` enum('medico','enfermero') NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dpi` int(13) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `pass`, `tipo_usuario`, `nombre_completo`, `email`, `dpi`, `direccion`, `sexo`, `fecha_nacimiento`, `fecha_registro`) VALUES
(1, 'monica', '$2y$10$IvCBcou31UEOH1NlrRRRluI4tYLNe.avtrhedkJyJF5B7kmzhfM7C', 'medico', 'Monica Gabriela Perez Velasquez', 'monica@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:29:31'),
(3, 'monica2', '$2y$10$JqKxJevXeN3IsTLEWJOWgeuKkO20Sis1iZRwjW/LE9xkpj/fUZ3Mi', 'medico', 'Monica Gabriela Perez Velasquez', 'monica2@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:31:57'),
(4, 'monica3', '$2y$10$ZAUVOwA/sSbuOAqE94HID..RBT5a4WSDsbi9pGNTP03RCyUBrHxXG', 'medico', 'monica dhbaifwn', 'monica3@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:41:21'),
(5, 'monica4', '$2y$10$ZKQKZ71tF9Xe0tM0KTGLtee3UumN/hWwhwbQqOb2PZg77yFimMWE2', 'medico', 'monica perez', 'monica4@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:42:09'),
(6, 'admin', '$2y$10$WHVfuCc8ka4Vi3BvLg1jju1Z7YgUM2oMnuaAKJPjL2fX.rX0Zlfh6', 'medico', 'monice perew xonsa de', 'mp@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:43:24'),
(7, 'monica7', '$2y$10$/lcTa8ffch8HgCbFuLwCiubm.dEV2P6CdkV.TEOOfrl7Y3yJ/aqTu', 'medico', 'monid beiffe hdh fefef', 'dadwd@gmail.co', 0, '', NULL, NULL, '2024-10-21 02:50:09'),
(8, 'monica5', '$2y$10$wBK7V2DXxeGIuHcxiHumjeXFHbkx2E3.GoYWuAAHdWoLRCe.O/Gui', 'medico', 'moni cs de fr hg', 'monica5@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:50:50'),
(9, 'monica8', '$2y$10$pQqiwxbvcHaAHleTInCgTu.pnz4waW00N.CsAFEQdouBWS8gCxOj6', 'medico', 'monica disdn eonc', 'monica8@gmail.com', 0, '', NULL, NULL, '2024-10-21 02:57:42'),
(10, 'javier', '$2y$10$zvQanse3nBCT3T1wq4a6au.e8lsscU/Lj3ggtEQ.lorkiLzPOlNmy', 'medico', 'Javier Alejandro Avalos Galindo', 'javier@gmaail.com', 2147483647, 'colonia', 'masculino', '2024-09-29', '2024-10-22 03:56:44'),
(11, 'Javier2', '$2y$10$/vFyPRfq7J0WrRq/3nDzBu09ii.cQNS/083e925xLNhK2p/qYgNje', 'medico', 'Javier Avalos', 'javalos@mail.com', 3008, 'ciudad', 'masculino', '2002-07-18', '2024-10-22 04:21:46'),
(12, 'monica10', '$2y$10$TL0wmHFFIlv4vYHCQZGs5uk8ijW7T6GXGYRfStHw6ZWOEQC6a.sxG', 'medico', 'monica gabriela', 'monica10@gmai.com', 16461, 'zona 17', 'femenino', '2003-01-28', '2024-10-22 04:30:53'),
(14, 'javier4', '$2y$10$WEHuYpmwz3.fCrTLE6HuOuIYudeKiuSbhQyEjrzSiQDZneJi74HBW', 'medico', 'javier', 'dadwd@gmail.com', 683, 'cdop', 'masculino', '2024-09-29', '2024-10-22 04:42:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID_med`),
  ADD KEY `fk_usuario_medico` (`id_usuario`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_usuario_medico` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
