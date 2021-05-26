-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 11:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indemnizacion`
--
USE `samuari1_indemnizacion`;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `adiminstrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`id`, `correo`, `pwd`, `adiminstrador`) VALUES
(1, 'aymee.g.r@hotmail.com', '$2y$10$dLacMNG5dTiDJBAdUs5KK.jWp2QO.mb8IQKEMby71sD5BMc3emVXy', 1),
(2, 'allan.ocastrocruz@gmail.com', '$2y$10$mIc1bmK/84si74TdJxBbQe/OvJ267apcvAh6RmbZui4oqlew0O2Aa', 3),
(3, 'brenda_candanedo@gmail.com', '$2y$10$dLacMNG5dTiDJBAdUs5KK.jWp2QO.mb8IQKEMby71sD5BMc3emVXy', 2),
(5, 'allanocc.95@gmail.com', '$2y$10$hklgjgN2FmfT3eX9pfM8BOq1g1Tj6MEsY0EUqwGsexnb1vK5P8Aye', 14),
(7, 'prueba@email.com', '$2y$10$mIc1bmK/84si74TdJxBbQe/OvJ267apcvAh6RmbZui4oqlew0O2Aa', 16);

-- --------------------------------------------------------

--
-- Table structure for table `derecho`
--

DROP TABLE IF EXISTS `derecho`;
CREATE TABLE `derecho` (
  `id` int(11) NOT NULL,
  `derecho` varchar(50) NOT NULL,
  `motivo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `descrip` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `derecho`
--

INSERT INTO `derecho` (`id`, `derecho`, `motivo`, `created_at`, `descrip`) VALUES
(1, 'Tres meses de salario', 1, '2021-03-19 22:33:05', ' salario * 3'),
(2, 'Prima de antiguedad', 1, '2021-03-19 22:33:05', '12 dias de salario por cada a&ntilde;o'),
(3, 'Prima vacacional', 1, '2021-03-19 22:33:05', '25% del salario diario por 6 dias de vacaciones'),
(4, 'Aguinaldo', 1, '2021-03-19 22:33:05', 'Salario diario por 15 dias'),
(5, 'Asistencia medica y quirurgica', 3, '2021-03-19 22:33:05', 'Fijo'),
(6, 'Rehabilitacion', 3, '2021-03-19 22:33:05', 'Fijo'),
(7, 'Hospitalizacion', 3, '2021-03-19 22:33:05', 'Fijo'),
(8, 'Medicamentos y material de curacion', 3, '2021-03-19 22:33:05', 'Fijo'),
(9, 'Protesis', 3, '2021-03-19 22:33:05', 'Fijo'),
(10, 'Parte proporcional de vacaciones', 2, '2021-03-19 22:33:05', '25% del salario diario por 6 dias de vacaciones'),
(12, 'Parte proporcional de aguinaldo', 2, '2021-03-19 22:33:05', 'Salario diario por 15 dias'),
(13, 'Prima de antiguedad', 2, '2021-03-19 22:33:05', '12 dias de salario por cada a&ntilde;o'),
(17, 'Tres meses de salario mensual integrado', 4, '2021-05-03 19:22:50', 'sueldo * 3'),
(18, '20 dias de salario por cada a&ntilde;o laborado', 4, '2021-05-03 19:22:50', 'salario / 30 * antiguedad'),
(19, 'Prima de antiguedad', 4, '2021-05-03 19:22:50', '12 dias de salario');

-- --------------------------------------------------------

--
-- Table structure for table `indemnizacion`
--

DROP TABLE IF EXISTS `indemnizacion`;
CREATE TABLE `indemnizacion` (
  `id` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `administrador` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indemnizacion`
--

INSERT INTO `indemnizacion` (`id`, `motivo`, `empleado`, `administrador`, `created_at`) VALUES
(8, 2, 7, 2, '2021-03-22 06:50:18'),
(9, 3, 5, 1, '2021-03-22 06:51:04'),
(10, 3, 8, 3, '2021-03-22 21:22:03'),
(11, 1, 5, 3, '2021-03-28 02:35:38'),
(12, 2, 5, 3, '2021-04-26 20:06:05'),
(13, 2, 8, 3, '2021-04-26 20:06:12'),
(14, 4, 4, 3, '2021-05-03 19:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `motivo`
--

DROP TABLE IF EXISTS `motivo`;
CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motivo`
--

INSERT INTO `motivo` (`id`, `nombre`, `created_at`) VALUES
(1, 'Quiebre de empresa', '2021-03-19 22:36:39'),
(2, 'Renuncia', '2021-03-19 22:36:39'),
(3, 'Incapacidades', '2021-03-19 22:36:39'),
(4, 'Liquidacion', '2021-05-03 19:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `appat`, `puesto`, `nss`, `salario`, `status`, `created_at`) VALUES
(1, 'Aymee', 'Guarneros', 'Administrador', '45879654123', 2000.00, 'A', '2021-03-19 22:38:42'),
(2, 'Brenda', 'Candanedo', 'Administrador', '12987465836', 2000.00, 'A', '2021-03-19 22:38:42'),
(3, 'Allan', 'Castro', 'Administrador', '65987432015', 2000.00, 'A', '2021-03-19 22:38:42'),
(4, 'Jaime', 'Rojas', 'Empleado', '89745632014', 1200.00, 'A', '2021-03-19 22:38:42'),
(5, 'Sonia', 'Viveros', 'Empleado', '32145789632', 1200.00, 'I', '2021-03-19 22:38:42'),
(6, 'Juan', 'Murrieta', 'Empleado', '41365740324', 1200.00, 'A', '2021-03-19 22:38:42'),
(7, 'Natalia', 'Candanedo', 'Empleado', '36547120387', 1200.00, 'I', '2021-03-19 22:38:42'),
(8, 'Yael', 'Guarneros', 'Empleado', '78459632102', 1200.00, 'I', '2021-03-19 22:38:42'),
(9, 'Patricia', 'Bustos', 'Empleado', '87456321970', 1200.00, 'A', '2021-03-19 22:38:42'),
(10, 'Miguel', 'Palacios', 'Empleado', '97630145863', 1200.00, 'A', '2021-03-19 22:38:42'),
(14, 'Octavio', 'Cruz', 'Administrador', '55662349989', 2000.00, 'A', '2021-03-22 19:23:31'),
(15, 'Allan', 'Castro', 'Administrador', '30771468557', 2000.00, 'A', '2021-03-28 08:43:34'),
(16, 'Allan', 'Castro', 'Administrador', '32962766579', 2000.00, 'A', '2021-03-28 08:44:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `cue_cor_uk` (`correo`) USING BTREE,
  ADD KEY `cue_adm_fk` (`adiminstrador`);

--
-- Indexes for table `derecho`
--
ALTER TABLE `derecho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `der_mot_fk` (`motivo`);

--
-- Indexes for table `indemnizacion`
--
ALTER TABLE `indemnizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_mot_fk` (`motivo`),
  ADD KEY `ind_emp_fk` (`empleado`),
  ADD KEY `ind_adm_fk` (`administrador`);

--
-- Indexes for table `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usu_nss_uk` (`nss`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `derecho`
--
ALTER TABLE `derecho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `indemnizacion`
--
ALTER TABLE `indemnizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cue_adm_fk` FOREIGN KEY (`adiminstrador`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `derecho`
--
ALTER TABLE `derecho`
  ADD CONSTRAINT `der_mot_fk` FOREIGN KEY (`motivo`) REFERENCES `motivo` (`id`);

--
-- Constraints for table `indemnizacion`
--
ALTER TABLE `indemnizacion`
  ADD CONSTRAINT `ind_adm_fk` FOREIGN KEY (`administrador`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `ind_emp_fk` FOREIGN KEY (`empleado`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `ind_mot_fk` FOREIGN KEY (`motivo`) REFERENCES `motivo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
