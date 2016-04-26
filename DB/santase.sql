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
-- Структура на таблица `cards_this_turn`
--

DROP TABLE IF EXISTS `cards_this_turn`;
CREATE TABLE `cards_this_turn` (
  `id` int(11) NOT NULL,
  `player_1` int(11) NOT NULL,
  `player_2` int(11) NOT NULL,
  `player_1_card` varchar(255) NOT NULL,
  `player_2_card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, '10_c', 10, 5, 'clubs'),
(13, '11_c', 2, 2, 'clubs'),
(14, '12_c', 3, 3, 'clubs'),
(15, '13_c', 4, 4, 'clubs'),
(16, '1_d', 11, 6, 'diamonds'),
(17, '9_d', 0, 1, 'diamonds'),
(18, '10_d', 10, 5, 'diamonds'),
(19, '11_d', 2, 2, 'diamonds'),
(20, '12_d', 3, 3, 'diamonds'),
(21, '13_d', 4, 4, 'diamonds'),
(22, '1_h', 11, 6, 'hearts'),
(23, '9_h', 0, 1, 'hearts'),
(24, '10_h', 10, 5, 'hearts'),
(25, '11_h', 2, 2, 'hearts'),
(26, '12_h', 3, 3, 'hearts'),
(27, '13_h', 4, 4, 'hearts'),
(28, '1_s', 11, 6, 'spades'),
(29, '9_s', 0, 1, 'spades'),
(30, '10_s', 10, 5, 'spades'),
(31, '11_s', 2, 2, 'spades'),
(32, '12_s', 3, 3, 'spades'),
(33, '13_s', 4, 4, 'spades'),
(34, '1_c', 11, 6, 'clubs'),
(35, '9_c', 0, 1, 'clubs'),
(36, '10_c', 10, 5, 'clubs'),
(37, '11_c', 2, 2, 'clubs'),
(38, '12_c', 3, 3, 'clubs'),
(39, '13_c', 4, 4, 'clubs'),
(40, '1_d', 11, 6, 'diamonds'),
(41, '9_d', 0, 1, 'diamonds'),
(42, '10_d', 10, 5, 'diamonds'),
(43, '11_d', 2, 2, 'diamonds'),
(44, '12_d', 3, 3, 'diamonds'),
(45, '13_d', 4, 4, 'diamonds'),
(46, '1_h', 11, 6, 'hearts'),
(47, '9_h', 0, 1, 'hearts'),
(48, '10_h', 10, 5, 'hearts'),
(49, '11_h', 2, 2, 'hearts'),
(50, '12_h', 3, 3, 'hearts'),
(51, '13_h', 4, 4, 'hearts'),
(52, '1_s', 11, 6, 'spades'),
(53, '9_s', 0, 1, 'spades'),
(54, '10_s', 10, 5, 'spades'),
(55, '11_s', 2, 2, 'spades'),
(56, '12_s', 3, 3, 'spades'),
(57, '13_s', 4, 4, 'spades'),
(58, '1_c', 11, 6, 'clubs'),
(59, '9_c', 0, 1, 'clubs'),
(60, '10_c', 10, 5, 'clubs'),
(61, '11_c', 2, 2, 'clubs'),
(62, '12_c', 3, 3, 'clubs'),
(63, '13_c', 4, 4, 'clubs'),
(64, '1_d', 11, 6, 'diamonds'),
(65, '9_d', 0, 1, 'diamonds'),
(66, '10_d', 10, 2, 'diamonds'),
(67, '11_d', 2, 3, 'diamonds'),
(68, '12_d', 3, 4, 'diamonds'),
(69, '13_d', 4, 5, 'diamonds'),
(70, '1_h', 11, 6, 'hearts'),
(71, '9_h', 0, 1, 'hearts'),
(72, '10_h', 10, 2, 'hearts'),
(73, '11_h', 2, 3, 'hearts'),
(74, '12_h', 3, 4, 'hearts'),
(75, '13_h', 4, 5, 'hearts'),
(76, '1_s', 11, 6, 'spades'),
(77, '9_s', 0, 1, 'spades'),
(78, '10_s', 10, 2, 'spades'),
(79, '11_s', 2, 3, 'spades'),
(80, '12_s', 3, 4, 'spades'),
(81, '13_s', 4, 5, 'spades'),
(82, '1_c', 11, 6, 'clubs');

-- --------------------------------------------------------

--
-- Структура на таблица `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `challenger_id` int(11) NOT NULL,
  `rival_id` int(11) NOT NULL,
  `rival_confirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(65000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `hand`
--

DROP TABLE IF EXISTS `hand`;
CREATE TABLE `hand` (
  `id` int(11) NOT NULL,
  `player` int(11) NOT NULL,
  `hand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `packs`
--

DROP TABLE IF EXISTS `packs`;
CREATE TABLE `packs` (
  `id` int(11) NOT NULL,
  `player_1` int(11) NOT NULL,
  `player_2` int(11) NOT NULL,
  `pack_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `player` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `trump`
--

DROP TABLE IF EXISTS `trump`;
CREATE TABLE `trump` (
  `id` int(11) NOT NULL,
  `player_1` int(11) NOT NULL,
  `player_2` int(11) NOT NULL,
  `trump` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `turns`
--

DROP TABLE IF EXISTS `turns`;
CREATE TABLE `turns` (
  `id` int(11) NOT NULL,
  `player_1` int(11) NOT NULL,
  `player_2` int(11) NOT NULL,
  `turn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `turn_winner`
--

DROP TABLE IF EXISTS `turn_winner`;
CREATE TABLE `turn_winner` (
  `id` int(11) NOT NULL,
  `player_1` int(11) NOT NULL,
  `player_2` int(11) NOT NULL,
  `winner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastOnline` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `loses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards_this_turn`
--
ALTER TABLE `cards_this_turn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_points`
--
ALTER TABLE `card_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hand`
--
ALTER TABLE `hand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trump`
--
ALTER TABLE `trump`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turns`
--
ALTER TABLE `turns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turn_winner`
--
ALTER TABLE `turn_winner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards_this_turn`
--
ALTER TABLE `cards_this_turn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `card_points`
--
ALTER TABLE `card_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hand`
--
ALTER TABLE `hand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trump`
--
ALTER TABLE `trump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turns`
--
ALTER TABLE `turns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turn_winner`
--
ALTER TABLE `turn_winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
