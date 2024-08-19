-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2024 a las 02:13:10
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
-- Base de datos: `cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `edad`, `sexo`, `direccion`, `correo_electronico`) VALUES
('07102003', 'Hugi', 'Filio', '18', 'Masculino', 'de su corazon', ''),
('122121', 'Porte', 'te', '17', 'Masculino', 'de su corazon', 'hugoaa@gmail.com'),
('107773', 'Hugo', 'Filio', '20', 'Masculino', 'calle principal  S/N', 'al222311543@gmail.com'),
('222310334', 'carlos', 'perez', '20', 'Masculino', 'socasa', 'al222310251@gmail.com'),
('222310334', 'HUGO', 'FILIO ADRIÁN', '20', 'Masculino', 'calle principal  S/N', 'al222310334@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
