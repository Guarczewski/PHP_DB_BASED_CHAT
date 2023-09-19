-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 19, 2023 at 02:44 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yahash_tiptechtop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sample_message_room`
--

CREATE TABLE `sample_message_room` (
  `message_id` int(11) NOT NULL,
  `message_room` text NOT NULL,
  `message_sender` text NOT NULL,
  `message_contents` text NOT NULL,
  `message_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sample_message_room`
--

INSERT INTO `sample_message_room` (`message_id`, `message_room`, `message_sender`, `message_contents`, `message_time`) VALUES
(432, 'Example', 'Example', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a ipsum et enim pharetra interdum. In fermentum metus lacus, et scelerisque magna tincidunt at. Maecenas laoreet egestas lorem, vel ornare tellus placerat non. Pellentesque sit amet consequat risus. Nulla placerat, urna quis faucibus luctus, turpis dolor luctus sem, et finibus mi libero eget libero. Praesent nec tortor tempus, varius nulla eu, aliquet odio. Nullam at porttitor odio, non porttitor diam. Nulla congue nisl tortor, at semper lorem bibendum quis. Nulla facilisi. Nunc odio lacus, ullamcorper at ultrices pellentesque, aliquam sed sapien. Phasellus volutpat ex ac diam dignissim commodo. ', '2023-09-19 14:43:17');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sample_message_room`
--
ALTER TABLE `sample_message_room`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_message_room`
--
ALTER TABLE `sample_message_room`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
