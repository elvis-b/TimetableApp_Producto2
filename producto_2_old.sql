-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2021 a las 22:10:45
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `producto_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`id_class`, `id_teacher`, `id_course`, `id_schedule`, `name`, `color`) VALUES
(8, 0, 2, 1, 'monco', 'verde'),
(12, 8, 2, 1, 'jomopp', 'jsjjs'),
(13, 7, 1, 1, 'unop', 'sss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_start` varchar(200) NOT NULL,
  `date_end` varchar(200) NOT NULL,
  `active` int(11) NOT NULL,
  `start` varchar(200) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id_course`, `name`, `description`, `date_start`, `date_end`, `active`, `start`, `end`) VALUES
(1, 'curso1', 'descripción curso 1', '2021-04-24 00:00:00', '2021-04-27 00:00:00', 1, '', ''),
(2, 'curso2', 'descripción curso 2', '2021-04-16 00:00:00', '2021-05-17 00:00:00', 1, '', ''),
(3, 'curso3', 'descripción curso 3', '2021-04-01 09:00:00', '2021-05-26 00:00:00', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrollment`
--

CREATE TABLE `enrollment` (
  `id_enrollment` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enrollment`
--

INSERT INTO `enrollment` (`id_enrollment`, `id_student`, `id_course`, `status`) VALUES
(1, 1, 1, 100),
(2, 1, 2, 100),
(3, 1, 3, 100),
(4, 2, 4, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` date NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `id_class`, `time_start`, `time_end`, `day`, `name`) VALUES
(1, 1, '00:00:00', '00:00:00', '2021-05-13', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `nif` varchar(50) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `username`, `pass`, `email`, `name`, `surname`, `telephone`, `nif`, `date_registered`) VALUES
(1, 'javi', '1234', 'aaa@aaa.com', 'juan javier', 'gamero', '14526325', '80152722E', '0000-00-00 00:00:00'),
(2, 'elena', '12345', 'aaa@aaa.com', 'Elena', 'Peris', '658555222', '58552211E', '0000-00-00 00:00:00'),
(4, 'elvis', 'elvisBuca8090', 'aaaaaa@aaaa.com', 'elvis', 'bucatariu', '658987456', '80152722E', '0000-00-00 00:00:00'),
(5, 'elvis3', '1234', 'cdcdcd@dddd.com', 'ssddd', 'aaaaaaaa', '658987456', '80152722E', '2021-04-29 23:39:21'),
(6, 'elvis2', 'elvisBuca8090', 'bbbb@bbb.com', 'jsjjsjss', 'sjjsjsjsjsj', '658587458', '80152722E', '0000-00-00 00:00:00'),
(8, 'marcos', '123', 'marcobtank@gmail.com', 'marcos', 'raymundo', '975232710', 'marcos', '2021-04-29 22:29:58'),
(10, 'everbtank', 'ssssssssss', 'everbtank@gmail.com', 'ever', 'raymundo', '975232710', 'ever', '2021-04-29 22:38:30'),
(11, 'everbtankdr', '123', 'everbtank@gmail.com', 'everdd', 'raymundo', '975232710', '123', '2021-04-29 22:54:43'),
(12, 'everbtankdr', '123', 'everbtank@gmail.com', 'everdd', 'raymundo', '975232710', '123', '2021-04-29 22:56:40'),
(13, 'everbtankdr', '123', 'everbtank@gmail.com', 'everdd', 'raymundo', '975232710', '123', '2021-04-29 22:57:43'),
(14, 'everbtankdr', '123', 'everbtank@gmail.com', 'everdd', 'raymundo', '975232710', '123', '2021-04-29 22:59:42'),
(15, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:00:08'),
(16, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:02:22'),
(17, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:04:28'),
(18, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:07:10'),
(19, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:09:17'),
(20, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:10:20'),
(21, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:11:00'),
(22, 'elvisSS', '123', 'everbtank2@gmail.com', 'ever', 'raymundo', '975232710', 'dante', '2021-04-29 23:12:04'),
(23, 'samue', '123', 'everbtank@gmail.com', 'samu', 'raymundo', '975232710', '22', '2021-04-29 23:12:55'),
(24, 'samue', '123', 'everbtank@gmail.com', 'samu', 'raymundo', '975232710', '22', '2021-04-29 23:13:59'),
(25, 'samue', '123', 'everbtank@gmail.com', 'samu', 'raymundo', '975232710', '22', '2021-04-29 23:14:41'),
(26, 'samue', '123', 'everbtank@gmail.com', 'samu', 'raymundo', '975232710', '22', '2021-04-29 23:15:37'),
(27, 'samir', '123', 'everbtank@gmail.com', 'ever', 'raymundo', '975232710', 'ss', '2021-04-29 23:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `nif` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `telephone`, `nif`, `email`, `password`, `username`, `date`) VALUES
(1, 'ever', 'raymundo', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'elvisSS', '2021-04-29 23:10:20'),
(2, 'ever', 'raymundo', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'elvisSS', '2021-04-29 23:11:00'),
(3, 'ever', 'raymundo', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'elvisSS', '2021-04-29 23:12:04'),
(4, 'samu', 'raymundo', '975232710', '22', 'everbtank@gmail.com', 123, 'samue', '2021-04-29 23:12:55'),
(5, 'samu', 'raymundo', '975232710', '22', 'everbtank@gmail.com', 123, 'samue', '2021-04-29 23:13:59'),
(6, 'samu', 'raymundo', '975232710', '22', 'everbtank@gmail.com', 123, 'samue', '2021-04-29 23:14:41'),
(7, 'samu', 'raymundo', '975232710', '22', 'everbtank@gmail.com', 123, 'samue', '2021-04-29 23:15:37'),
(8, 'ever', 'raymundo', '975232710', 'ss', 'everbtank@gmail.com', 123, 'samir', '2021-04-29 23:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_admin`
--

INSERT INTO `users_admin` (`id`, `username`, `name`, `email`, `password`, `surname`, `date`) VALUES
(1, 'javigamer', 'Juan Javier Gamero', 'ddd@ddd.com', '12345', '', '2021-04-29 21:43:38'),
(2, 'elvis', 'ooo', 'fff@fff.com', '12345', '', '2021-04-29 21:43:38'),
(5, 'elena', 'ElenaPeris', 'elena@sss.com', '123456', '', '2021-04-29 21:43:38'),
(6, 'profe', 'kkkkkkkkk', 'kkkk@kkk.com', '12345', '', '2021-04-29 21:43:38'),
(8, 'ddggg', 'ssdddsssss', 'dddd@ddddd.com', '123456', '', '2021-04-29 21:43:38'),
(9, 'nuevoAdmin', 'jsjjsjsssjjsjsjsjsj', 'jsjsjsjs@sjsj.com', '1234567', '', '2021-04-29 21:43:38'),
(10, 'elvisSS', 'ever', 'everbtank2@gmail.com', '123', 'raymundo', '2021-04-29 23:10:20'),
(11, 'elvisSS', 'ever', 'everbtank2@gmail.com', '123', 'raymundo', '2021-04-29 23:11:00'),
(12, 'elvisSS', 'ever', 'everbtank2@gmail.com', '123', 'raymundo', '2021-04-29 23:12:04'),
(13, 'samue', 'samu', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:12:55'),
(14, 'samue', 'samu', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:13:59'),
(15, 'samue', 'samu', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:14:41'),
(16, 'samue', 'samu', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:15:37'),
(17, 'samir', 'ever', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:18:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD UNIQUE KEY `id_teacher` (`id_teacher`,`id_course`,`id_schedule`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `name` (`name`,`date_start`,`date_end`);

--
-- Indices de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id_enrollment`),
  ADD UNIQUE KEY `id_student` (`id_student`,`id_course`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`email`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id_enrollment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
