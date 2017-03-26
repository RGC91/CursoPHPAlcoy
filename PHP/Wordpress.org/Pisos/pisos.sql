-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Temps de generació: 01-03-2017 a les 14:08:34
-- Versió del servidor: 10.1.19-MariaDB
-- Versió de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `pisos`
--

CREATE TABLE `pisos` (
  `id` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `precio` float UNSIGNED NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `ciudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `pisos`
--

INSERT INTO `pisos` (`id`, `direccion`, `precio`, `descripcion`, `ciudad`) VALUES
(1, 'Calle Falsa 123', 200000, 'FALSOOOO', 'Alicante');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `pisos`
--
ALTER TABLE `pisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
