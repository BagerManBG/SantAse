-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santase`
--

-- --------------------------------------------------------

--
-- Структура на таблица `card_points`
--

DROP TABLE IF EXISTS `card_points`;
CREATE TABLE `card_points` (
  `id` int(11) NOT NULL,
  `card` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `paint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `card_points`
--

INSERT INTO `card_points` (`id`, `card`, `points`, `power`, `paint`) VALUES
(10, '1_c', 11, 6, 'clubs'),
(11, '9_c', 0, 1, 'clubs'),
(12, '10_c', 10, 2, 'clubs'),
(13, '11_c', 2, 3, 'clubs'),
(14, '12_c', 3, 4, 'clubs'),
(15, '13_c', 4, 5, 'clubs'),
(16, '1_d', 11, 6, 'diamonds'),
(17, '9_d', 0, 1, 'diamonds'),
(18, '10_d', 10, 2, 'diamonds'),
(19, '11_d', 2, 3, 'diamonds'),
(20, '12_d', 3, 4, 'diamonds'),
(21, '13_d', 4, 5, 'diamonds'),
(22, '1_h', 11, 6, 'hearts'),
(23, '9_h', 0, 1, 'hearts'),
(24, '10_h', 10, 2, 'hearts'),
(25, '11_h', 2, 3, 'hearts'),
(26, '12_h', 3, 4, 'hearts'),
(27, '13_h', 4, 5, 'hearts'),
(28, '1_s', 11, 6, 'spades'),
(29, '9_s', 0, 1, 'spades'),
(30, '10_s', 10, 2, 'spades'),
(31, '11_s', 2, 3, 'spades'),
(32, '12_s', 3, 4, 'spades'),
(33, '13_s', 4, 5, 'spades');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_points`
--
ALTER TABLE `card_points`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_points`
--
ALTER TABLE `card_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
