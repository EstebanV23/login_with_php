-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2022 at 02:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login_prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `rol_id` int(3) NOT NULL,
  `rol_nom` varchar(50) NOT NULL,
  `rol_des` varchar(200) DEFAULT NULL,
  `rol_est` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rol`
--

INSERT INTO `tbl_rol` (`rol_id`, `rol_nom`, `rol_des`, `rol_est`) VALUES
(1, 'logueado', 'Esto corresponde a un usuario logueado', 1),
(2, 'admin', 'usuario administrador con permisos para ver usuarios logueados', 1),
(3, 'superadmin', 'usuario admin con permisos para crear a todos los usuarios', 1),
(4, 'Jefe', 'Usuario logueado con permisos para ver la lista de usuarios', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(3) NOT NULL,
  `usu_nom` varchar(50) NOT NULL,
  `usu_ape` varchar(50) DEFAULT NULL,
  `usu_mai` varchar(100) NOT NULL,
  `usu_use` varchar(50) NOT NULL,
  `usu_pas` varchar(50) NOT NULL,
  `usu_est` tinyint(1) DEFAULT 1,
  `usu_rol_id` int(3) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_mai`, `usu_use`, `usu_pas`, `usu_est`, `usu_rol_id`) VALUES
(1, 'Brayan', 'Villamizar', 'Esteban.bevf@gmail.com', 'codevelop23', 'brayan212305', 1, 2),
(2, 'Carlos Farit', 'Gelves Gomez', 'faritcito11@gmail.com', 'FaritElKiller10', 'farit123', 1, 1),
(3, 'Prueba', 'OPrueba', 'uncorreo@deverdad.co', 'prueba', '1234', 0, 1),
(4, 'qweqwe', 'eqwew', 'eqwe@dsd.cpm', 'qweqw', 'qweqw', 0, 1),
(5, 'Maria Fernanda', 'Zabala Arciniegas', 'mafezabalaarciniegas@gmail.com', 'MafeGamer27', 'pass', 1, 2),
(6, 'Esteban', 'Fernandez', 'admin@empresa.com', 'admin', 'admincontrol', 1, 3),
(7, 'prueba igual', 'prueba igual', 'prueba@dsd.co', 'faritelkiller101', '1234', 1, 1),
(8, 'prueba copia 2', 'prueba copia 2', 'prueb@dsds.com', 'FaritElKiller102', '1234', 1, 1),
(9, 'pruebaagregar', 'pruebaagregar', 'pruebaagregar@gmail.com', 'pruebaagregar', 'pruebaagregar', 1, 1),
(11, 'pruebaagregar2', 'pruebaagregar2', 'pruebaagregar2@gamil.com', 'pruebaagregar2', 'pruebaagregar2', 1, 2),
(12, 'Jefe', 'Landines', 'jefelandines@gmail.com', 'jefecito', 'jefe123', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `UQ_ROL` (`rol_nom`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `UQ_USUARIO` (`usu_nom`),
  ADD KEY `FK_USU_ROL` (`usu_rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `rol_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `FK_USU_ROL` FOREIGN KEY (`usu_rol_id`) REFERENCES `tbl_rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
