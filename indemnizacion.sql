-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2021 a las 07:48:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indemnizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `adiminstrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `correo`, `pwd`, `adiminstrador`) VALUES
(1, 'aymee.g.r@hotmail.com', '$2y$10$dLacMNG5dTiDJBAdUs5KK.jWp2QO.mb8IQKEMby71sD5BMc3emVXy', 1),
(2, 'allan.ocastrocruz@gmail.com', '$2y$10$dLacMNG5dTiDJBAdUs5KK.jWp2QO.mb8IQKEMby71sD5BMc3emVXy', 3),
(3, 'brenda_candanedo@gmail.com', '$2y$10$dLacMNG5dTiDJBAdUs5KK.jWp2QO.mb8IQKEMby71sD5BMc3emVXy', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derecho`
--

DROP TABLE IF EXISTS `derecho`;
CREATE TABLE `derecho` (
  `id` int(11) NOT NULL,
  `derecho` varchar(50) NOT NULL,
  `motivo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `derecho`
--

INSERT INTO `derecho` (`id`, `derecho`, `motivo`, `created_at`) VALUES
(1, 'Tres meses de salario', 1, '2021-03-19 22:33:05'),
(2, 'Prima de antiguedad', 1, '2021-03-19 22:33:05'),
(3, 'Prima vacacional', 1, '2021-03-19 22:33:05'),
(4, 'Aguinaldo', 1, '2021-03-19 22:33:05'),
(5, 'Asistencia medica y quirurgica', 3, '2021-03-19 22:33:05'),
(6, 'Rehabilitacion', 3, '2021-03-19 22:33:05'),
(7, 'Hospitalizacion', 3, '2021-03-19 22:33:05'),
(8, 'Medicamentos y material de curacion', 3, '2021-03-19 22:33:05'),
(9, 'Protesis', 3, '2021-03-19 22:33:05'),
(10, 'Parte proporcional de vacaciones', 2, '2021-03-19 22:33:05'),
(11, 'Parte proporcional de prima vacacional', 2, '2021-03-19 22:33:05'),
(12, 'Parte proporcional de aguinaldo', 2, '2021-03-19 22:33:05'),
(13, 'Prima de antiguedad', 2, '2021-03-19 22:33:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indemnizacion`
--

DROP TABLE IF EXISTS `indemnizacion`;
CREATE TABLE `indemnizacion` (
  `id` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `administrador` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

DROP TABLE IF EXISTS `motivo`;
CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`id`, `nombre`, `created_at`) VALUES
(1, 'Quiebre de empresa', '2021-03-19 22:36:39'),
(2, 'Renuncia', '2021-03-19 22:36:39'),
(3, 'Incapacidades', '2021-03-19 22:36:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `appat` varchar(15) NOT NULL,
  `puesto` varchar(15) NOT NULL,
  `nss` varchar(11) NOT NULL,
  `salario` double(7,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `appat`, `puesto`, `nss`, `salario`, `status`, `created_at`) VALUES
(1, 'Aymee', 'Guarneros', 'Administrador', '45879654123', 2000.00, 'A', '2021-03-19 22:38:42'),
(2, 'Brenda', 'Candanedo', 'Administrador', '12987465836', 2000.00, 'A', '2021-03-19 22:38:42'),
(3, 'Allan', 'Castro', 'Administrador', '65987432015', 2000.00, 'A', '2021-03-19 22:38:42'),
(4, 'Jaime', 'Rojas', 'Empleado', '89745632014', 1200.00, 'A', '2021-03-19 22:38:42'),
(5, 'Sonia', 'Viveros', 'Empleado', '32145789632', 1200.00, 'A', '2021-03-19 22:38:42'),
(6, 'Juan', 'Murrieta', 'Empleado', '41365740324', 1200.00, 'A', '2021-03-19 22:38:42'),
(7, 'Natalia', 'Candanedo', 'Empleado', '36547120387', 1200.00, 'A', '2021-03-19 22:38:42'),
(8, 'Yael', 'Guarneros', 'Empleado', '78459632102', 1200.00, 'I', '2021-03-19 22:38:42'),
(9, 'Patricia', 'Bustos', 'Empleado', '87456321970', 1200.00, 'I', '2021-03-19 22:38:42'),
(10, 'Miguel', 'Palacios', 'Empleado', '97630145863', 1200.00, 'I', '2021-03-19 22:38:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `cue_cor_uk` (`correo`) USING BTREE,
  ADD KEY `cue_adm_fk` (`adiminstrador`);

--
-- Indices de la tabla `derecho`
--
ALTER TABLE `derecho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `der_mot_fk` (`motivo`);

--
-- Indices de la tabla `indemnizacion`
--
ALTER TABLE `indemnizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_mot_fk` (`motivo`),
  ADD KEY `ind_emp_fk` (`empleado`),
  ADD KEY `ind_adm_fk` (`administrador`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usu_nss_uk` (`nss`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `derecho`
--
ALTER TABLE `derecho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `indemnizacion`
--
ALTER TABLE `indemnizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cue_adm_fk` FOREIGN KEY (`adiminstrador`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `derecho`
--
ALTER TABLE `derecho`
  ADD CONSTRAINT `der_mot_fk` FOREIGN KEY (`motivo`) REFERENCES `motivo` (`id`);

--
-- Filtros para la tabla `indemnizacion`
--
ALTER TABLE `indemnizacion`
  ADD CONSTRAINT `ind_adm_fk` FOREIGN KEY (`administrador`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `ind_emp_fk` FOREIGN KEY (`empleado`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `ind_mot_fk` FOREIGN KEY (`motivo`) REFERENCES `motivo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
