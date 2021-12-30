-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 29, 2021 la 05:14 PM
-- Versiune server: 10.4.6-MariaDB
-- Versiune PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `producto_2`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_student` varchar(40) DEFAULT NULL,
  `date_start` varchar(40) DEFAULT NULL,
  `date_end` varchar(40) DEFAULT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `class`
--

INSERT INTO `class` (`id_class`, `id_teacher`, `id_course`, `id_schedule`, `name`, `id_student`, `date_start`, `date_end`, `color`) VALUES
(47, 9, 89, 0, 'Materie 1', NULL, '10:00', '12:00', '#ff0000'),
(48, 2, 89, 0, 'Materie 2', NULL, '14:00', '16:00', '#00aabb'),
(49, 11, 90, 0, 'Materie 3', NULL, '17:00', '19:00', '#00ff13'),
(50, 11, 91, 0, 'Materie 4', NULL, '10:00', '17:00', '#586465');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_start` varchar(200) NOT NULL,
  `date_end` varchar(200) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Eliminarea datelor din tabel `courses`
--

INSERT INTO `courses` (`id_course`, `name`, `description`, `date_start`, `date_end`, `active`) VALUES
(89, 'Curs 1', 'Curs 1', '2021-12-01 00:00', '2021-12-31 00:00', 1),
(90, 'Curs 2', 'Curs 2', '2021-12-15 00:00', '2021-12-30 00:00', 1),
(91, 'Curs 3', 'Descrierea vietii', '2021-12-01 00:00', '2021-12-30 00:00', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `enroll`
--

CREATE TABLE `enroll` (
  `id_enrollment` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `enroll`
--

INSERT INTO `enroll` (`id_enrollment`, `id_student`, `id_course`, `status`) VALUES
(0, 51, 47, 0),
(0, 52, 47, 0),
(0, 53, 47, 0),
(0, 54, 47, 0),
(0, 51, 48, 0),
(0, 52, 48, 0),
(0, 53, 48, 0),
(0, 54, 48, 0),
(0, 51, 49, 0),
(0, 52, 49, 0),
(0, 53, 49, 0),
(0, 54, 49, 0),
(0, 51, 50, 0),
(0, 52, 50, 0),
(0, 53, 50, 0),
(0, 54, 50, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `students`
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
-- Eliminarea datelor din tabel `students`
--

INSERT INTO `students` (`id`, `username`, `pass`, `email`, `name`, `surname`, `telephone`, `nif`, `date_registered`) VALUES
(51, 'Student1', '123', '123', 'Student 1', 'student surname123sdfg', '123', '', '2021-12-29 17:12:09'),
(52, 'Student 2', '12345', 'eddie.milea@yahoo.com', 'Student 2', 'Student 2', '1234', '', '2021-12-29 18:03:39'),
(53, 'Student 3', '123', '123', 'Student 3', 'Student 3', 'Student 3', '', '2021-12-29 12:52:28'),
(54, 'Student 4', '1234', '1234', 'Student 4', 'Student 4', 'Student 4', '', '2021-12-29 12:52:38'),
(55, 'Test', '123', 'eduard.milea@gmail.c', 'test', 'test', '072412341', '', '2021-12-29 17:59:24'),
(56, 'testuser', '123', 'e@e.com', 'testname', 'tastsur', '123', '', '2021-12-29 18:00:25'),
(57, 'gdsfgsdfgfsd', '123', '123@123', '123', '123', '123', '', '2021-12-29 18:01:22');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teachers`
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
-- Eliminarea datelor din tabel `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `telephone`, `nif`, `email`, `password`, `username`, `date`) VALUES
(1, 'ever', 'ever', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'ever', '2021-08-13 19:22:47'),
(2, 'ever', 'raymundo', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'elvisSS', '2021-04-29 23:11:00'),
(3, 'ever', 'raymundo', '975232710', 'dante', 'everbtank2@gmail.com', 123, 'elvisSS', '2021-04-29 23:12:04'),
(6, 'samu', 'raymundo', '975232710', '22', 'everbtank@gmail.com', 123, 'samue', '2021-04-29 23:14:41'),
(8, 'ever', 'raymundo', '975232710', 'ss', 'everbtank@gmail.com', 123, 'samir', '2021-04-29 23:18:16'),
(9, 'ernesto', 'ernesto', '12312312', '123A', 'ernesto@mamaia.com', 1234, 'ernesto', '2021-12-29 18:06:31'),
(11, 'victor', 'ernesto', '534534534', '72974028L', 'victor@gmail.com', 123, 'amparo', '2021-07-01 19:23:10'),
(12, '123', '123', '123', '', '123', 123, 'testteacher', '2021-12-25 01:54:34');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users_admin`
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
-- Eliminarea datelor din tabel `users_admin`
--

INSERT INTO `users_admin` (`id`, `username`, `name`, `email`, `password`, `surname`, `date`) VALUES
(1, 'antonio', 'Juan Javier Gamero', 'ddd@ddd.com', '123', 'antonio', '2021-08-13 19:31:12'),
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
(17, 'samir', 'ever', 'everbtank@gmail.com', '123', 'raymundo', '2021-04-29 23:18:16'),
(18, 'ernesto', 'ernesto', 'ernesto@gmail.com', '123', 'ernesto', '2021-05-05 18:22:03'),
(19, 'amparo', 'victor', 'victor@gmail.com', '123', 'ernesto', '2021-07-01 19:18:11'),
(20, 'amparo', 'victor', 'victor@gmail.com', '123', 'ernesto', '2021-07-01 19:23:10');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `fk_teacher` (`id_teacher`),
  ADD KEY `fk_idCurso` (`id_course`);

--
-- Indexuri pentru tabele `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `name` (`name`,`date_start`,`date_end`);

--
-- Indexuri pentru tabele `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`email`);

--
-- Indexuri pentru tabele `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pentru tabele `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pentru tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pentru tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_idCurso` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
