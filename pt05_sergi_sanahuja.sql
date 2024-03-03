-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2023 a las 14:26:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt05_sergi_sanahuja`
--
CREATE DATABASE IF NOT EXISTS `pt05_sergi_sanahuja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt05_sergi_sanahuja`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`Id`, `Article`) VALUES
(1, 'Que la fuerza te acompañe.” – Obi-Wan Kenobi'),
(2, '“Yo soy tu padre.” – Darth Vader'),
(3, '“Ayúdame, Obi-Wan Kenobi. Eres mi única esperanza.” – Princesa Leia'),
(4, '“Hazlo o no lo hagas, pero no lo intentes.” – Yoda'),
(5, '“Este es el camino.” – El mandaloriano'),
(6, '“Estos no son los droides que estás buscando.” – Obi-Wan Kenobi'),
(7, '“Nunca subestimes el poder del lado oscuro.” – Darth Vader'),
(8, '“Usa la fuerza, Luke.” – Obi-Wan Kenobi'),
(9, '“Los sith son los portadores de la paz.” – Anakin Skywalker'),
(10, '“Soy un Jedi, como mi padre antes que yo.” – Luke Skywalker'),
(11, '“La empatía es el camino hacia la paz.” – Padmé Amidala'),
(12, '“La rebelión es el inicio de la libertad.” – Bail Organa'),
(13, '“Siempre hay una posibilidad.” – Qui-Gon Jinn'),
(14, '“Haz lo que debas hacer.” – Anakin Skywalker'),
(15, '“Sé valiente y no mires atrás. No te rindas.” – Rey Skywalker'),
(16, '“Solo un sith piensa en absolutos.” – Obi-Wan Kenobi'),
(17, '“El miedo es el camino hacia el lado oscuro.” – Yoda'),
(18, '“¿De qué sirve tener miedo?” – Padmé Amidala'),
(19, '“El miedo lleva a la ira, la ira lleva al odio, el odio lleva al sufrimiento.” – Yoda'),
(20, '“Haz lo que debas hacer, no lo que te gustaría hacer.” – Obi-Wan Kenobi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `Usuari` varchar(10) NOT NULL,
  `Contrasenya` varchar(500) NOT NULL,
  `correu` varchar(30) NOT NULL,
  `Token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `Usuari`, `Contrasenya`, `correu`, `Token`) VALUES
(9, 'sergi', '$2y$10$iWJvCGL0xZ7lRYmLP/DHz.KENW2yFBqCkra1jjge0hBkBHYvjX1gq', 'sergi@gmail.com', '6549248cb8967'),
(13, 'eric', '$2y$10$7HJXyMk8wD76LJUguv4RLeGEwKA3p3gb.PJ9EKkCBpPWeO1PIags6', 'eric@gmail.com', '6545231d0beea');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
