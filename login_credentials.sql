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
-- Struktura tabeli dla tabeli `login_credentials`
--

CREATE TABLE `login_credentials` (
  `room_id` int(11) NOT NULL,
  `room_name` text NOT NULL,
  `room_password` text NOT NULL,
  `room_removal_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`room_id`, `room_name`, `room_password`, `room_removal_code`) VALUES
(10, 'Example', 'c6b0919c7fe628ae9056992c4a917e5dc035a9615d497f6eb2bd14063eaad3e6508efc8682fec82823ca3f3de311868a72990946166429f01b38f9f33d9ca610', 'c6b0919c7fe628ae9056992c4a917e5dc035a9615d497f6eb2bd14063eaad3e6508efc8682fec82823ca3f3de311868a72990946166429f01b38f9f33d9ca610');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
